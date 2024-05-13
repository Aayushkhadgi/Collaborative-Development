$(document).ready(function(){
    $(window).scroll(function(){
        if(this.scrollY > 20){
            $('.navbar').addClass("sticky");
        }else{
            $('.navbar').removeClass("sticky");
        }
        if(this.scrollY > 500){
            $('.scroll-up-btn').addClass("show");
        }else{
            $('.scroll-up-btn').removeClass("show");
        }
    });
    $('.scroll-up-btn').click(function(){
        // Animate scrolling to the top with smooth behavior
        $('html, body').animate({scrollTop: 0}, 'slow');
    });

    $('.navbar .menu li a').click(function(){
        $('html').css("scrollBehavior", "smooth");
    });
    $('.menu-btn').click(function(){
        $('.navbar .menu').toggleClass("active");
        $('.menu-btn i').toggleClass("active");
    });

    // Function to open hidden links based on ID
    function openLink(id) {
        var link = $('#' + id).attr('href'); // Get the link URL
        window.open(link, '_blank'); // Open the link in a new tab
    }

    // Event listener for paragraph clicks in the "About Us" section
    $('.about .details p').click(function() {
        // Get the corresponding link ID
        var linkId = $(this).parent().parent().attr('class').split(' ')[1].replace('card', 'link');
        openLink(linkId); // Open the link
    });
    var typed = new Typed(".typing", {
        strings: ["Our Sites"],
        typeSpeed: 100,
        backSpeed: 60,
        loop: true
    });
    var typed = new Typed(".typing1", {
        strings: ["Highlighted Areas"],
        typeSpeed: 100,
        backSpeed: 60,
        loop: true
    });
        $('.carousel').owlCarousel({
            margin: 20,
            loop: true,
            autoplay: true,
            autoplayTimeout: 2500,
            autoplayHoverPause: true,
            responsive: {
                0:{
                    items: 1,
                    nav: false
                },
                1000:{
                    items: 2,
                    nav: false
                }
            }
        });
    });
