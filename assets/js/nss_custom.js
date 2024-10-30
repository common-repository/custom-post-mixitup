/**
 copyRight by Nsstheme
 */

(function ($) {
    'use strict';
    /*documentation js*/
    var cls = $(".nssH");
    var cnt = $("#contact");

    if (cls.length > 0) {
        cls.on("click", function () {
            cnt.html(" if You have any question, Please contact: <b>nsstheme@gmail.com</b>");            
        });
    }

    /*mixitUP*/
    $(function () {
        $('#Container').mixItUp();
    });
    
})(jQuery);