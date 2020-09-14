<!----header---->
<header>
    <div class="sticky-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-2 col-xl-3 col-5 sticky-header__logo">
                    <div class="sticky-header__img-title">
                        <a href="#" class="d-flex align-items-center justify-content-center">
                            <div class="img d-flex align-items-center">
                                <img src="{{it()->url(setting()->logo)}}">
                            </div>
                            <p class="sticky-header__tittle">
                            The
                                @php
                                $sitename_en = explode(" ",setting()->sitename_en);
                                @endphp
                                <span>{{$sitename_en[0]}}</span>
                                @php
                                    unset($sitename_en[0]);
                                @endphp
                                @foreach ($sitename_en as $name)
                                    {{$name}} 
                                @endforeach
                            </p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-xl-7 col-2 menu-name">
                    <div class="menu d-lg-block d-none">
                        <ul class="d-flex justify-content-lg-center">
                            <li class="menu__list active">
                                <a href="#" data-target="home" class="menu__link active">home</a>
                            </li>
                            <li class="menu__list">
                                <a href="#" data-target="about" class="menu__link">about</a>
                            </li>
                            <li class="menu__list">
                                <a href="#" data-target="service" class="menu__link">service</a>
                            </li>
                            <li class="menu__list">
                                <a href="#" data-target="properties" class="menu__link">properties</a>
                            </li>
                            <li class="menu__list">
                                <a href="#" data-target="blogs" class="menu__link">blogs</a>
                            </li>
                            <li class="menu__list">
                                <a href="#" data-target="team" class="menu__link">team</a>
                            </li>
                            <li class="menu__list">
                                <a href="#" data-target="contact" class="menu__link">contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="mobile-menu d-flex d-lg-none">
                        <div class="mobile-menu__button collapsed" data-toggle="collapse"
                            href="#multiCollapseExample3" role="button" aria-expanded="false">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="mobile-menu__dropdown collapse" id="multiCollapseExample3">
                            <ul>
                                <li><a href="#">home</a></li>
                                <li><a href="#aboutUs">about</a></li>
                                <li><a href="#ourServices">service</a></li>
                                <li><a href="#prop">properties</a></li>
                                <li><a href="#blog_section">blogs</a></li>
                                <li><a href="#testimonial">testmonial</a></li>
                                <li><a href="#contact">contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-5 phone">
                    <p class="static-header__phone-num d-flex justify-content-end justify-content-lg-start"><a href="tel:{{setting()->phone}}"> <i class="fa fa-phone" aria-hidden="true"></i>{{setting()->phone}}</a></p>
                </div>
            </div>
        </div>
    </div>
</header>
<!--end of header-->