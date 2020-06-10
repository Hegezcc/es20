let running = false;
let jumping = false;
let animationObj;

const runwayLength = $('#runway1').width() - 880;

let runway = 2;
const runwayMargins = {
    1: 7,
    2: -18,
    3: -45
}

const obstacles = {};

function initObstacles() {
    $('.runway .obstacle').remove();

    $('.runway').each(function() {
        const key = $(this).attr('id');
        obstacles[key] = [];

        for (let i = 0; i < 3; i++) {
            const obstacle = $('<span class="obstacle"></span>');

            const position = 500 + (runwayLength - 500) * Math.random();
            obstacles[key].push(position / runwayLength);

            obstacle.css({
                marginLeft: position + 'px'
            })

            $(this).append(obstacle);

            //console.log(obstacle);
        }
    })
}

function changeRunway(direction) {
    const toRunway = runway + direction;

    if (toRunway in runwayMargins && !jumping && running) {
        //console.log(toRunway);
        runway = toRunway;
        $('#runner').css({
            marginBottom: runwayMargins[runway] + 'px',
        });
        $('#runnerImage').css({
            transform: `scale(${1 + (runway - 2) * 0.2})`
        })
    }
}

function startRun() {
    running = true;

    $('#start,#end').addClass('hide');

    const runner = $('#runner');
    runner.addClass('running');

    runner.css({
        marginLeft: 0,
        marginBottom: 0
    });

    $('#game').css({
        marginLeft: 0
    });

    runner.animate({
        marginLeft: runwayLength + 'px'
    }, {
        duration: runwayLength * 2.1,
        easing: 'linear',
        progress: (animation, progress) => {
            progress = progress * runwayLength;
            animationObj = animation;
            if (!jumping) {
                const key = $(`#runway${runway}`).attr('id');

                for (let obs of obstacles[key]) {
                    obs = obs * runwayLength - 20;
                    if (progress <= obs && obs - progress < 30) {
                        stopRun(false);
                    }
                }
            }
        },
        complete: () => {
            running = false;
            runner.animate({
                marginLeft: '4934px',
                marginBottom: '100px',
            }, {
                complete: () => {
                    runner.animate({
                        marginLeft: '5140px'
                    }, {
                        complete: () => {
                            runner.removeClass('running');
                            $('#pyre_notfired').addClass('hide');
                            $('#pyre_fired').removeClass('hide');

                            setTimeout(stopRun, 1000, true);
                        }
                    })
                }
            })
        }
    });

    setTimeout(() => {
        const scrollerLength = runwayLength + 880 - $(window).width();

        $('#game').animate({
            marginLeft: - scrollerLength + 'px'
        }, {
            duration: scrollerLength * 2.1,
            easing: 'linear'
        })
    }, 700);

    runway = 2;
    changeRunway(0);
}

function stopRun(won) {
    running = false;

    $('#runner').removeClass('running').stop();
    $('#game').stop();

    const root = $('#end').removeClass('hide');
    if (won) {
        root.find('.error').addClass('hide');
        root.find('.success').removeClass('hide');
    } else {
        root.find('.success').addClass('hide');
        root.find('.error').removeClass('hide');
    }
}

function jump() {
    if (running && !jumping) {
        const runner = $('#runner');
        const margin = parseFloat(runner.css('margin-bottom'));

        jumping = true;

        runner.animate({
            marginBottom: margin + 100 + 'px',
        }, {
            duration: 200,
            queue: false,
            complete: () => {
                runner.animate({
                    marginBottom: margin + 'px'
                }, {
                    duration: 200,
                    queue: false,
                    complete: () => {
                        jumping = false;
                    }
                })
            }
        })
    }
}

changeRunway(0);
initObstacles();

$('#startButton,#restartButton').click(ev => {
    ev.preventDefault();
    startRun();
});

$(document).keydown(ev => {
    //console.log(ev.which)
    if (ev.which === 38) {
        changeRunway(-1);
    } else if (ev.which === 40) {
        changeRunway(1);
    } else if (ev.which === 32) {
        jump();
    }
});