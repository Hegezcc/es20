Vue.component('vpiece', {
    template: `
<div class="piece" :class="{ 'emphasis' : emphasis }" :style="styles" @click="$emit('click', id)"
     :draggable="emphasis" @drop.prevent="$emit('drop', id)" @dragover.prevent>
    <div class="piece-inner" :style="stylesInner">
        <slot></slot>
    </div>
</div>
    `,
    props: ['rowSize', 'baseImg', 'x', 'y', 'emphasis', 'rotation', 'id'],
    data() { return {
        size: 500 / this.rowSize
    }},
    computed: {
        clipX() {
            return this.x * this.size;
        },
        clipY() {
            return this.y * this.size;
        },
        styles() {
            return {
                width: `${this.size}px`,
                height: `${this.size}px`,
            }
        },
        stylesInner() {
            return {
                backgroundImage: `url(${this.baseImg})`,
                backgroundPosition: `-${this.clipX}px -${this.clipY}px`,
                transform: `rotate(${this.rotation*90}deg)`,
            }
        }
    }
});

const app = new Vue({
    el: '#app',
    data: {
        saved: {
            name: null,
            state: null,
            fileName: null,
            imageData: null,
            rowSize: 3,
            gameState: null,
            gameStateFinal: null,
            emphasized: null,
            gameClock: 0,
            lastId: null,
        },
        imageDataBlob: null,
        workCanvas: null,
        workCanvasCtx: null,
        debug: false,
        storageKey: 'ws2015-puzzle-app',
        gameClockTimer: null,
        highScores: null,
    },
    methods: {
        processStartingPiece(id) {
            if (this.saved.state === 'game') {
                if (this.saved.emphasized) {
                    this.saved.gameState.forEach(piece => piece.emphasis = false);
                    this.saved.emphasized = null;
                } else if (!this.saved.gameStateFinal[id-1].emphasis) {
                    this.saved.gameState.find(piece => piece.id === id).emphasis = true;
                    this.saved.emphasized = id;
                }
            }
        },
        processPieceDrop(id) {
            if (this.saved.state === 'game') {
                const piece = this.saved.gameState.find(piece => piece.id === this.saved.emphasized);

                if (this.saved.emphasized === id && piece.rotation % 4 === 0) {
                    this.saved.gameStateFinal[id-1].emphasis = true;
                }

                piece.emphasis = false;
                this.saved.emphasized = null;

                if (this.saved.gameStateFinal.every(x => x.emphasis)) {
                    this.win();
                }
            }
        },
        reset() {
            this.saved.state = 'starting';
        },
        startGame() {
            if (this.saved.name && this.saved.imageData) {
                this.createGameState();
                this.saved.gameClock = 0;
                this.saved.state = 'game';
            }
        },
        async win() {
            this.saved.state = 'results';

            const params = new URLSearchParams({
                time: this.saved.gameClock,
                name: this.saved.name,
                difficulty: this.saved.rowSize - 1,
            });

            const data = await fetch('scoreboard.php', {
                method: 'post',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: params.toString()
            }).then(d => d.json());

            this.highScores = data.scoreboard;
            this.saved.lastId = data.last_id;
        },
        loadImage(ev) {
            if (ev.target.files.length > 0 && ev.target.files[0].type === 'image/jpeg') {
                this.saved.fileName = ev.target.files[0].name

                const reader = new FileReader();

                reader.onload = ev => {
                    const data = ev.target.result.toString();
                    const img = new Image();

                    img.onload = () => {
                        const minSize = Math.min(img.width, img.height);

                        this.workCanvasCtx.drawImage(
                            img,
                            (img.width - minSize) / 2,
                            (img.height - minSize) / 2,
                            minSize, minSize,
                            0, 0,
                            500, 500
                        )

                        this.saved.imageData = this.workCanvas.toDataURL('image/jpeg');
                    }

                    img.src = data;
                };

                reader.readAsDataURL(ev.target.files[0]);
            }
        },
        recalculateBlob() {
            if (this.imageDataBlob) {
                URL.revokeObjectURL(this.imageDataBlob);
            }

            this.workCanvas.toBlob(blob => {
                this.imageDataBlob = URL.createObjectURL(blob)
            }, 'image/jpeg');
        },
        createGameState() {
            const pieces = [];
            const piecesFinal = [];

            for (let i = 1; i <= Math.pow(this.saved.rowSize, 2); i++) {
                pieces.splice(Math.floor(Math.random() * pieces.length), 0,
                {
                    id: i,
                    emphasis: false,
                    rotation: Math.floor(Math.random() * 4),
                });
                piecesFinal.push({
                    id: i,
                    rotation: 0
                })
            }

            this.saved.gameState = pieces;
            this.saved.gameStateFinal = piecesFinal;
        },
        rotatePiece(clockwise) {
            if (this.saved.emphasized && this.saved.state === 'game') {
                const piece = this.saved.gameState.find(piece => piece.id === this.saved.emphasized);

                piece.rotation = (piece.rotation + (clockwise ? 1 : -1));
            }
        },
        pause() {
            if (this.saved.state === 'paused') {
                this.saved.state = 'game';
            } else {
                this.saved.state = 'paused';
            }
        },
    },
    created() {
        if (this.storageKey in localStorage) {
            try {
                this.saved = JSON.parse(localStorage.getItem(this.storageKey));
            } catch (e) {
                this.reset();
            }
        } else {
            this.reset();
        }

        if (this.saved.state === 'results') {
            fetch(`scoreboard.php?id=${this.saved.lastId}`)
                .then(d => d.json())
                .then(d => this.highScores = d.scoreboard);
        }
    },
    beforeDestroy() {
        if (this.imageDataBlob) {
            URL.revokeObjectURL(this.imageDataBlob);
        }
    },
    mounted() {
        $(document).on('keydown', ev => {
            if (ev.which === 37) {
                // CCW
                this.rotatePiece(false);
            } else if (ev.which === 39) {
                // CW
                this.rotatePiece(true);
            }
        });

        this.workCanvas = $('#work').get(0);
        this.workCanvasCtx = this.workCanvas.getContext('2d');

        if (this.saved.imageData) {
            const img = new Image();

            img.onload = () => {
                this.workCanvasCtx.drawImage(img, 0, 0);
                this.recalculateBlob();
            }

            img.src = this.saved.imageData;
        }
    },
    computed: {
        showFileName() {
            return this.saved.fileName ?? 'Drop your photo here!';
        },
        pausedButton() {
            return this.saved.state === 'paused' ? 'RESUME' : 'PAUSE';
        },
    },
    watch: {
        saved: {
            deep: true,
            handler(data) {
                if (data) {
                    localStorage.setItem(this.storageKey, JSON.stringify(data));
                }
            }
        },
        'saved.imageData'() {
            this.recalculateBlob()
        },
        'saved.state'(state) {
            if (this.gameClockTimer) {
                clearInterval(this.gameClockTimer);
            }

            if (state === 'game') {
                this.gameClockTimer = setInterval(() => {
                    this.saved.gameClock += 1;
                }, 1000);
            }
        }
    },
    filters: {
        time(val) {
            const minutes = String(Math.floor(val / 60));
            const seconds = String(val % 60).padStart(2, '0');

            return `${minutes}:${seconds}`;
        }
    }
});