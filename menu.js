function menu() {
    var el = document.getElementById('mask');
    el.classList.toggle('closed-menu');
    dark();
}

function dark() {
    var el = document.getElementsByTagName('body')[0];
    el.classList.toggle('dark');
    console.log('a')
}