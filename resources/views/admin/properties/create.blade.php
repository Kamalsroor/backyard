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
								<a  href="{{aurl('properties')}}"
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
								
{!! Form::open(['url'=>aurl('/properties'),'id'=>'properties','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
    {!! Form::label('name',trans('admin.name'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>trans('admin.name')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('des',trans('admin.des'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('des',old('des'),['class'=>'form-control','placeholder'=>trans('admin.des')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('photo',trans('admin.photo'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::file('photo',['class'=>'form-control','placeholder'=>trans('admin.photo')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('space',trans('admin.space'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('space',old('space'),['class'=>'form-control','placeholder'=>trans('admin.space')]) !!}
    </div>
</div>
<br>

<div class="form-group">
	{!! Form::label('rooms',trans('admin.rooms'),['class'=>'col-md-3 control-label']) !!}
	<div class="col-md-9">
	{!! Form::number('rooms',old('rooms'),['class'=>'form-control','placeholder'=>trans('admin.rooms')]) !!}
	</div>
</div>
<br>

<div class="form-group">
	{!! Form::label('wc',trans('admin.wc'),['class'=>'col-md-3 control-label']) !!}
	<div class="col-md-9">
	{!! Form::number('wc',old('wc'),['class'=>'form-control','placeholder'=>trans('admin.wc')]) !!}
	</div>
</div>
<br>

<div class="form-group">
		{!! Form::label('type',trans('admin.type'),['class'=>'col-md-3 control-label']) !!}
		<div class="col-md-9">
{!! Form::select('type',['Rental'=>trans('admin.Rental'),'Sale'=>trans('admin.Sale'),'Poth'=>trans('admin.Poth'),],old('type'),['class'=>'form-control','placeholder'=>trans('admin.type')]) !!}
		</div>
</div>
<br>


<div class="form-group">
		{!! Form::label('place_id',trans('admin.place_id'),['class'=>'col-md-3 control-label']) !!}
		<div class="col-md-9">
{!! Form::select('place_id',App\Model\Place::pluck("name","id"),old('place_id'),['class'=>'form-control','placeholder'=>trans('admin.place_id')]) !!}
		</div>
</div>
<br>
<div class="form-group">
    {!! Form::label('badge',trans('admin.badge'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('badge',old('badge'),['class'=>'form-control','placeholder'=>trans('admin.badge')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('address',trans('admin.address'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('address',old('address'),['class'=>'form-control','placeholder'=>trans('admin.address')]) !!}
    </div>
</div>
<br>

<div class="form-group col-md-12 col-lg-12">
	{!! Form::label('video',trans('admin.video'),['class'=>'col-md-3 control-label']) !!}
	<div class="col-md-9">
		{!! Form::file('video',['class'=>'form-control','placeholder'=>trans('admin.video')]) !!}
	</div>
	
</div> 


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
	
