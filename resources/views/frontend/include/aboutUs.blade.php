<!-- start about us -->
<div class="aboutUs" id="aboutUs">
    <div class="container">
        <h1 class="aboutUs__tittle">ABOUT US</h1>
        <p class="aboutUs__artical">{{ Str::limit(setting()->discover_me_des , $limit = 200, $end = '...') }}</p>
    <div class="owl-carousel owl-theme owl-drag owl-loaded aboutUs__carousel">
   @foreach ($Abouts as $About)
        <div class="aboutUs__carts">
            <div class="d-flex align-items-center carts__info">
                <div class="img">
                    <img src="{{it()->url($About->photo)}}">
                </div>
                <div class="carts__artical">
                    <h4>{{ Str::limit($About->name , $limit = 150, $end = '...') }}</h4>
                    <p>{{ Str::limit($About->des , $limit = 350, $end = '...') }}</p>
                </div>
            </div>
        </div>
        @endforeach
      
      
    </div>
    </div>
</div>
<!-- end about us  -->