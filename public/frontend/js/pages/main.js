// sticky form 
$(document).ready(function() {
  // scroll
  $("html").niceScroll({
    cursorcolor:"#A46B04",
    cursorwidth:"10px",
    background:"rgba(0,0,0)",
    cursorborder:"none",
    cursorborderradius:0
  });
    //preload of pages

    $('body').addClass('overflow-hidden');
    $('.preload__container').fadeOut(1000, function() {
        $('.preload').fadeOut(200, function() {
            $('body').removeClass('overflow-hidden'); 
        });
    });
        $(window).scroll(function () {
        var sc = $(this).scrollTop();
        if (sc > 300) {
            $(".form").addClass('fixed-form');
        } else {
            $(".form").removeClass('fixed-form');
        }
    });
    $(window).scroll(function () {
        var sc = $(this).scrollTop();
        if (sc > 300) {
            $(".sticky-header").addClass('header');
        } else {
            $(".sticky-header").removeClass('header');
        }
    });
    // about us carouse.....
    $('.aboutUs__carousel').owlCarousel({
        autoplay:true,
        autoplayTimeout:5000,
        items:1,
        loop: true,
        nav:true,
        dots:false,
        margin:30,
        stagePadding:50,
        height:500,
        smartSpeed:600,
        responsive: {
            0: {
                // stagePadding:0,
                // margin:30,

            },
            
        }
    })
    $(".aboutUs__carousel .owl-prev").html('prev');
    $(".aboutUs__carousel .owl-next").html('next');
    // our service carousel 
    $('.ourService__carousel').owlCarousel({
        autoplay:true,
        autoplayTimeout:5000,
        items:2,
        loop: true,
        nav:false,
        dots:true,
        stagePadding:0,
        margin:20,
        height:500,
        responsive: {
            0: {
                // 
            }

        }
    });

    $('.video').click(function(){
        var videoModal = $(this).attr('data-src');
        $('#videoModal .modal-content .modal-body .video-modal video ').attr('src', videoModal);
    })
    $('.display__brand-logo').owlCarousel({
        autoplay:true,
        autoplayTimeout:4000,
        items:5,
        dots:true,
        nav:false,
        loop:true,
        margin:10,
        autoplay:true,
        smartSpeed:600,
        // nav:true,
    });
    $(".properties .sale-falter__button button").click(function(){
        $(this).addClass('active').siblings().removeClass('active')
    });
    $("header .sticky-header .menu__list").click(function(){
        $(this).addClass('active').siblings().removeClass('active')
    });
    $(".properties .filter-place .properties__button-place").click(function(){
        $(this).addClass('active').siblings().removeClass('active')
    });
    $(".tigger-buttons button").click(function(){
        $(this).addClass('active').siblings().removeClass('active')
    })
});
// closing form 
var closingButton = document.querySelector('.form__content .form__closing');
closingButton.addEventListener('click', hiddenForm);
function hiddenForm(){
    document.querySelector('.form').classList.add('d-none');
    $('.buttom-form').removeClass('d-none');
}
// Scroll To Top
const scrollToTop = $('.general-to-up');
scrollToTop.click(function () {
    $("html, body").animate({ scrollTop: 0 }, 1000);
    return false;
});
  // show button scroll to top
$(window).scroll(function () {
    if ($(this).scrollTop() > 100) {

        $('.general-to-up').fadeIn();
    } else {
        $('.general-to-up').fadeOut();
        
    }
});
///// show form
const showForm = $('.buttom-form');
showForm.click(function(){
    $('.form').removeClass('d-none');
    $(this).addClass('d-none');
})
//// carousel team
$(document).ready(function() {
    if ( $(window).width() < 854 ) {
        startCarousel();
        $('#team__carousel').addClass('d-flex');
    } else {
    $('#team__carousel').addClass('off');
    }
});
$(window).resize(function() {
    if ( $(window).width() < 854 ) {
        startCarousel();
    } else {
        stopCarousel();
    }
});
function startCarousel(){
    $("#team__carousel").owlCarousel({
    autoplay:true,
    autoplayTimeout:5000,
    items : 1,
    itemsDesktop : false,
    itemsDesktopSmall : false,
    itemsTablet: false,
    itemsMobile : false,
    loop:true,
    stagePadding:30
    });
}
function stopCarousel() {
    var owl = $('#team__carousel');
    owl.trigger('destroy.owl.carousel');
    owl.addClass('off');
}
////// properties carousel

