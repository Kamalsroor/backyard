@extends('admin.index')
		@section('content')



		
    <div class="row">
			<div class="col-md-12">
				<div class="portlet light bordered">
						<div class="portlet-title">
							<span class="caption-subject bold uppercase font-dark pull-left">{{$title}}</span>
								<div class="caption">

										<button type="button" class="btn btn-info col-2 pull-right" data-toggle="modal" data-target="#CreateModel">
											<i class="fa fa-plus"></i>{{ trans('admin.add') }}
										</button>
								</div>
						</div>
						<div class="portlet-body">
								<div class="table-responsive">
									<table id="labels" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
										<thead>
										<tr>
												<th>{{ trans('admin.id') }}</th>
												<th>{{ trans('admin.name') }}</th>
												<th>{{ trans('admin.valueEn') }}</th>
												{{-- <th>{{ trans('admin.valueAr') }}</th> --}}
												<th>{{ trans('admin.action') }}</th>
										</tr>
										</thead>

							 @forelse($arrayLang as $label_key => $label_value)
										<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $label_key }}</td>
										<td>{{ $label_value['en'] }}</td>
										<td><button class="btn btn-info waves-effect waves-light btn-edit" onclick="edit_modal('{{ $label_key }}')"><i class="fa fa-edit"></i>{{ trans('admin.edit') }}</button></td>
										</tr>
										@empty
										<p>There are no labels added yet</p>
										@endforelse
										<tbody>
								 
										</tbody>
								</table>
								<div class="clearfix"></div>
								
								</div>
						</div>
				</div>
		</div>


									<!-- Modal -->
									<div class="modal fade" id="editModel" tabindex="-1" role="dialog" aria-labelledby="editModelLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="editModelLabel">Modal title</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														{{-- <form method="post" id="edit-labels-modal" accept-charset="UTF-8" enctype="multipart/form-data">

															@csrf
																<
															</form> --}}

															<form method="post" id="edit-labels-modal" accept-charset="UTF-8" enctype="multipart/form-data">
																@csrf
																<div class="form-group ">
																		<label for="edit-name">{{ trans('admin.name') }}</label>
																		<input class="form-control" id="edit-name" placeholder="" name="name" type="text" readonly>
																</div>
																<div class="form-group ">
																		<label for="edit-valueEn">{{ trans('admin.valueEn') }}</label>
																		<input class="form-control" id="edit-valueEn" placeholder="" name="value_en" type="text">
																</div>
												
															</form>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														<button type="button" onclick = '$("#edit-labels-modal").submit();' class="btn btn-primary">Save changes</button>
													</div>
											</div>
										</div>
									</div>

								<!-- Modal -->
									<div class="modal fade" id="CreateModel" tabindex="-1" role="dialog" aria-labelledby="CreateModelLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="CreateModelLabel">Modal title</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														{{-- <form method="post" id="edit-labels-modal" accept-charset="UTF-8" enctype="multipart/form-data">

															@csrf
																<
															</form> --}}
															{{ Form::open(['route' => "labels.store",'id' => "create-labels-modal" ,'method' => 'post','files'=>true]) }}
																@csrf
																<div class="form-group ">

																		<label for="label-name">{{ trans('admin.name') }}</label>
																		<input class="form-control" id="label-name" placeholder="" name="name" type="text" >
																</div>

																<div class="form-group ">
																		<label for="label-valueEn">{{ trans('admin.valueEn') }}</label>
																		<input class="form-control" id="label-valueEn" placeholder="" name="value_en" type="text">
																</div>
									
																{{ Form::close() }}
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														<button type="button" onclick = '$("#create-labels-modal").submit();' class="btn btn-primary">Save changes</button>
													</div>
											</div>
										</div>
									</div>
	</div> <!-- end row -->
		@push('js')
		
    <script>
			//         $(document).ready(function() {
			//     $('#labels').DataTable();
			// } );
			$(document).ready(function() {
					$('#labels').DataTable({  @if(session()->get('locale') == "ar")
											
											"language": {
													"url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Arabic.json"
											},
											@endif
							stateSave: true
					} );
			} );
							function confirm_delete(id)
							{
									var confirm=window.confirm('delete record ?")');
			
									if(confirm)
									{
											$('#delete_labels').attr('action','{{url("labels/delete")}}'+"/"+id+"/");
											$('#delete_labels').submit();
									}
									else{
											return false;
									}
			
							}
			
							function edit_modal(label_key)
							{
									// console.log(22);
									// console.log(label_key);
									// console.log(22);
									$.ajax({
											type:'get',
											url:"{{aurl('translate/edit/')}}"+"/"+label_key,
											success:function(data)
											{

												$("#editModel").modal("show")
													// $("#custom-edit-modal").addClass("active");
													$('#edit-labels-modal').attr('action','{{aurl("translate/")}}').attr('method','post');
													$('#edit-name').val(data.name);
													$('#edit-valueEn').val(data.valueEn);
													$('#edit-old-value').val(data.value);
													// $("#btn-edit-close").on("click",(e)=>{
													// 		$("#custom-edit-modal").removeClass("active");
													// });
											},
					 
									});
							}
			
					</script>
		@endpush
		@stop
		
