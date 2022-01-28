if(document.cookie.indexOf('dark=1') != -1) {
    document.querySelector('body').classList.add('dark');
    document.querySelector('#mode-checkbox').checked = true;
}