$(document).ready(function() {
    if ( $(window).width() < 854 ) {
        startCarousel();
        $('.properties__carousel').addClass('d-flex');
    } else {
    $('.properties__carousel').addClass('off');
    }
});
$(window).resize(function() {
    if ( $(window).width() < 854 ) {
        startCarousel();
    } else {
        stopCarousel();
    }
});
function startCarousel(){
    $(".properties__carousel").owlCarousel({
    autoplay:true,
    autoplayTimeout:5000,
    items : 1,
    itemsDesktop : false,
    itemsDesktopSmall : false,
    itemsTablet: false,
    itemsMobile : false,
    loop:true,
    stagePadding:30
    });
}
function stopCarousel() {
    var owl = $('.properties__carousel');
    owl.trigger('destroy.owl.carousel');
    owl.addClass('off');
}
/////////////////////////
'use strict'
// select form and success message section
let formSection = document.getElementById("contact_form"),
  successMessageSection = document.querySelector(".success-message"),
  formFieldes = document.querySelectorAll("input, textarea"),
  submitButton = document.querySelector("#contact_form .btn-submit"),
  resetButton = document.querySelector("#contact_form .btn-reset"),
  phoneInput =  document.querySelector("#contact_form .phone input"),
 emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{1,4})?$/,                                    // regular expressions 
letterOnlyReg = /^[\u0600-\u065F\u066A-\u06EF\u06FA-\u06FFa-zA-Z]+[\u0600-\u065F\u066A-\u06EF\u06FA-\u06FFa-zA-Z-_ ]*$/,
numberOnlyReg = /^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]*$/;

let ContactError= [             // error elements
{
    errorName : document.querySelector("#contact_form .name p.required"),
    nameNotValid :  document.querySelector("#contact_form .name p.not-valid"),
    isValid: false,
    isRequired: true 
},
  {
    errorEmail:document.querySelector("#contact_form .email p.required"),
    emailNotValid : document.querySelector("#contact_form .email p.not-valid"),
    isValid:false,
    isRequired: true
  },
  {
    phoneNotValid: document.querySelector("#contact_form .phone p.not-valid"),
    isValid: true,
    isRequired: false
  }
];

