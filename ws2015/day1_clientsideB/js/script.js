Vue.component('runner', {
    template: `
<div id="runner" :style="style">
    <img src="imgs/runner.svg" alt="runner">
</div>
    `,
    props: ['running', 'runway', 'jumping'],
    data() {return {
        animation: null,
        runways: {1: 5, 2: 40, 3: 68}
    }},
    methods: {
        startRun() {
            $('#runner')
                .css({left: 0, bottom: '50px'})
                .animate({left: '4700px'}, {
                    duration: 9000,
                    easing: 'linear',
                    complete: this.finish,
                    step: this.$parent.step,
                });

            const game = $('#game');
            const distance = (game.width() - $(window).width());

            setTimeout(() => game.animate({
                left: `-${distance}px`,
            }, {
                duration: 9000 * (distance / 4700),
                easing: 'linear',
            }), 300);
        },
        finish() {
            $('#runner')
                .animate({left: '4900px', bottom: '186px'})
                .animate({left: '5100px'}, {
                    complete: this.$parent.win,
                })
        }
    },
    computed: {
        style() {
            return {
                height: (130-(this.runway-2)*20) + 'px',
                marginBottom: `${this.runways[this.runway]}px`,
            }
        }
    },
    watch: {
        running(val) {
            if (val) {
                this.startRun();
            }
        },
        jumping(val) {
            if (val) {
                $('#runner img').css({transform: 'translateY(-100px)'});

                setTimeout(() => $('#runner img').css({transform: 'translateY(0px)'}), 300);
                setTimeout(this.$parent.ground, 300);
            }
        }
    }
});

Vue.component('obstacle', {
    template: `<span class="obstacle" :style="{ left: distance + 'px' }"></span>`,
    props: ['distance'],
})

const app = new Vue({
    el: '#app',
    data: {
        state: 'start',
        runway: 2,
        runways: [
            {id: 'runway1', obstacles: []},
            {id: 'runway2', obstacles: []},
            {id: 'runway3', obstacles: []},
        ],
        jumping: false,
    },
    mounted() {
        $(document).keydown(ev => {
            if (ev.which === 38) {
                this.changeRunway(1);
                ev.preventDefault();
            } else if (ev.which === 40) {
                this.changeRunway(-1);
                ev.preventDefault();
            } else if (ev.which === 32) {
                this.jump();
                ev.preventDefault();
            }
        });

        this.runways.forEach(r => {
            for (let i = 0; i < 1; i++) {
                r.obstacles.push(Math.floor(Math.random() * 4000) + 500)
            }
        })
    },
    methods: {
        jump() {
            if (this.running && !this.jumping) {
                this.jumping = true;
            }
        },
        step(now) {
            if (!this.jumping) {
                const clash = this.runways[3-this.runway].obstacles.find(obs => {
                    const dist = obs - now;
                    return dist > 50 && dist < 80
                });

                if (clash) {
                    this.lose();
                }
            }
        },
        ground() {
            if (this.jumping) {
                this.jumping = false;
            }
        },
        lose() {
            $('#runner,#game').stop();
            this.state = 'fail';
        },
        win() {
            this.state= 'success';
        },
        restart() {
            document.location.reload();
        },
        start() {
            $(document).scrollLeft(0);
            this.state = 'game';
        },
        changeRunway(direction) {
            if (!this.jumping) {
                this.runway = Math.max(1, Math.min(3, this.runway + direction));
            }
        },
    },
    computed: {
        running() {
            return this.state === 'game'
        }
    }
})

$(document).scrollLeft(0);