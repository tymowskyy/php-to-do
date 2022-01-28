var bigScreen = false;

function menu() {
    document.querySelector('#mask').classList.toggle('closed-menu');
    recalculateHeight();
}

function recalculateHeight(x=null) {
    var growDiv = document.querySelector('#mask');
    if (bigScreen) {
        growDiv.style.height = 'auto';
    }
    else if (growDiv.classList.contains('closed-menu')) {
        growDiv.style.height = 0;
    }
    else {
        var wrapper = document.querySelector('#hiding-menu');
        growDiv.style.height = wrapper.clientHeight + "px";
    }
}

function big(x) {
    bigScreen = x.matches;
    recalculateHeight(x);
}

function setUp() {
    window.matchMedia("(min-width: 360px)").addEventListener("change", recalculateHeight);
    window.matchMedia("(min-width: 600px)").addEventListener("change", recalculateHeight);
    window.matchMedia("(min-width: 768px)").addEventListener("change", recalculateHeight);
    var xbig = window.matchMedia("(min-width: 992px)");
    big(xbig);
    xbig.addEventListener("change", big);
    document.querySelector('#mask').style.display = 'block';
}