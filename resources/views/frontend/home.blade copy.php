@extends('frontend.index')
@section('content')


    <!-- Header -->
    <header class="home-header" style="background-image: url('{{it()->url(setting()->home_photo)}}')">
        <div class="container">
            <div class="header-wrapper col-md-5">
                <h1>{{setting()->home_title}}</h1>
                <h3>{{setting()->home_des}}</h3>
                <a class="discover-more internal-link" href="#discoverMe">{{trans('admin.discover_more')}}</a>
            </div>
            <div class="social-links">
                <a class="facebook"  target="_blank" href="{{setting()->facebook}}"><i class="fab fa-facebook-f"></i></a>
                <a class="twitter"  target="_blank" href="{{setting()->twitter}}"><i class="fab fa-twitter"></i></a>
                <a class="instagram"  target="_blank" href="{{setting()->instagram}}"><i class="fab fa-instagram"></i></a>
                <a class="youtube"  target="_blank" href="{{setting()->youtube}}"><i class="fab fa-youtube"></i></a>
            </div>
            <a href="#discoverMe" class="swipe-arrow internal-link"><i class="fa fa-angle-down"></i></a>
        </div>
    </header>
    <!-- Header -->




   <!-- Discover Me section -->
   <section id="discoverMe" class="discover-me">
    <div class="container">
        <div class="modal pop-up-video fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" id="closeVideo" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="modal-body">
                        <iframe id="player" width="1068" height="400" src="{{getYoutubeEmbedUrl(setting()->discover_me_video)}}" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 order-2 order-md-1 d-flex align-items-center">
                <div class="section-wrapper">
                    <h2 class="section-title"><span class="title">{{trans('admin.discover_me')}}</span></h2>
                    <h3>{{setting()->discover_me_titel}}</h3>
                    <p>
                      {!! setting()->discover_me_des !!}
                    </p>
                    <a class="main-btn" href="{{url('/about-us')}}"><i class="fas fa-book-open"></i>{{trans('admin.read_more')}}</a>
                    <a href="#" data-toggle="modal" data-target="#exampleModal" id="watchVideoBtn" class="main-btn btn-hover"><i class="fas fa-play"></i>{{trans('admin.watch_video')}}</a>
                </div>
            </div>
            <div class="col-md-5 order-1 d-none d-md-block">
                <img src="{{it()->url(setting()->discover_me_photo)}}" alt="{{setting()->discover_me_titel}}">
            </div>
        </div>
    </div>
</section>

<!-- Our Courses Simple Section -->
<section id="ourCourses" class="our-courses">
    <div class="overlay"></div>
    <div class="container">
        <div class="title-wrapper text-center">
            <h2 class="fancy-title">{{trans('admin.our_courses')}}</h2>
            <div class="custom-border">
                <span class="line"></span>
                <span class="circle"></span>
                <span class="line"></span>
            </div>
        </div>
        <div class="our-courses-carousel">
            @foreach ($Courses as $Course)
                @php
                    
                    $Group = $Course->GetGroupByDate();
                @endphp
                @if ($Group != false)
                    
                <article class="card">
                    <section class="card-img">
                        <img src="{{ it()->url($Course->photo) }}" class="card-img-top" alt="events-1">
                        <time datetime="{{date('d M yy h:i a', strtotime($Group->strat_at))}}">{{date('d', strtotime($Group->strat_at))}} <br> {{date('M', strtotime($Group->strat_at))}}<span class="time">{{date('h:i', strtotime($Group->strat_at))}} <br> {{date('a', strtotime($Group->strat_at))}}</span></time>
                    </section>
                    <section class="card-body">
                        <section class="text-container">
                            <h3 class="card-title">{{$Course->titel}}</h3>
                            <p class="card-text">
                                {!! $Course->mini_des !!}
                            </p>
                        </section>
                        <p class="course-start-time">
                            <i class="far fa-clock"></i> starts at <time datetime="{{date('d M yy h:i a', strtotime($Group->strat_at))}}"> <span>{{date('d', strtotime($Group->strat_at))}}</span> {{date('M yy', strtotime($Group->strat_at))}} , <span class="time">{{date('h:i', strtotime($Group->strat_at))}}</span> {{date('a', strtotime($Group->strat_at))}}</time>
                        </p>
                        <p class="course-money">
                            <i class="fas fa-money-bill-wave"></i> <span>{{$Group->price}}</span> EGP for <span>{{$Group->sessions}}</span> session
                        </p>
                    </section>
                    <section class="card-footer">
                        <div class="row no-gutters">
                            <div class="col-md-6">
                                <a href="{{url('/our-courses')}}/{{$Course->id}}" class="read-more">read more</a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{url('/register')."?type=courses&id=".$Course->id."&group_id=".$Group->id}}" class="register">register</a>
                            </div>
                        </div>
                    </section>
                </article>
                @endif
            @endforeach
        </div>
    </div>
</section>

<!-- Simple Events Section -->

