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
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('properties/create')}}"
												data-toggle="tooltip" title="{{trans('admin.add')}}  {{trans('admin.properties')}}">
												<i class="fa fa-plus"></i>
										</a>
										<span data-toggle="tooltip" title="{{trans('admin.delete')}}  {{trans('admin.properties')}}">
												<a data-toggle="modal" data-target="#myModal{{$properties->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
														<i class="fa fa-trash"></i>
												</a>
										</span>
										<div class="modal fade" id="myModal{{$properties->id}}">
												<div class="modal-dialog">
														<div class="modal-content">
																<div class="modal-header">
																		<button class="close" data-dismiss="modal">x</button>
																		<h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
																</div>
																<div class="modal-body">
																		<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$properties->id}}) ؟
																</div>
																<div class="modal-footer">
																		{!! Form::open([
																		'method' => 'DELETE',
																		'route' => ['properties.destroy', $properties->id]
																		]) !!}
																		{!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
																		<a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
																		{!! Form::close() !!}
																</div>
														</div>
												</div>
										</div>
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('properties')}}"
												data-toggle="tooltip" title="{{trans('admin.show_all')}}   {{trans('admin.properties')}}">
												<i class="fa fa-list"></i>
										</a>
										<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"
												data-original-title="{{trans('admin.fullscreen')}}"
												title="{{trans('admin.fullscreen')}}">
										</a>
								</div>
						</div>
						<div class="portlet-body form">
								<div class="col-md-12">
										
{!! Form::open(['url'=>aurl('/properties/'.$properties->id),'method'=>'put','id'=>'properties','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
    {!! Form::label('name',trans('admin.name'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('name', $properties->name ,['class'=>'form-control','placeholder'=>trans('admin.name')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('des',trans('admin.des'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('des', $properties->des ,['class'=>'form-control','placeholder'=>trans('admin.des')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('photo',trans('admin.photo'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::file('photo',['class'=>'form-control','placeholder'=>trans('admin.photo')]) !!}
        @if(!empty($properties->photo))
        <img src="{{it()->url($properties->photo)}}" style="width:150px;height:150px;" />
        @endif
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('space',trans('admin.space'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('space', $properties->space ,['class'=>'form-control','placeholder'=>trans('admin.space')]) !!}
    </div>
</div>
<br>

<div class="form-group">
	{!! Form::label('rooms',trans('admin.rooms'),['class'=>'col-md-3 control-label']) !!}
	<div class="col-md-9">
	{!! Form::number('rooms',$properties->rooms,['class'=>'form-control','placeholder'=>trans('admin.rooms')]) !!}
	</div>
</div>
<br>

<div class="form-group">
	{!! Form::label('wc',trans('admin.wc'),['class'=>'col-md-3 control-label']) !!}
	<div class="col-md-9">
	{!! Form::number('wc',$properties->wc,['class'=>'form-control','placeholder'=>trans('admin.wc')]) !!}
	</div>
</div>
<br>



<div class="form-group">
    {!! Form::label('type',trans('admin.type'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
{!! Form::select('type',['Rental'=>trans('admin.Rental'),'Sale'=>trans('admin.Sale'),], $properties->type ,['class'=>'form-control','placeholder'=>trans('admin.type')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('place_id',trans('admin.place_id'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
{!! Form::select('place_id',App\Model\Place::pluck("name","id"), $properties->place_id ,['class'=>'form-control','placeholder'=>trans('admin.place_id')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('badge',trans('admin.badge'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('badge', $properties->badge ,['class'=>'form-control','placeholder'=>trans('admin.badge')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('address',trans('admin.address'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('address', $properties->address ,['class'=>'form-control','placeholder'=>trans('admin.address')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('video',trans('admin.video'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::file('video',['class'=>'form-control','placeholder'=>trans('admin.video')]) !!}
        @if(!empty($properties->video))
        <img src="{{it()->url($properties->video)}}" style="width:150px;height:150px;" />
        @endif
    </div>
</div>
<br>

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
		
