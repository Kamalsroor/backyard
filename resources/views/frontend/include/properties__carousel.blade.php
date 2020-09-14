   <div data-related="properties" class="owl-carousel owl-theme owl-drag owl-loaded row properties__carousel">
        @foreach ($Property as $Propertys)
        

            <div class="col-lg-4  col-12">
                <div class="properties__content">
                    <div class="properties__content__img" data-video="{{it()->url($Propertys->video)}}">
                        <div class="layout"></div>
                        <img src="{{it()->url($Propertys->photo)}}">
                        <button class="rental">{{$Propertys->type}}</button>
                        <button class="Feature">{{$Propertys->badge}}</button>
                        <button type="button" class="video" data-toggle="modal" data-target="#videoModal" data-src="movie.ogg">
                            <img src="{{url('frontend')}}/imgs/video-solid.svg">
                        </button>
                        <p><i class="fas fa-map-marker-alt"></i>{{$Propertys->address}}</p>
                    </div>
                    <div class="properties__content__info">
                        <h1>{{ Str::limit($Propertys->name , $limit = 50, $end = '...') }}</h1>
                        <p class="content__info__pragraph">{{ Str::limit($Propertys->des , $limit = 150, $end = '...') }}</p>
                        <div class="counter">
                            <div class="row">
                                <div class="col-md-4 col-4 bed">
                                    <i class="fas fa-bed"></i>
                                    <p>{{$Propertys->rooms}}</p>
                                </div>
                                <div class="col-md-3 col-4 toilet">
                                    <i class="fas fa-toilet"></i>
                                    <p>{{$Propertys->wc}}</p>
                                </div>
                                <div class="col-md-5  col-4 meters">
                                    <i class="far fa-clone"></i>
                                    <p class="meter">{{$Propertys->space}} m2</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="date-calling">
                        <p>{{date('d/m/yy', strtotime($Propertys->created_at))}}</p>
                        <button><a href="tel:{{setting()->phone}}">Call Us</a></button>
                    </div>
                </div>
            </div>
            
        @endforeach
    </div>
    {{-- <div class="tigger-buttons">
        <button class="active">1</button>
        <button>2</button>
        <button>3</button>
        <button>4</button>
    </div> --}}

    @if ($Property->lastPage() > 1)
    <div class="col-12">
        <nav aria-label="pagination" class="ml-auto">
            <ul class="pagination">
                <li class="page-item {{ ($Property->currentPage() == 1) ? ' disabled' : '' }}">
                    <a class="page-link" data-url="{{ $Property->url(1) }}" tabindex="-1" aria-disabled="true">
                        <i class="fas fa-angle-double-left"></i>
                    </a>
                </li>
            
                <li class="page-item {{ ($Property->currentPage() == 1) ? ' disabled' : '' }}">
                    <a href="#" data-url="{{ $Property->url(1) }}" class="a-link page-link">Previous</a>
                </li>
                @for ($i = 1; $i <= $Property->lastPage(); $i++)
                    <li class="page-item {{ ($Property->currentPage() == $i) ? ' active' : '' }}">
                        <a href="#" data-url="{{ $Property->url($i) }}"class="a-link page-link">{{ $i }}</a>
                    </li>
                @endfor
                <li class="page-item {{ ($Property->currentPage() == $Property->lastPage()) ? ' disabled' : '' }}">
                    <a href="#" data-url="{{ $Property->url($Property->currentPage()+1) }}" class="a-link page-link">Next</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                        <i class="fas fa-angle-double-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    @endif