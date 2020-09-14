@extends('admin.index')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="widget-extra body-req portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase font-dark">{{$title}}</span>
                </div>
                <div class="actions">
                    <a  href="{{aurl('settings')}}"
                        class="btn btn-circle btn-icon-only btn-default"
                        tooltip="{{trans('admin.show_all')}}"
                        title="{{trans('admin.show_all')}}">
                        <i class="fa fa-list"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default fullscreen"
                        href="#"
                        data-original-title="{{trans('admin.fullscreen')}}"
                        title="{{trans('admin.fullscreen')}}">
                    </a>
                </div>
            </div>
            <div class="portlet-body form">
                <div class="col-md-12">
                    {!! Form::open(['url'=>aurl('/settings'),'id'=>'settings','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
                    







                    
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item active">
                          <a class="nav-link " id="pills-Genral-tab" data-toggle="pill" href="#pills-Genral" role="tab" aria-controls="pills-Genral" aria-selected="true">Genral</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="false">Home</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="pills-event-tab" data-toggle="pill" href="#pills-event" role="tab" aria-controls="pills-event" aria-selected="false">Event</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-about-tab" data-toggle="pill" href="#pills-about" role="tab" aria-controls="pills-about" aria-selected="false">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-course-tab" data-toggle="pill" href="#pills-course" role="tab" aria-controls="pills-course" aria-selected="false">Course</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-privacy-policy-tab" data-toggle="pill" href="#pills-privacy-policy" role="tab" aria-controls="pills-privacy-policy" aria-selected="false">privacy&refund policy</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="pills-register-tab" data-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-experts-in-tab" data-toggle="pill" href="#pills-experts-in" role="tab" aria-controls="pills-experts-in" aria-selected="false">Experts In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-free-lessons-tab" data-toggle="pill" href="#pills-free-lessons" role="tab" aria-controls="pills-free-lessons" aria-selected="false">Free Lessons</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-our-clients-tab" data-toggle="pill" href="#pills-our-clients" role="tab" aria-controls="pills-our-clients" aria-selected="false">Our Clients</a>
                        </li>
                        
                    </ul>
                      <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade  active in" id="pills-Genral" role="tabpanel" aria-labelledby="pills-Genral-tab">
                            <div class="form-group">
                                {!! Form::label('sitename_en',trans('admin.sitename_en'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::text('sitename_en',setting()->sitename_en,['class'=>'form-control','placeholder'=>trans('admin.sitename_en')]) !!}
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                {!! Form::label('address',trans('admin.address'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::text('address',setting()->address,['class'=>'form-control','placeholder'=>trans('admin.address')]) !!}
                                </div>
                            </div>
                            <br>
                            
                            <div class="form-group">
                                {!! Form::label('phone',trans('admin.phone'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::text('phone',setting()->phone,['class'=>'form-control','placeholder'=>trans('admin.phone')]) !!}
                                </div>
                            </div>
                            <br>


                            <div class="form-group">
                                {!! Form::label('whats_number',trans('admin.whats_number'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::text('whats_number',setting()->whats_number,['class'=>'form-control','placeholder'=>trans('admin.whats_number')]) !!}
                                </div>
                            </div>
                            <br>

                            

                            
                            <div class="form-group">
                                {!! Form::label('personal_information',trans('admin.personal_information'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::textarea('personal_information',setting()->personal_information,['class'=>'form-control','placeholder'=>trans('admin.personal_information')]) !!}
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                {!! Form::label('facebook',trans('admin.facebook'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::text('facebook',setting()->facebook,['class'=>'form-control','placeholder'=>trans('admin.facebook')]) !!}
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                {!! Form::label('twitter',trans('admin.twitter'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::text('twitter',setting()->twitter,['class'=>'form-control','placeholder'=>trans('admin.twitter')]) !!}
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                {!! Form::label('instagram',trans('admin.instagram'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::text('instagram',setting()->instagram,['class'=>'form-control','placeholder'=>trans('admin.instagram')]) !!}
                                </div>
                            </div>
                            <br>


                            <div class="form-group">
                                {!! Form::label('linkedin',trans('admin.linkedin'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::text('linkedin',setting()->linkedin,['class'=>'form-control','placeholder'=>trans('admin.linkedin')]) !!}
                                </div>
                            </div>
                            <br>


                            <div class="form-group">
                                {!! Form::label('youtube',trans('admin.youtube'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::text('youtube',setting()->youtube,['class'=>'form-control','placeholder'=>trans('admin.youtube')]) !!}
                                </div>
                            </div>
                            <br>


                            
                            <div class="form-group">
                                {!! Form::label('email',trans('admin.email'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::text('email',setting()->email,['class'=>'form-control','placeholder'=>trans('admin.email')]) !!}
                                </div>
                            </div>
                            <br>

                                         
                            <div class="form-group col-md-12 col-lg-12">
                                {!! Form::label('mail_img',trans('admin.mail_img'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::file('mail_img',['class'=>'form-control','placeholder'=>trans('admin.mail_img')]) !!}
                                    @if(!empty(setting()->mail_img))
                                    <img src="{{ it()->url(setting()->mail_img) }}" style="width:300px;height:150px" />
                                    @endif
                                </div>
                            </div>
                            <br>

                            
                            <div class="form-group col-md-6 col-lg-6">
                                {!! Form::label('logo',trans('admin.logo'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::file('logo',['class'=>'form-control','placeholder'=>trans('admin.logo')]) !!}
                                    @if(!empty(setting()->logo))
                                    <img src="{{ it()->url(setting()->logo) }}" style="width:50px;height:50px" />
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6 col-lg-6">
                                {!! Form::label('icon',trans('admin.icon'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::file('icon',['class'=>'form-control','placeholder'=>trans('admin.icon')]) !!}
                                    @if(!empty(setting()->icon))
                                    <img src="{{ it()->url(setting()->icon) }}" style="width:50px;height:50px" />
                                    @endif
                                </div>
                            </div>

                            

                        </div>
                        <div class="tab-pane fade " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">


                            <div class="form-group col-md-12 col-lg-12">
                                {!! Form::label('home_photo',trans('admin.home_photo'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::file('home_photo',['class'=>'form-control','placeholder'=>trans('admin.home_photo')]) !!}
                                    @if(!empty(setting()->home_photo))
                                     <img src="{{ it()->url(setting()->home_photo) }}" style="width:300px;height:150px" />
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('home_title',trans('admin.home_title'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::text('home_title',setting()->home_title,['class'=>'form-control','placeholder'=>trans('admin.home_title')]) !!}
                                </div>
                            </div>
                            <br>

                            {{-- <div class="form-group">
                                {!! Form::label('home_des',trans('admin.home_des'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::text('home_des',setting()->home_des,['class'=>'form-control','placeholder'=>trans('admin.home_des')]) !!}
                                </div>
                            </div>
                            <br> --}}

                            {{-- <div class="form-group">
                                {!! Form::label('discover_me_titel',trans('admin.discover_me_titel'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::text('discover_me_titel',setting()->discover_me_titel,['class'=>'form-control','placeholder'=>trans('admin.discover_me_titel')]) !!}
                                </div>
                            </div>
                            <br>
                            

                            
                            <div class="form-group col-md-12 col-lg-12">
                                {!! Form::label('discover_me_photo',trans('admin.discover_me_photo'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::file('discover_me_photo',['class'=>'form-control','placeholder'=>trans('admin.discover_me_photo')]) !!}
                                    @if(!empty(setting()->discover_me_photo))
                                     <img src="{{ it()->url(setting()->discover_me_photo) }}" style="width:300px;height:150px" />
                                    @endif
                                </div>
                            </div> --}}


                            <div class="form-group">
                                {!! Form::label('discover_me_des',trans('admin.discover_me_des'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::textarea('discover_me_des',setting()->discover_me_des,['class'=>'form-control ','placeholder'=>trans('admin.discover_me_des')]) !!}
                                </div>
                            </div>
                            <br>

                            {{-- <div class="form-group">
                                {!! Form::label('discover_me_video',trans('admin.discover_me_video'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::text('discover_me_video',setting()->discover_me_video,['class'=>'form-control','placeholder'=>trans('admin.discover_me_video')]) !!}
                                </div>
                            </div>
                            <br> --}}

                            <div class="form-group">
                                {!! Form::label('trainees',trans('admin.trainees'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::number('trainees',setting()->trainees,['class'=>'form-control','placeholder'=>trans('admin.trainees')]) !!}
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                {!! Form::label('lectures',trans('admin.lectures'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::number('lectures',setting()->lectures,['class'=>'form-control','placeholder'=>trans('admin.lectures')]) !!}
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                {!! Form::label('events',trans('admin.events'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::number('events',setting()->events,['class'=>'form-control','placeholder'=>trans('admin.events')]) !!}
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                {!! Form::label('company',trans('admin.company'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::number('company',setting()->company,['class'=>'form-control','placeholder'=>trans('admin.company')]) !!}
                                </div>
                            </div>
                            <br>

               


                        </div>
                        <div class="tab-pane fade" id="pills-event" role="tabpanel" aria-labelledby="pills-event-tab">
                            <div class="form-group col-md-12 col-lg-12">
                                {!! Form::label('event_photo',trans('admin.event_photo'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::file('event_photo',['class'=>'form-control','placeholder'=>trans('admin.event_photo')]) !!}
                                    @if(!empty(setting()->event_photo))
                                        <img src="{{ it()->url(setting()->event_photo) }}" style="width:300px;height:150px" />
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-course" role="tabpanel" aria-labelledby="pills-course-tab">
                            <div class="form-group col-md-12 col-lg-12">
                                {!! Form::label('our_courses_photo',trans('admin.our_courses_photo'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::file('our_courses_photo',['class'=>'form-control','placeholder'=>trans('admin.our_courses_photo')]) !!}
                                    @if(!empty(setting()->our_courses_photo))
                                    <img src="{{ it()->url(setting()->our_courses_photo) }}" style="width:300px;height:150px" />
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-about" role="tabpanel" aria-labelledby="pills-about-tab">
                            

                            <div class="form-group col-md-12 col-lg-12">
                                {!! Form::label('about_video',trans('admin.about_video'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::file('about_video',['class'=>'form-control','placeholder'=>trans('admin.about_video')]) !!}
                                    @if(!empty(setting()->about_video))
                                    <video  width="320" height="240" controls >
                                        <source src="{{it()->url(setting()->about_video)}}" type="video/mp4" >
                                        Your browser does not support the HTML5 video.
                                    </video>
                                     {{-- <img src="{{ it()->url(setting()->about_video) }}" style="width:300px;height:150px" /> --}}
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-12 col-lg-12">
                                {!! Form::label('about_me_photo',trans('admin.about_me_photo'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::file('about_me_photo',['class'=>'form-control','placeholder'=>trans('admin.about_me_photo')]) !!}
                                    @if(!empty(setting()->about_me_photo))
                                    <img src="{{ it()->url(setting()->about_me_photo) }}" style="width:300px;height:150px" />
                                    @endif
                                </div>
                            </div>

                            

                            <div class="form-group">
                                {!! Form::label('about_me_facebook',trans('admin.about_me_facebook'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::text('about_me_facebook',setting()->about_me_facebook,['class'=>'form-control','placeholder'=>trans('admin.about_me_facebook')]) !!}
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                {!! Form::label('about_me_twitter',trans('admin.about_me_twitter'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::text('about_me_twitter',setting()->about_me_twitter,['class'=>'form-control','placeholder'=>trans('admin.about_me_twitter')]) !!}
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                {!! Form::label('about_me_instagram',trans('admin.about_me_instagram'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::text('about_me_instagram',setting()->about_me_instagram,['class'=>'form-control','placeholder'=>trans('admin.about_me_instagram')]) !!}
                                </div>
                            </div>
                            <br>


    


                            <div class="form-group">
                                {!! Form::label('about_me_youtube',trans('admin.about_me_youtube'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::text('about_me_youtube',setting()->about_me_youtube,['class'=>'form-control','placeholder'=>trans('admin.about_me_youtube')]) !!}
                                </div>
                            </div>
                            <br>
                            
                            



                            <div class="form-group col-md-12 col-lg-12">
                                {!! Form::label('about_company_photo',trans('admin.about_company_photo'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::file('about_company_photo',['class'=>'form-control','placeholder'=>trans('admin.about_company_photo')]) !!}
                                    @if(!empty(setting()->about_company_photo))
                                    <img src="{{ it()->url(setting()->about_company_photo) }}" style="width:300px;height:150px" />
                                    @endif
                                </div>
                            </div>

        
                            
                            <div class="form-group-item">
                                <label class="control-label">{{__('about_education')}}</label>
                                <div class="g-items-header">
                                        <div class="row">
                                                <div class="col-md-11">{{__("education")}}</div>
                                                <div class="col-md-1"></div>
                                        </div>
                                </div>
                                <div class="g-items">
                                        @if(!empty(setting()->about_education))
                                                @php if(!is_array(setting()->about_education)) setting()->about_education = json_decode(setting()->about_education); @endphp
                                                @foreach(json_decode(setting()->about_education) as $key=>$education)
                                                            <div class="item" data-number="{{$key}}">
                                                                    <div class="row">
                                                                            <div class="col-md-11">
                                                                                    <input type="text" name="about_education[{{$key}}]" value="{{$education}}" class="form-control" placeholder="{{trans('admin.education')}}">
                                                                            </div>
                                                                      
                                                                            <div class="col-md-1">
                                                                                    <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                                                            </div>
                                                                    </div>
                                                            </div>
                                                @endforeach
                                        @endif
                                </div>
                                <div class="text-right">
                                        <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> {{__('Add item')}}</span>
                                </div>
                                <div class="g-more hide">
                                        <div class="item" data-number="__number__">
                                                <div class="row">
                                                        <div class="col-md-11">
                                                                <input type="text" __name__="about_education[__number__]" class="form-control" placeholder="{{trans('admin.education')}}">
                                                        </div>
                                                      
                                                        <div class="col-md-1">
                                                                <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                            </div>

                            
                            <div class="form-group">
                                {!! Form::label('about_company',trans('admin.about_company'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::textarea('about_company',setting()->about_company,['class'=>'form-control ckeditor','placeholder'=>trans('admin.about_company')]) !!}
                                </div>
                            </div>
                            <br>

                            
                            
                            <div class="form-group">
                                {!! Form::label('about_info',trans('admin.about_info'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::textarea('about_info',setting()->about_info,['class'=>'form-control','placeholder'=>trans('admin.about_info')]) !!}
                                </div>
                            </div>
                            <br>
                            

                            
                        </div>
                        <div class="tab-pane fade" id="pills-privacy-policy" role="tabpanel" aria-labelledby="pills-privacy-policy-tab">
                            <div class="form-group">
                                {!! Form::label('privacy_policy',trans('admin.privacy_policy'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::textarea('privacy_policy',setting()->privacy_policy,['class'=>'form-control ckeditor','placeholder'=>trans('admin.privacy_policy')]) !!}
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                {!! Form::label('refund_policy',trans('admin.refund_policy'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::textarea('refund_policy',setting()->refund_policy,['class'=>'form-control ckeditor','placeholder'=>trans('admin.refund_policy')]) !!}
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                {!! Form::label('legal_trademark_and_copyright',trans('admin.legal_trademark_and_copyright'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::textarea('legal_trademark_and_copyright',setting()->legal_trademark_and_copyright,['class'=>'form-control ckeditor','placeholder'=>trans('admin.legal_trademark_and_copyright')]) !!}
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                {!! Form::label('terms_of_use',trans('admin.terms_of_use'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::textarea('terms_of_use',setting()->terms_of_use,['class'=>'form-control ckeditor','placeholder'=>trans('admin.terms_of_use')]) !!}
                                </div>
                            </div>
                            <br>


                            

                        </div>

                        <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="pills-register-tab">
                            <div class="form-group col-md-12 col-lg-12">
                                {!! Form::label('register_img',trans('admin.register_img'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::file('register_img',['class'=>'form-control','placeholder'=>trans('admin.register_img')]) !!}
                                    @if(!empty(setting()->register_img))
                                     <img src="{{ it()->url(setting()->register_img) }}" style="width:300px;height:150px" />
                                    @endif
                                </div>
                            </div>
                            <br>
                            <div class="form-group col-md-12 col-lg-12">
                                {!! Form::label('cart_img',trans('admin.cart_img'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::file('cart_img',['class'=>'form-control','placeholder'=>trans('admin.cart_img')]) !!}
                                    @if(!empty(setting()->cart_img))
                                     <img src="{{ it()->url(setting()->cart_img) }}" style="width:300px;height:150px" />
                                    @endif
                                </div>
                            </div>
                            <br>
                            

                            
                        </div>

                      

                        <div class="tab-pane fade" id="pills-experts-in" role="tabpanel" aria-labelledby="pills-experts-in-tab">
                            <div class="form-group col-md-12 col-lg-12">
                                {!! Form::label('experts_in_img',trans('admin.experts_in_img'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::file('experts_in_img',['class'=>'form-control','placeholder'=>trans('admin.experts_in_img')]) !!}
                                    @if(!empty(setting()->experts_in_img))
                                     <img src="{{ it()->url(setting()->experts_in_img) }}" style="width:300px;height:150px" />
                                    @endif
                                </div>
                            </div>
                            <br>
                            
                        </div>

                        <div class="tab-pane fade" id="pills-free-lessons" role="tabpanel" aria-labelledby="pills-free-lessons-tab">
                            <div class="form-group col-md-12 col-lg-12">
                                {!! Form::label('free_lessons_img',trans('admin.free_lessons_img'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::file('free_lessons_img',['class'=>'form-control','placeholder'=>trans('admin.free_lessons_img')]) !!}
                                    @if(!empty(setting()->free_lessons_img))
                                     <img src="{{ it()->url(setting()->free_lessons_img) }}" style="width:300px;height:150px" />
                                    @endif
                                </div>
                            </div>
                            <br>
                            
                        </div>

                        <div class="tab-pane fade" id="pills-our-clients" role="tabpanel" aria-labelledby="pills-our-clients-tab">
                            <div class="form-group col-md-12 col-lg-12">
                                {!! Form::label('our_clients_img',trans('admin.our_clients_img'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::file('our_clients_img',['class'=>'form-control','placeholder'=>trans('admin.our_clients_img')]) !!}
                                    @if(!empty(setting()->our_clients_img))
                                     <img src="{{ it()->url(setting()->our_clients_img) }}" style="width:300px;height:150px" />
                                    @endif
                                </div>
                            </div>
                            <br>
                            
                        </div>
                  
                    </div>
                   
         
                    



                    {{-- <div class="form-group">
                        {!! Form::label('sitename_en',trans('admin.sitename_en'),['class'=>'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('sitename_en',setting()->sitename_en,['class'=>'form-control','placeholder'=>trans('admin.sitename_en')]) !!}
                        </div>
                    </div>
                    <br>
                     <div class="form-group">
                        {!! Form::label('sitename_fr',trans('admin.sitename_fr'),['class'=>'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('sitename_fr',setting()->sitename_fr,['class'=>'form-control','placeholder'=>trans('admin.sitename_fr')]) !!}
                        </div>
                    </div>
                    <br> --}}





                    {{-- <div class="clearfix"></div>
                    <br>
                      <div class="form-group">
                        {!! Form::label('system_status',trans('admin.system_status'),['class'=>'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::select('system_status',['open'=>trans('admin.open'),'close'=>trans('admin.close')],setting()->system_status,['class'=>'form-control','placeholder'=>trans('admin.system_status')]) !!}
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        {!! Form::label('system_message',trans('admin.system_message'),['class'=>'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::textarea('system_message',setting()->system_message,['class'=>'form-control','placeholder'=>trans('admin.system_message')]) !!}
                        </div>
                    </div>
                    <br> --}}
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        {!! Form::submit(trans('admin.save'),['class'=>'btn btn-success']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
@stop