<section id="simpleEvents" class="events">
    <div class="container">
        <h2 class="section-title mb-4"><span class="title">{{trans('admin.simple_events')}}</span></h2>
        <div class="events-slider">
            @foreach ($Events as $Event)
                
            <article class="card">
                <img src="{{it()->url($Event->img)}}" class="card-img-top" alt="{{$Event->title}}">
                <section class="card-body p-1 p-lg-2">
                    <time datetime="{{$Event->date}}">{{$Event->date}}</time>
                    <time>{{date('h:i a', strtotime($Event->time))}}</time>
                    <section class="text-container">
                        <h3 class="card-title">{{$Event->title}}</h3>
                        <p class="card-text">
                            {{$Event->des}}
                        </p>
                    </section>
                    <a href="{{url('/events-details')}}/" class="main-btn btn-hover">{{trans('admin.read_more')}}</a>
                </section>
            </article>
            @endforeach
           
        </div>
    </div>
</section>


    <!-- Our Numbers Section -->
    <section class="our-numbers">
        <div class="container-fluid">
            <div class="row d-none d-md-flex">
                <div class="our-number-item col-md-6 col-lg-3">
                    <i class="fas fa-users"></i>
                    <span class="number-value">{{setting()->trainees}}</span>
                    <span class="title">Trainees</span>
                </div>
                <div class="our-number-item col-md-6 col-lg-3">
                    <i class="fas fa-university"></i>
                    <span class="number-value">{{setting()->lectures}}</span>
                    <span class="title">Lectures</span>
                </div>
                <div class="our-number-item col-md-6 col-lg-3">
                    <i class="fas fa-globe"></i>
                    <span class="number-value">{{setting()->events}}</span>
                    <span class="title">Events</span>
                </div>
                <div class="our-number-item col-md-6 col-lg-3">
                    <i class="fas fa-user-tie"></i>
                    <span class="number-value">{{setting()->company}}</span>
                    <span class="title">Company</span>
                </div>
            </div>
            <div class="our-numbers-carousel d-md-none">
                <div class="our-number-item">
                    <i class="fas fa-users"></i>
                    <span class="number-value">{{setting()->trainees}}</span>
                    <span class="title">Trainees</span>
                </div>
                <div class="our-number-item">
                    <i class="fas fa-university"></i>
                    <span class="number-value">{{setting()->lectures}}</span>
                    <span class="title">Lectures</span>
                </div>
                <div class="our-number-item">
                    <i class="fas fa-globe"></i>
                    <span class="number-value">{{setting()->events}}</span>
                    <span class="title">Events</span>
                </div>
                <div class="our-number-item">
                    <i class="fas fa-user-tie"></i>
                    <span class="number-value">{{setting()->company}}</span>
                    <span class="title">Company</span>
                </div>
            </div>
        </div>
    </section>

<!-- Latest News and out Tesimonials Sections -->

<section class="section-wrapper news-and-testimonials">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 m-lg-0">
                <section id="latestNews" class="latest-news">
                    <h2 class="section-title mb-5"><span class="title">{{trans('admin.latest_news')}}</span></h2>
                    <div class="latest-news-slider">
                                    
                        @foreach ($News as $News)
                        <div>
                            <article class="card">
                                <div class="row no-gutters">
                                    <div class="col-5 d-none d-md-block">
                                        <div class="card-img" style="background-image: url('{{it()->url($News->photo)}}');"></div>

                                        {{-- <img src="{{it()->url($News->photo)}}" class="card-img-top" alt="events-1"> --}}
                                    </div>
                                    <div class="col-sm-7">
                                        <section class="card-body p-3">
                                            <section class="text-container">
                                                <h3 class="card-title">{{$News->titel}}</h3>
                                                <p class="card-text">
                                                    {{$News->subject}}
                                                </p>
                                            </section>
                                            <time datetime="3 oct 2016 11:00"><i class="far fa-clock"></i> {{date('d M yy h:i a', strtotime($News->created_at))}}</time>
                                        </section>
                                    </div>
                                </div>
                            </article>
                        </div>
                        @endforeach
             
                    </div>
                </section>
            </div>
            <div class="col-lg-6">
                <Section id="ourTestimonials" class="our-testimonials">
                    <h2 class="section-title mb-5"><span class="title">{{trans('admin.our_testimonials')}}</span></h2>
                    <div class="nav-buttons">
                        <button class="main-btn btn-prev"><i class="fas fa-chevron-left"></i></button>
                        <button class="main-btn btn-next"><i class="fas fa-chevron-right"></i></button>
                    </div>
                    <div class="our-testimonils-slider">
                      @foreach ($Testimonials as $Testimonial)
                          <article class="card">
                            <section class="card-img">
                                <img src="{{it()->url($Testimonial->photo)}}" class="card-img-top" alt="events-1">
                            </section>
                            <blockquote class="blockquote card-body p-1 p-lg-2 text-center">
                                  <blockquote class="blockquote text-center">
                                      <p class="card-text mb-0">
                                          {{$Testimonial->message}}
                                      </p>
                                      
                                      
                                      <footer class="blockquote-footer">
                                          <span class="name">{{$Testimonial->name}}</span>
                                          <span class="job-title">{{$Testimonial->job}}</span>
                                      </footer>
                                  </blockquote>
                            </blockquote>
                          </article>
                        @endforeach
                    </div>
                </Section>
                
                
            </div>
        </div>
    </div>
</section>
@stop