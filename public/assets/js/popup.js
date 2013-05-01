function popitup(url) {
    newwindow=window.open(url,'name','height=270,width=680');
    if (window.focus) {newwindow.focus()}
    return false;
}