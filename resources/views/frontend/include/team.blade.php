<!-- start team  -->
<div data-related="team" class="team" id="testimonial"> 
    <div class="container">
        <h1>team</h1>
        <p class="summrize">{{ Str::limit(setting()->team_des , $limit = 200, $end = '...') }}</p>
        <div class="owl-carousel owl-theme owl-drag owl-loaded" id="team__carousel">
            @foreach ($Team as $Team)
    
                <div>
                    <div class="cart">
                        <div class="img">
                            <img src="{{it()->url($Team->image)}}">
                        </div>
                        <div class="team__info">
                            <h4>{{ Str::limit($Team->name , $limit = 20, $end = '...') }}</h4>
                            <p>{{ Str::limit($Team->jop , $limit = 20, $end = '...') }}</p>
                            <p><a href="tel:{{$Team->phone}}">+ {{$Team->phone}}</a></p>
                            <p><a href="">{{$Team->email}}</a></p>
                            <div class="socialLinks">
                                @if ($Team->facebook != null)
                                <a target="_blank" href="{{$Team->facebook}}"><i class="fab fa-facebook-f"></i></a> 
                                @endif
                                @if ($Team->instgram != null)
                                <a target="_blank" href="{{$Team->instgram}}"> <i class="fab fa-instagram"></i></a>
                                @endif
                                @if ($Team->linkedin != null)
                                <a target="_blank" href="{{$Team->linkedin}}"> <i class="fab fa-linkedin-in"></i></a> 
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
<!-- end team  -->