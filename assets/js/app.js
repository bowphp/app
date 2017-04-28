(function () {
    var body = document.querySelector('body');
    setTimeout(function () {
        body.style.backgroundColor = '#bd362f';
        setTimeout(function () {
            body.style.backgroundColor = '#fff';
        }, 1000);
    }, 1000);
})();
