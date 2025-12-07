<!-- load JS files -->
<script src="js/jquery-1.11.3.min.js"></script> <!-- jQuery (https://jquery.com/download/) -->
<script src="js/popper.min.js"></script> <!-- https://popper.js.org/ -->
<script src="js/bootstrap.min.js"></script> <!-- https://getbootstrap.com/ -->
<script src="js/datepicker.min.js"></script> <!-- https://github.com/qodesmith/datepicker -->
<script src="js/jquery.singlePageNav.min.js"></script> <!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->
<script src="slick/slick.min.js"></script> <!-- http://kenwheeler.github.io/slick/ -->
<script src="js/jquery.scrollTo.min.js"></script> <!-- https://github.com/flesler/jquery.scrollTo -->

<script>
    /* DOM is ready
    ------------------------------------------------*/
    $(function() {
        // Change top navbar on scroll
        $(window).on("scroll", function() {
            if ($(window).scrollTop() > 100) {
                $(".tm-top-bar").addClass("active");
            } else {
                $(".tm-top-bar").removeClass("active");
            }
        });

        // Smooth scroll to search form
        $('.tm-down-arrow-link').click(function() {
            $.scrollTo('#tm-section-search', 300, {
                easing: 'linear'
            });
        });

        // Date Picker in Search form
        var pickerCheckIn = datepicker('#inputCheckIn');
        var pickerCheckOut = datepicker('#inputCheckOut');

        // Update nav links on scroll
        $('#tm-top-bar').singlePageNav({
            currentClass: 'active',
            offset: 60
        });

        // Close navbar after clicked
        $('.nav-link').click(function() {
            $('#mainNav').removeClass('show');
        });

        // Slick Carousel
        $('.tm-slideshow').slick({
            infinite: true,
            arrows: true,
            slidesToShow: 1,
            slidesToScroll: 1
        });

        $('.tm-current-year').text(new Date().getFullYear()); // Update year in copyright           
    });
</script>