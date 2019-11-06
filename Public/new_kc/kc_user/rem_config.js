/*在750px下，页面px设置 1rem=25px*/
(function() {
    var html = document.documentElement;
    var width = html.getBoundingClientRect().width;
    html.style.fontSize = width / 15 + 'px';
})();
