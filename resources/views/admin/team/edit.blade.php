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
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('team/create')}}"
												data-toggle="tooltip" title="{{trans('admin.add')}}  {{trans('admin.team')}}">
												<i class="fa fa-plus"></i>
										</a>
										<span data-toggle="tooltip" title="{{trans('admin.delete')}}  {{trans('admin.team')}}">
												<a data-toggle="modal" data-target="#myModal{{$team->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
														<i class="fa fa-trash"></i>
												</a>
										</span>
										<div class="modal fade" id="myModal{{$team->id}}">
												<div class="modal-dialog">
														<div class="modal-content">
																<div class="modal-header">
																		<button class="close" data-dismiss="modal">x</button>
																		<h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
																</div>
																<div class="modal-body">
																		<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$team->id}}) ؟
																</div>
																<div class="modal-footer">
																		{!! Form::open([
																		'method' => 'DELETE',
																		'route' => ['team.destroy', $team->id]
																		]) !!}
																		{!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
																		<a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
																		{!! Form::close() !!}
																</div>
														</div>
												</div>
										</div>
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('team')}}"
												data-toggle="tooltip" title="{{trans('admin.show_all')}}   {{trans('admin.team')}}">
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
										
{!! Form::open(['url'=>aurl('/team/'.$team->id),'method'=>'put','id'=>'team','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
    {!! Form::label('name',trans('admin.name'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('name', $team->name ,['class'=>'form-control','placeholder'=>trans('admin.name')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('jop',trans('admin.jop'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('jop', $team->jop ,['class'=>'form-control','placeholder'=>trans('admin.jop')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('phone',trans('admin.phone'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('phone', $team->phone ,['class'=>'form-control','placeholder'=>trans('admin.phone')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('email',trans('admin.email'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::email('email', $team->email ,['class'=>'form-control','placeholder'=>trans('admin.email')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('facebook',trans('admin.facebook'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::url('facebook', $team->facebook ,['class'=>'form-control','placeholder'=>trans('admin.facebook')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('instgram',trans('admin.instgram'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::url('instgram', $team->instgram ,['class'=>'form-control','placeholder'=>trans('admin.instgram')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('linkedin',trans('admin.linkedin'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::url('linkedin', $team->linkedin ,['class'=>'form-control','placeholder'=>trans('admin.linkedin')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('image',trans('admin.image'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::file('image',['class'=>'form-control','placeholder'=>trans('admin.image')]) !!}
        @if(!empty($team->image))
        <img src="{{it()->url($team->image)}}" style="width:150px;height:150px;" />
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
		
