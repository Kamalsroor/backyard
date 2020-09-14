<!--start home page-->
<div class="slider" style="
    background-image: url({{it()->url(setting()->home_photo)}});
">
    <div class="layOut"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="artical">
                    <p>
                        {{ Str::limit(setting()->home_title , $limit = 50, $end = '...') }}
                        
                    </p>
                    <button class="slider__referToAboutUs">
                        <a href="#aboutUs"><span>Discover US</span></a>
                    </button>
                </div>
            </div>
            <!-- start form -->
                <div class="form">
                    <div class="form__content"> 
                        <form id="contact_form" name="contact_form" class="invalid" action="" method="post"> 
                            <h1>Lets Us Call You !</h1>
                            <p>To Help You Choose Your property</p>
                            <div class="row no-gutters">
                                <div class="col-sm-6">
                                    <div class="form-group name">
                                        <input name="form_name" class="form-control rounded-0 input-reqiured" type="text"
                                            placeholder="Enter Name" required="">
                                        <p class="error required">Required</p>
                                        <p class="error not-valid">Characters Only</p>
                                    </div>
                                </div>
                    
                                
                                <div class="col-sm-6">
                                    <div class="form-group phone ml-2">
                                        <input name="form_phone" class="form-control rounded-0" type="text"
                                            placeholder="Enter Phone">
                                        <p class="error not-valid">Numbers Only</p>
                    
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group email">
                                        <input name="form_email" class="w-100 form-control rounded-0 input-reqiured"
                                            type="email" placeholder="Enter Email" id="email">
                                        <p class="error required">Required</p>
                                        <p class="error not-valid">Enter Valid Email</p>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="form-group">
                                <textarea name="form_message" class="rounded-0 form-control required" id="text" rows="5"
                                    placeholder="Enter Message"></textarea>
                                    <label class="container p-0 mt-3">
                                        <input type="checkbox" checked="checked" class="mt-1 resize">
                                        <span class="checkmark"></span>
                                        I consent to having this website store my submitted information so they can respond to my inquiry.
                                    </label>
                            </div>
                            <div class="form-group m-0">
                                <input name="form_botcheck" class="form-control" type="hidden" value="" />
                                <button type="submit"
                                    class="btn btn-submit btn-dark btn-theme-colored btn-flat mr-5 rounded-0 py-3"
                                    data-loading-text="Please wait...">SUBMIT</button>
                            </div>
                        </form>
                        <div class="form__closing"><span><i class="fa fa-times" aria-hidden="true"></i></span></div>
                        <div class="calling-button">
                            <span class="d-md-block d-none">
                                <i class="fas fa-phone-volume phone-form"></i>
                            </span>
                        </div>
                    </div>
                </div>
            <!-- end form  -->
        </div>
    </div>
</div>
<!--end home page-->