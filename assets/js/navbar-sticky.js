(function ($) {
    /*===== single-content-navbar sticky ======*/
    if($("#single-content-navbar").length) {
        window.onscroll = function () {
            stickyFunction()
        };

        var navbarField = document.getElementById("single-content-navbar");
        var sticky = navbarField.offsetTop;

        function stickyFunction() {
            if (window.pageYOffset >= sticky) {
                navbarField.classList.add("single-nav-sticky");
            } else {
                navbarField.classList.remove("single-nav-sticky");
            }
        }
    }
})(jQuery);