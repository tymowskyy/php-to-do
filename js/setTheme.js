console.log(document.cookie.split(';  '))
if(document.cookie.indexOf('dark=1') != -1) {
    var el = document.getElementsByTagName('body')[0];
    el.classList.add('dark');
    document.getElementById('mode-checkbox').checked = true;
}