window.addEventListener('scroll', function (ev) {
    const fixed = ev.target.getElementById('header-anchor').getBoundingClientRect().top < 0;
    const cl = ev.target.body.classList;

    if (fixed ^ cl.contains('fixed-header')) {
        cl.toggle('fixed-header');
    }
});
