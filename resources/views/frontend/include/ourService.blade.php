<!-- start our service  -->
<div data-related="services" class="ourService" id="ourServices">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-12 ourService__carts">
                <div class="owl-carousel owl-theme owl-drag owl-loaded ourService__carousel">
                    
                    @foreach ($Service as $Service)
                        <div class="ourService__cart">
                            <div class="img">
                                <img src="{{it()->url($Service->photo)}}">
                                {{-- <i class="fas fa-home"></i> --}}
                            </div>
                            <h4>{{ Str::limit($Service->title , $limit = 20, $end = '...') }}</h4>
                            <p>{{ Str::limit($Service->des , $limit = 150, $end = '...') }}</p>
                            <a class="ourService__call" href="#">Call Us</a>
                        </div>
                        
                    @endforeach
         
            </div>
        </div>
        <div class="col-lg-5 col-12 content">
            <h1 class="ourService__tittle"> our service</h1>
            <p>{{ Str::limit(setting()->our_service_des , $limit = 200, $end = '...') }}</p>
            <a class="visitUs" href="#contact">
                <span>Visit Us</span>
            </a>
        </div>
    </div>
</div>
</div>
<!-- end our service  -->



