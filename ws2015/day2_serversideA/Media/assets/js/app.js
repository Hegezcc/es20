/* put any js-code here */
if ($('#app').length > 0) {
    window.app = new Vue({
        el: '#app',
        data: {
            moves: [],
            isPlayerTurn: true,
        },
        created() {
            this.moves = initial_moves;
            this.isPlayerTurn = initial_turn;
        },
        methods: {
            async makeMove(id) {
                if (this.isPlayerTurn) {
                    const data = await fetch(`/api/move`, {
                        method: 'post',
                        headers: {'Content-Type':'application/x-www-form-urlencoded'},
                        body: `id=${id}`
                    }).then(d => d.json());

                    $('#time').text(`${data.match.game_clock} sec`);
                    $('.usermoves').text(data.state.player_moves.player);
                    $('.computermoves').text(data.state.player_moves.ai);

                    this.moves = data.moves;
                    this.isPlayerTurn = false;

                    if (data.state.state !== 'unfinished') {
                        window.location.reload();
                    }

                    setTimeout(() => {
                        this.moves.push(data.ai.move);
                        $('.usermoves').text(data.ai.state.player_moves.player);
                        $('.computermoves').text(data.ai.state.player_moves.ai);

                        if (data.ai.state.state === 'unfinished') {
                            this.isPlayerTurn = true;
                        } else {
                            window.location.reload();
                        }
                    }, 2000);
                }
            }
        },
        computed: {
            squares() {
                const grid = [];

                for (let i=1; i<=9; i++) {
                    grid.push({
                        id: i,
                        hasMove: false,
                        playerClass: ''
                    });
                }

                for (let move of this.moves) {
                    const sq = grid[move.square-1];

                    sq.hasMove = true;
                    sq.playerClass = move.is_player === '1' ? 'o' : 'x';
                }

                return grid;
            }
        }
    })
}
