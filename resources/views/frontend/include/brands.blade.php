<!-- start logo  -->
<div class="brands-logo">
    <div class="container">
        <div class="owl-carousel owl-theme owl-drag owl-loaded display__brand-logo">
            @foreach ($Brand as $Brand)
            <div class="img">
                    <img src="{{it()->url($Brand->logo)}}">
            </div>
            @endforeach
            
        </div>
    </div>
</div>
<!-- end logo  -->