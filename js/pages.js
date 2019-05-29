$(document).ready(function(){
    var href = document.location.href;
    var lastPathSegment = href.substr(href.lastIndexOf('/') + 1);
    var page = lastPathSegment.split('.')[0];
    $("#" +page).toggleClass("active");
});