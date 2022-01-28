function dark() {
    document.querySelector('body').classList.toggle('dark');
    if (document.cookie.indexOf('dark=1') != -1)
        document.cookie = 'dark=0';
    else 
        document.cookie = 'dark=1';
}