  
  


    <!-- start footer  -->
    <footer>
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-md-5 col-12">
                        <div class="footer__summrize">
                            <h4>{{setting()->sitename_en}}</h4>
                            <p class="pragraph">{{setting()->footer_des}}</p>
                            <div class="socialLinks">
                                <a href="{{setting()->facebook}}"><i class="fab fa-facebook-f"></i></a> 
                                <a href="{{setting()->instagram}}"> <i class="fab fa-instagram"></i></a>
                                <a href="{{setting()->linkedin}}"> <i class="fab fa-linkedin-in"></i></a>
                                {{-- <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>  --}}
                                {{-- <a href="https://instgram.com"> <i class="fab fa-instagram"></i></a> --}}
                                {{-- <a href="https://www.linekin.com"> <i class="fab fa-linkedin-in"></i></a>  --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="footer__quick-links">
                            <h4>Quick Links</h4>
                            <ul>
                                <div class="row">
                                    <div class="col-md-6">
                                        <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Home</a></li>
                                        <li><a href="#prop"><i class="fa fa-angle-right" aria-hidden="true"></i>Property</a></li>
                                        <li><a href="#blog_section"><i class="fa fa-angle-right" aria-hidden="true"></i>Blog</a></li>
                                        <li><a href="#contact"><i class="fa fa-angle-right" aria-hidden="true"></i>Contact</a></li>
                                    </div>
                                    <div class="col-md-6">
                                        <li><a href="#aboutUs"><i class="fa fa-angle-right" aria-hidden="true"></i>About</a></li>
                                        <li><a href="#ourServices"><i class="fa fa-angle-right" aria-hidden="true"></i>Service</a></li>
                                        <li><a href="#testimonial"><i class="fa fa-angle-right" aria-hidden="true"></i>Team</a></li>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                            <h4>Recent Properties</h4>
                
                        @foreach ($Property as $Propertys)
                            
                            <div class="recent-properties">
                                <div class="row">
                                    <div class="col-lg-4 col-6">
                                        <div class="recent-properties__img">
                                            <img src="{{it()->url($Propertys->photo)}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-6">
                                        <div class="recent-properties__content">
                                            <p>{{$Propertys->name}}</p>
                                            <div class="recent-properties__content__img">
                                                <i class="far fa-clone"></i>
                                            </div>
                                            <p>{{$Propertys->space}} m2</p>
                                        </div>
                                    </div>
                                </div>
                            </div>                    
                        @endforeach
                    </div>
                </div>
            </div>
            <p class="right-copy">All Right Reservied @ TBY Co. ,, Powerd By <span>Scale Team</span></p>
        </div>
    </footer>
    <!-- end footer  -->
    <!-- Modal blog -->
    <div class="modal fade bolg-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img">
                    <img>
                </div>
                <div class="content">
                    <h4></h4>
                    <p></p>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- modal video  -->
    <div class="modal fade bolg-modal" id="videoModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div> -->
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </button>
                <div class="video-modal">
                    <video controls>
                        
                    </video>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- Start Preloading Of Page -->
    <div class="preload">
        <section class="preload__container">
            <div class="preloader"></div>
        </section>
    </div>
    <!-- End Preloading Of Page -->

    <div class="buttons">
        <!--start button for form  -->
        <div class="buttom-form d-none">
            <i class="far fa-envelope-open"></i>
        </div>
        <!-- end button for form  -->
        <!-- Start to Up button -->
        <div class="general-to-up ">
            <i class="fas fa-angle-up"></i>
        </div>
        <!-- End to Up button -->
    </div>

  
    <script src="{{url('frontend')}}/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="{{url('frontend')}}/js/vendor/popper.min.js"></script>
    <script src="{{url('frontend')}}/js/vendor/all.min.js"></script>
    <script src="{{url('frontend')}}/js/vendor/bootstrap.min.js"></script>
    <script src="{{url('frontend')}}/js/vendor/owl.carousel.min.js"></script>
    <script src="{{url('frontend')}}/js/vendor/jquery.validate.js"></script>
    <script src="{{url('frontend')}}/js/vendor/jquery.nicescroll.min.js"></script>
    <script src="{{url('frontend')}}/js/pages/main.js"></script>
    <script src="{{url('frontend')}}/js/properties/properties.js"></script>

    
    <!-- Start scripts -->
   
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    @if(session()->has('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
                // footer: '<a href>Why do I have this issue?</a>'
            })
        </script>
    @endif
    @if(count($errors->all()) > 0)
        <script>
            Swal.fire({
                icon: 'error',
                title: '{{  $errors->all()[0] }}',
                text: '{{  $errors->all()[0] }}',
                // footer: '<a href>Why do I have this issue?</a>'
            })
        </script>

        
    @endif
    @if(session()->has('errors'))

        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
                // footer: '<a href>Why do I have this issue?</a>'
            })
        </script>
    @endif
    @if(session()->has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif


    @stack('js')

</body>
</html>