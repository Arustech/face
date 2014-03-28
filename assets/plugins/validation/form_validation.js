"use strict";
$(document).ready(function () {
    $.extend($.validator.defaults, {
        invalidHandler: function (c, a) {
            var d = a.numberOfInvalids();
            if (d) {
                var b = d == 1 ? "You missed 1 field." : "You missed " + d + " fields. ";
                noty({
                    text: b,
                    type: "error",
                    timeout: 2000
                })
            }
        }
    });
   
});