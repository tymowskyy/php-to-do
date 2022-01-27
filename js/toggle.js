function menu() {
    var el = document.getElementById('mask');
    el.classList.toggle('closed-menu');
}

function dark() {
    var el = document.getElementsByTagName('body')[0];
    el.classList.toggle('dark');
}