function validateForm(e){
      let nameInput = document.querySelector("#contact_form .name input"),
      emailInput =  document.querySelector("#contact_form .email input"),
      phoneInput =  document.querySelector("#contact_form .phone input"),   
      inputsRequired = document.getElementsByClassName('input-reqiured')
      e.preventDefault();  
      for (let i = 0; i < inputsRequired.length; i++){
        if (inputsRequired[i].value.trim() == '') {
          inputsRequired[i].classList.add("error-input")
          if(inputsRequired[i].getAttribute("name") == "form_name"){
                ContactError[0].errorName.style.display="block"
          }else{
                ContactError[1].errorEmail.style.display= "block"
          }
        }
      }
      if(nameInput.value.trim() != ""){
        inputChange('name',  ContactError[0].errorName, letterOnlyReg, ContactError[0].nameNotValid, ContactError[0].isRequired)
      }
      if(emailInput.value.trim() != ""){
        inputChange('email',  ContactError[1].errorEmail, emailReg, ContactError[1].emailNotValid, ContactError[1].isRequired)
      }
      if(phoneInput.value.trim() != ""){
        inputChange('phone', false, numberOnlyReg, ContactError[2].phoneNotValid, ContactError[2].isRequired)
      }
      if (isAllValid()){
        formSection.classList.remove('invalid');
        formSection.classList.add('valid');
        successMessageSection.style.display="flex"
        formSection.reset();     // to rest all input value after submit 
      }else{
        inputOnKeyUp()
      }
}
// check all items is valid to submit the form 
function isAllValid(){
for(let i = 0; i < ContactError.length; i++){
    if(!(ContactError[i].isValid)){
      return false;
    }
  }
return true;
}
//on keyup input
function inputOnKeyUp() {
formFieldes.forEach(function(input) {
  input.addEventListener("keyup",function() { 
    if(this.name == 'form_name'){
      inputChange('name',  ContactError[0].errorName, letterOnlyReg, ContactError[0].nameNotValid, ContactError[0].isRequired)
    }else if (this.name == 'form_email'){
      inputChange('email',  ContactError[1].errorEmail, emailReg, ContactError[1].emailNotValid, ContactError[1].isRequired)
    }else if (this.name == 'form_phone'){
      inputChange('phone', false, numberOnlyReg, ContactError[2].phoneNotValid, ContactError[2].isRequired)
    }
  });
});
}
function inputChange(inputName, require, regx, notValid, isRequired){
      let inputElement =  document.querySelector(`#contact_form .${inputName} input`);
      let value = document.querySelector(`#contact_form .${inputName} input`).value.trim()
      if(value === ""){
      if(isRequired){
          notValid.style.display="none"
          require.style.display="block"
          inputElement.classList.add("error-input")
          if(inputName == "name"){
            ContactError[0].isValid = false
          }else{
            ContactError[1].isValid = false
          }
    }else{
          notValid.style.display="none"
          ContactError[2].isValid = true
          inputElement.classList.remove("error-input")
    }
  }else{
        if(isRequired){
          require.style.display="none"
        }
        if(!value.match(regx)){
            notValid.style.display="block"
            inputElement.classList.add("error-input")
            if(inputName == "name"){
              ContactError[0].isValid = false
            }else if (inputName == "phone"){
              ContactError[2].isValid= false
            } else{
              ContactError[1].isValid = false
            }
          }else{
            notValid.style.display="none"
            inputElement.classList.remove("error-input")
            if(inputName == "name"){
              ContactError[0].isValid = true
            }else if (inputName == "phone"){
              ContactError[2].isValid= true
            }else{
              ContactError[1].isValid = true
            }
          } 
      }
}
submitButton.addEventListener("click", validateForm)








/* Load More Items */
$(window).ready(function() {
  var loadBtn = $('.blog .loading');
  var controlItems = 3;
  loadBtn.on('click', loadItems);

  loadItems();

  function loadItems() {
    $.ajax({
      method: 'get',
      url: 'http://jsonplaceholder.typicode.com/users',
      success: function(data) {
        for (let i = (controlItems - 3); i < controlItems; i++) {
          if (data.length != i) {
              var element = `<div class="col-md-4 col-12">
                  <div class="blog__content">
                      <div class="blog__img">
                          <img src="imgs/30-525x328.png">
                      </div>
                      <h4 class="blog__tittle">Lorem Ipsum ${data[i].id}</h4>
                      <p class="blog__artical">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                          Lorem Ipsum has been the industry' Lorem Ipsum is simply dumm Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                          Lorem Ipsum has been the industry' Lorem Ipsum is simply dumm</p>
                      <button type="button" class="btn btn-primary more-blog" data-toggle="modal" data-target="#exampleModal" data-src="imgs/30-525x328.png"> 
                              Continue Reading ..
                      </button>
                  </div>
              </div>`;
            $('.blog__container').append(element);
            
          } else {
            loadBtn.addClass('opacity');
          }
        }
        controlItems += 3;
      }
    })
  }

  $(document).on('click', '.more-blog', function () {
    var imgModal = $(this).attr('data-src');
    var contentModalTilttle = $(this).siblings('.blog__tittle').text();
    var contentModalparagraph = $(this).siblings('.blog__artical').text();
    // console.log(contentModalTilttle)
    $('.modal .modal-content .modal-body .img img').attr('src', imgModal);
    $('.modal .modal-content .modal-body .content h4').text(contentModalTilttle);
    $('.modal .modal-content .modal-body .content p').text(contentModalparagraph);
    
});

})
