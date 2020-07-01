Vue.component('piece', {
    template: `
<div class="piece-container" :class="{ emphasis: state.emphasis }" @click="click" :draggable="draggable" @dragover="dragover($event)" @drop="drop">
    <div class="piece" :style="pieceStyles">
        <div class="piece-inner" :style="innerStyles"></div>
    </div>
</div>
    `,
    props: ['state', 'img', 'size', 'i', 'type'],
    data() {return {

    }},
    computed: {
        pieceStyles() {
            let transform = `rotate(${this.state.rotation*90}deg)`
            if (this.state.emphasis && this.type === 'start') {
                transform += ' scale(1.1)';
            }

            return {
                transform,
            };
        },
        innerStyles() {
            return {
                backgroundImage: `url(${this.img})`,
                backgroundPosition: `-${this.x}px -${this.y}px`,
            }
        },
        x() {
            return ((this.state.index-1) % this.size) / this.size * 500;
        },
        y() {
            return (Math.floor((this.state.index-1) / this.size) / this.size) * 500;
        },
        draggable() {
            return this.type === 'start' && this.state.emphasis;
        }
    },
    methods: {
        click() {
            if (this.type === 'start') {
                this.$parent.pieceClick(this.i);
            }
        },
        dragover(ev) {
            if (this.type === 'dest' && !this.emphasis) {
                ev.preventDefault();
            }
        },
        drop() {
            this.$parent.drop(this.state.index);
        }
    },
})

const app = new Vue({
    el: '#app',
    methods: {
        pieceClick(i) {
            if (this.s.emphasis === null) {
                this.s.gameState[i].emphasis = true;
                this.s.emphasis = i;
            } else {
                this.s.gameState.forEach(x => x.emphasis = false);
                this.s.emphasis = null;
            }
        },
        rotatePiece(amount) {
            if (this.s.emphasis !== null && !this.s.paused) {
                this.s.gameState[this.s.emphasis].rotation += amount;
            }
        },
        drop(index) {
            const src = this.s.gameState[this.s.emphasis];
            if (src.index === index && src.rotation % 4 === 0) {
                this.s.gameStateFinal[index-1].emphasis = true;
                this.s.gameState.forEach(x => x.emphasis = false);
                this.s.emphasis = null;

                if (this.s.gameStateFinal.every(x => x.emphasis)) {
                    this.win();
                }
            }
        },
        win() {
            this.s.state = 'end';
            this.checkTimer();

            setTimeout(() => $('#end .box').addClass('running'), 100);
        },
        pause() {
            this.s.paused = !this.s.paused;

            this.checkTimer();
        },
        checkTimer() {
            if (this.s.state === 'game' && !this.s.paused && this.timer === null) {
                this.timer = setInterval(() => this.s.time += 1, 1000);
            } else if (this.timer !== null) {
                clearInterval(this.timer);
                this.timer = null;
            }
        },
        clearStorage() {
            localStorage.clear();
            window.location.reload();
        },
        startGame(ev) {
            if (!this.s.name || !this.s.filedata) return;

            // Create game state
            const pieces = [];

            for (let i = 1; i <= this.pieceCount; i++) {
                pieces.splice((pieces.length * Math.random()), 0, {
                    rotation: Math.floor(Math.random() * 4),
                    index: i,
                    emphasis: false,
                });
            }

            const finalPieces = [];

            for (let i = 1; i <= this.pieceCount; i++) {
                finalPieces.push({
                    rotation: 0,
                    index: i,
                    emphasis: false,
                })
            }

            this.s.gameState = pieces;
            this.s.gameStateFinal = finalPieces;

            // Init game
            this.s.state = 'game';

            this.checkTimer();
        },
        async processFile(ev) {
            if (ev.target.files.length === 0) return;

            const file = ev.target.files[0];

            if (file.type !== 'image/jpeg') return;

            this.s.filename = file.name;

            const reader = new FileReader();

            reader.onload = res => {
                this.s.filedata = res.target.result;
            }

            reader.readAsDataURL(file);
        },
    },
    data: {
        s: { // Saved properties
            state: 'start',
            name: '',
            difficulty: 2,
            filename: null,
            filedata: null,
            gameState: null,
            gameStateFinal: null,
            paused: false,
            time: 0,
            emphasis: null,
        },
        timer: null,
        imgBlob: null,
        storageKey: 'ws2015-puzzle-app2',
    },
    created() {
        if (localStorage.hasOwnProperty(this.storageKey)) {
            this.s = Object.assign(this.s, JSON.parse(localStorage.getItem(this.storageKey)));
        }
    },
    mounted() {
        $(document).keydown(ev => {
            if (!this.s.paused) {
                if (ev.which === 39) {
                    this.rotatePiece(1);
                } else if (ev.which === 37) {
                    this.rotatePiece(-1);
                }
            }
        })

        if (this.s.state === 'end') {
            $('#end .box').addClass('running')
        }

        this.checkTimer();
    },
    computed: {
        size() {
            return this.s.difficulty + 1;
        },
        pieceCount() {
            return Math.pow(this.size, 2);
        }
    },
    watch: {
        s: {
            deep: true,
            handler(data) {
                localStorage.setItem(this.storageKey, JSON.stringify(data));
            }
        },
        's.filedata'(data) {
            if (data) {
                const old = this.imgBlob;

                fetch(data)
                    .then(d => d.blob())
                    .then(d => {
                        this.imgBlob = URL.createObjectURL(d);

                        if (old) {
                            URL.revokeObjectURL(old);
                        }
                    });
            }
        }
    },
    filters: {
        formatTime(time) {
            const minutes = Math.floor(time / 60);
            const seconds = String(time % 60).padStart(2, '0');

            return `${minutes}:${seconds}`;
        }
    }
})