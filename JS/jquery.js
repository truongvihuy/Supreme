$(document).ready(function(){
	'use strict';
    $(window).scroll(function(){
        $(".row").css("opacity", 1 - $(window).scrollTop() / $('.row').height());
    });
});