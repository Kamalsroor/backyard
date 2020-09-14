<!-- start location  -->
<div class="location" id="contact">
    <div class="location__map-img">
        <iframe src="{{setting()->map}}" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        <!-- <img src="imgs/Capture.png"> -->
    </div>
    <div class="location__cart">
        <div class="container">
            <h4>How To Find Us</h4>
            <div class="phone">
                <a href="tel:{{setting()->phone}}"><span><i class="fas fa-phone"></i></span>
                    {{setting()->phone}}
                </a>
            </div>
            <div class="email">
                <a href="mailto:{{setting()->email}}">
                    <span><i class="far fa-envelope-open"></i></span>
                    {{setting()->email}}
                </a>
            </div>
            <div class="location-address">
                <a href="https://www.google.com/maps"><span><i class="fas fa-home"></i></span>
                    {{setting()->address}}
                </a>
            </div>
            <div class="socialLinks">
                <a href="{{setting()->facebook}}"><i class="fab fa-facebook-f"></i></a> 
                <a href="{{setting()->instagram}}"> <i class="fab fa-instagram"></i></a>
                <a href="{{setting()->linkedin}}"> <i class="fab fa-linkedin-in"></i></a> 
            </div>
            <div class="opening-hours">
                <h4>Opening Hours</h4>

                @if(!empty(setting()->opening_hours))
                @php if(!is_array(setting()->opening_hours)) setting()->opening_hours = json_decode(setting()->opening_hours); @endphp
                @foreach(json_decode(setting()->opening_hours) as $key=> $opening_hour)
                              
                                <p>{{$opening_hour->deys}}<span>{{$opening_hour->hours}}</span></p>
                    @endforeach
            @endif
            </div>
        </div>
    </div>

</div>
<!-- end location  -->
