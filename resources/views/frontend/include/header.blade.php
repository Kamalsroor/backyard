<!----header---->
<header>
    <div class="sticky-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-3  col-6 sticky-header__logo">
                    <div class="sticky-header__img-title">
                        <div class="img"><img src="{{it()->url(setting()->logo)}}"></div>
                        <p class="sticky-header__tittle">
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
                    </div>
                </div>
                <div class="col-lg-7 col-2 menu-name">
                    <div class="menu d-lg-block d-none">
                        <ul>
                            
                            
                            <li class="menu__list active"><a href="#" class="menu__link active">home</a></li>
                            <li class="menu__list"><a href="#aboutUs" class="menu__link">about</a></li>
                            <li class="menu__list"><a href="#ourServices" class="menu__link">service</a></li>
                            <li class="menu__list"><a href="#prop" class="menu__link">properties</a></li>
                            <li class="menu__list"><a href="#blog_section" class="menu__link">blogs</a></li>
                            <li class="menu__list"><a href="#testimonial" class="menu__link">testmonial</a></li>
                            <li class="menu__list"><a href="#contact" class="menu__link">contact</a></li>
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
                <div class="col-lg-2 col-4 phone">
                    <p class="static-header__phone-num"><a href="tel:01100075275"> <i class="fa fa-phone" aria-hidden="true"></i>+ 01100075275</a></p>
                </div>
            </div>
        </div>
    </div>
</header>
<!--end of header-->