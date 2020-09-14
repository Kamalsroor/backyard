<!--start home page-->
<div class="slider" style="background-image: url({{it()->url(setting()->home_photo)}});">
    <div class="layOut"></div>
    <div class="container">
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
                        <form class="contact-form"> 
                            <h1>Lets Us Call You !</h1>
                            <p>To Help You Choose Your property</p>
                            <div class="row no-gutters">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input name="name" class="form-control" type="text"
                                            placeholder="Enter Name">
                                    </div>
                                </div>
                    
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input name="phone" class="form-control" type="tel"
                                            placeholder="Enter Phone">
                    
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input name="email" class="form-control"
                                            type="email" placeholder="Enter Email">
                                    </div>
                                </div>
                            </div>
                    
                            <div class="form-group">
                                <textarea name="message" class="form-control" placeholder="Enter Message"></textarea>
                                <label>
                                    <input type="checkbox" checked="checked" class="resize">
                                    <span class="checkmark"></span>
                                    I consent to having this website store my submitted information so they can respond to my inquiry.
                                </label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn-submit">SUBMIT</button>
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