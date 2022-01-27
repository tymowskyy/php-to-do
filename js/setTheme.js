console.log(document.cookie.split(';  '))
if(document.cookie.indexOf('dark=1') != -1) {
    var el = document.querySelector('body').classList.add('dark');
    document.querySelector('#mode-checkbox').checked = true;
}