// sticky form
$(document).ready(function () {
    // scroll
    // $("html").niceScroll({
    //     cursorcolor: "#A46B04",
    //     cursorwidth: "10px",
    //     background: "rgba(0,0,0)",
    //     cursorborder: "none",
    //     cursorborderradius: 0,
    // });
    // var setScroll = function(i) {
    //     if($(i).length>0)
    //     $(i).niceScroll().updateScrollBar();
    // } 
    // setScroll("html");


    //preload of pages

    $(".preload__container").fadeOut(1000, function () {
        $(".preload").fadeOut(200);
    });
    $(window).scroll(function () {
        var sc = $(this).scrollTop();
        if (sc > 300) {
            $(".form").addClass("fixed-form");
        } else {
            $(".form").removeClass("fixed-form");
        }
    });
    $(window).scroll(function () {
        var sc = $(this).scrollTop();
        if (sc > 300) {
            $(".sticky-header").addClass("header");
        } else {
            $(".sticky-header").removeClass("header");
        }
    });
    // about us carouse.....
    $(".aboutUs__carousel").owlCarousel({
        autoplay: true,
        autoplayTimeout: 5000,
        items: 1,
        loop: true,
        nav: true,
        dots: false,
        smartSpeed: 600,
        responsive: {
            768:{
                margin: 30,
                stagePadding: 50,
                height: 500,
            }
        },
    });

    $(".aboutUs__carousel .owl-prev").html("prev");
    $(".aboutUs__carousel .owl-next").html("next");
    // our service carousel
    $(".ourService__carousel").owlCarousel({
        autoplay: true,
        autoplayTimeout: 5000,
        items: 1,
        // loop: true,
        nav: false,
        dots: true,
        stagePadding: 0,
        margin: 20,
        height: 500,
        responsive:{
            768:{
                items:2
            },
            
        }
    });




    $(".display__brand-logo").owlCarousel({
        autoplay: true,
        autoplayTimeout: 4000,
        items: 3,
        dots: true,
        nav: false,
        loop: true,
        margin: 10,
        autoplay: true,
        smartSpeed: 600,
        responsive: {
            768:{
                items: 4,
            },
            992: {
                items: 5,
            }
        },
    });
    $(".properties .sale-falter__button button").click(function () {
        $(this).addClass("active").siblings().removeClass("active");
    });
    // $("header .sticky-header .menu__list").click(function () {
    //     $(this).addClass("active").siblings().removeClass("active");
    // });
    $(".properties .filter-place .properties__button-place").click(function () {
        $(this).addClass("active").siblings().removeClass("active");
    });
    $(".tigger-buttons button").click(function () {
        $(this).addClass("active").siblings().removeClass("active");
    });

    // closing form
    var closingButton = document.querySelector(".form__content .form__closing");
    closingButton.addEventListener("click", hiddenForm);
    function hiddenForm() {
        document.querySelector(".form").classList.add("d-none");
        $(".buttom-form").removeClass("d-none");
    }

    ///// show form
    const showForm = $(".buttom-form");
    showForm.click(function () {
        $(".form").removeClass("d-none");
        $(this).addClass("d-none");
    });

    // Scroll To Top
    const scrollToTop = $(".general-to-up");
    scrollToTop.click(function () {
        $("html, body").animate({ scrollTop: 0 }, 1000);
        return false;
    });

    // navLinks
    const navLink = $('.menu__list a[data-target]');
    navLink.on('click', function(e) {
        e.preventDefault();
        const relatedBox = $(`div[data-related="${$(this).attr('data-target')}"]`);
        if (relatedBox.length) {
            $('html, body').animate({
                scrollTop: relatedBox.offset().top
            }, 2000);
        }
    });
    // show button scroll to top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $(".general-to-up").fadeIn();
        } else {
            $(".general-to-up").fadeOut();
        }
    });
    if ($(window).scrollTop() > 100) {
        $(".general-to-up").fadeIn();
    } else {
        $(".general-to-up").fadeOut();
    }

    // form validation
    $('.contact-form').validate({
        rules: {
            name: {
                required: true,
            },
            phone: {
                required: true,
                number: true,
            },
            email: {
                required: true,
                email: true
            },
            message: {
                required: true,
            },
        },
    });


    /* Load More Items */
    var loadBtn = $(".blogs__load-btn");
    var controlItems = 3;
    loadBtn.on("click", loadItems);

    loadItems();

    function loadItems() {
        $.ajax({
            method: "get",
            url: "/GetBlogs",
            success: function (data) {

                if(data.length > 0) {
                    
                    for (let i = controlItems - 3; i < controlItems; i++) {
                        if (data.length != i) {
                            var element = `<div class="col-md-4 col-12">
                            <div class="blog__content">
                            <div class="blog__img">
                            <img src="${data[i].photo}">
                            </div>
                            <h4 class="blog__tittle">${data[i].title}</h4>
                            <p class="blog__artical">${data[i].des}</p>
                            <button type="button" class="btn btn-primary more-blog" data-toggle="modal" data-target="#exampleModal" data-src="${data[i].photo}"> 
                            Continue Reading ..
                            </button>
                            </div>
                            </div>`;
                            
                            $(".blog__container").append(element);
                            
                            

                        } else {
                            loadBtn.addClass("opacity");
                        }

                    }
                    
                }
                controlItems += 3;
            },
        });
    }

    $(document).on("click", ".more-blog", function () {
        var imgModal = $(this).attr("data-src");
        var contentModalTilttle = $(this).siblings(".blog__tittle").text();
        var contentModalparagraph = $(this).siblings(".blog__artical").text();
        $(".modal .modal-content .modal-body .img img").attr("src", imgModal);
        $(".modal .modal-content .modal-body .content h4").text(contentModalTilttle);
        $(".modal .modal-content .modal-body .content p").text(contentModalparagraph);
    });


    $(document).on('click', '.video-btn', function() {
        var dataVideo = $(this).attr('data-video');
        var video = `<video width="320" height="240" controls>
            <source src="${dataVideo}" type="video/mp4">             
        </video>`;
        $('.bolg-modal .video-modal').append(video);
    });

    $(document).on('hidden.bs.modal', '.bolg-modal', function () {
        $('.bolg-modal video').remove();
    });



    $("#team__carousel").owlCarousel({
        autoplay: true,
        autoplayTimeout: 5000,
        items: 1,
        itemsDesktop: false,
        itemsDesktopSmall: false,
        itemsTablet: false,
        itemsMobile: false,
        loop: true,
        responsive: {
            768: {
                items: 2,
                margin: 15,
            },
            992: {
                items: 3,
                margin: 15,
            },
            1280: {
                items: 4,
                margin: 15,
            }
        },
    });






});