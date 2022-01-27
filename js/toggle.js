function menu() {
    var el = document.getElementById('mask');
    el.classList.toggle('closed-menu');
}

function dark() {
    var el = document.getElementsByTagName('body')[0];
    el.classList.toggle('dark');
    if (document.cookie.indexOf('dark=1') != -1)
        document.cookie = 'dark=0';
    else 
        document.cookie = 'dark=1';
    
}