function menu() {
    var el = document.getElementById('mask');
    el.classList.toggle('closed-menu');
}

function dark() {
    var el = document.getElementsByTagName('body')[0];
    el.classList.toggle('dark');
    if (document.cookie.split(';')[0] == '1')
        document.cookie = '0';
    else 
        document.cookie = '1';
    
}

function loadTheme() {
    if(document.cookie.split(';')[0] == '1') {
        var el = document.getElementsByTagName('body')[0];
        el.classList.add('dark');
    }
}