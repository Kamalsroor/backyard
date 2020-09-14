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
								<a  href="{{aurl('team')}}"
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
								
{!! Form::open(['url'=>aurl('/team'),'id'=>'team','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
    {!! Form::label('name',trans('admin.name'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>trans('admin.name')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('jop',trans('admin.jop'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('jop',old('jop'),['class'=>'form-control','placeholder'=>trans('admin.jop')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('phone',trans('admin.phone'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('phone',old('phone'),['class'=>'form-control','placeholder'=>trans('admin.phone')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('email',trans('admin.email'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::email('email',old('email'),['class'=>'form-control','placeholder'=>trans('admin.email')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('facebook',trans('admin.facebook'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::url('facebook',old('facebook'),['class'=>'form-control','placeholder'=>trans('admin.facebook')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('instgram',trans('admin.instgram'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::url('instgram',old('instgram'),['class'=>'form-control','placeholder'=>trans('admin.instgram')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('linkedin',trans('admin.linkedin'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::url('linkedin',old('linkedin'),['class'=>'form-control','placeholder'=>trans('admin.linkedin')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('image',trans('admin.image'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::file('image',['class'=>'form-control','placeholder'=>trans('admin.image')]) !!}
    </div>
</div>
<br>

<div class="form-actions">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
{!! Form::submit(trans('admin.add'),['class'=>'btn btn-success']) !!}
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
	
