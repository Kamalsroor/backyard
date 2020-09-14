<!-- start our service  -->
<div class="ourService" id="ourServices">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-12 ourService__carts">
                <div class="owl-carousel owl-theme owl-drag owl-loaded ourService__carousel">
                    
                    @foreach ($Service as $Service)
                        <div class="ourService__cart">
                            <div class="img">
                                <i class="fas fa-home"></i>
                            </div>
                            <h4>{{ Str::limit($Service->title , $limit = 20, $end = '...') }}</h4>
                            <p>{{ Str::limit($Service->des , $limit = 150, $end = '...') }}</p>
                            <button class="ourService__call"><a href="#">Call Us</a></button>
                        </div>
                        
                    @endforeach
         
            </div>
        </div>
        <div class="col-lg-5 col-12 content">
            <h1 class="ourService__tittle"> our service</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry' Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                Lorem Ipsum has been the industry'</p>
                <button class="visitUs"><a href="#contact">Visit Us</a></button>
        </div>
    </div>
</div>
</div>
<!-- end our service  -->