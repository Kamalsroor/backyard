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
                                {!! Form::label('facebook',trans('admin.facebook'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::url('facebook',setting()->facebook,['class'=>'form-control','placeholder'=>trans('admin.facebook')]) !!}
                                </div>
                            </div>
                            <br>


                            <div class="form-group">
                                {!! Form::label('instagram',trans('admin.instagram'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::url('instagram',setting()->instagram,['class'=>'form-control','placeholder'=>trans('admin.instagram')]) !!}
                                </div>
                            </div>
                            <br>


                            <div class="form-group">
                                {!! Form::label('linkedin',trans('admin.linkedin'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::url('linkedin',setting()->linkedin,['class'=>'form-control','placeholder'=>trans('admin.linkedin')]) !!}
                                </div>
                            </div>
                            <br>


                            


                            
                            <div class="form-group">
                                {!! Form::label('email',trans('admin.email'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::email('email',setting()->email,['class'=>'form-control','placeholder'=>trans('admin.email')]) !!}
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
                            
                            <div class="form-group">
                                {!! Form::label('map',trans('admin.map'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::text('map',setting()->map,['class'=>'form-control','placeholder'=>trans('admin.map')]) !!}
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                {!! Form::label('discover_me_des',trans('admin.discover_me_des'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::textarea('discover_me_des',setting()->discover_me_des,['class'=>'form-control ','placeholder'=>trans('admin.discover_me_des')]) !!}
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                {!! Form::label('our_service_des',trans('admin.our_service_des'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::textarea('our_service_des',setting()->our_service_des,['class'=>'form-control ','placeholder'=>trans('admin.our_service_des')]) !!}
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                {!! Form::label('properties_des',trans('admin.properties_des'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::textarea('properties_des',setting()->properties_des,['class'=>'form-control ','placeholder'=>trans('admin.properties_des')]) !!}
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                {!! Form::label('blog_des',trans('admin.blog_des'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::textarea('blog_des',setting()->blog_des,['class'=>'form-control ','placeholder'=>trans('admin.blog_des')]) !!}
                                </div>
                            </div>
                            <br>
                            
                            <div class="form-group">
                                {!! Form::label('team_des',trans('admin.team_des'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::textarea('team_des',setting()->team_des,['class'=>'form-control ','placeholder'=>trans('admin.team_des')]) !!}
                                </div>
                            </div>
                            <br>
                            
                            <div class="form-group">
                                {!! Form::label('footer_des',trans('admin.footer_des'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::textarea('footer_des',setting()->footer_des,['class'=>'form-control ','placeholder'=>trans('admin.footer_des')]) !!}
                                </div>
                            </div>
                            <br>

                            <div class="form-group-item">
                                <label class="control-label">{{__('opening_hours')}}</label>
                                <div class="g-items-header">
                                        <div class="row">
                                                <div class="col-md-6">{{__("deys")}}</div>
                                                <div class="col-md-5">{{__("hours")}}</div>
                                                <div class="col-md-1"></div>
                                        </div>
                                </div>
                                <div class="g-items">
                                        @if(!empty(setting()->opening_hours))
                                                @php if(!is_array(setting()->opening_hours)) setting()->opening_hours = json_decode(setting()->opening_hours); @endphp
                                                @foreach(json_decode(setting()->opening_hours) as $key=> $opening_hour)
                                                            <div class="item" data-number="{{$key}}">
                                                                    <div class="row">
                                                                            <div class="col-md-6">
                                                                                    <input type="text" name="opening_hours[{{$key}}][deys]" value="{{$opening_hour->deys}}" class="form-control" placeholder="{{trans('admin.deys')}}">
                                                                            </div>
                                                                            <div class="col-md-5">
                                                                                    <input type="text" name="opening_hours[{{$key}}][hours]" value="{{$opening_hour->hours}}" class="form-control" placeholder="{{trans('admin.hours')}}">
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
                                                        <div class="col-md-6">
                                                                <input type="text" __name__="opening_hours[__number__][deys]" class="form-control" placeholder="{{trans('admin.deys')}}">
                                                        </div>
                                                        <div class="col-md-5">
                                                                <input type="text" __name__="opening_hours[__number__][hours]" class="form-control" placeholder="{{trans('admin.hours')}}">
                                                        </div>
                                                      
                                                        <div class="col-md-1">
                                                                <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                            </div>


                        </div>
           


                        <div class="tab-pane fade" id="pills-about" role="tabpanel" aria-labelledby="pills-about-tab">
                            

                            {{-- <div class="form-group col-md-12 col-lg-12">
                                {!! Form::label('about_video',trans('admin.about_video'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::file('about_video',['class'=>'form-control','placeholder'=>trans('admin.about_video')]) !!}
                                    @if(!empty(setting()->about_video))
                                    <video  width="320" height="240" controls >
                                        <source src="{{it()->url(setting()->about_video)}}" type="video/mp4" >
                                        Your browser does not support the HTML5 video.
                                    </video>
                                    @endif
                                </div>
                            </div> --}}

                     
        
                            
                            {{-- <div class="form-group-item">
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
                            </div> --}}

                          


                            

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