@extends('admin.layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة المستخدمين</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<a type="button" class="btn btn-primary" href="{{ url('/cpanel/user/add') }}"> <i class="fas fa-plus"></i>&nbsp; إضافة مستخدم</a>
							</div>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<a href="{{ url('/cpanel/site') }}" type="button" class="btn btn-primary" style="color: white">الموقع العام</a>
					</div>
				</div>
				<!-- breadcrumb -->


				<style>
					.custom-badge {
					border-radius: 4px;
					display: inline-block;
					font-size: 12px;
					min-width: 95px;
					padding: 1px 10px;
					text-align: center;
				}
					.status-red,
					a.status-red {
					background-color: #ffe5e6;
					border: 1px solid #fe0000;
					color: #fe0000;
				  }
				  .status-green,
				  a.status-green {
					background-color: #e5faf3;
					border: 1px solid #00ce7c;
					color: #00ce7c;
				  }
				</style>


@endsection
@section('content')
				<!-- row opened -->
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">قائمة المستخدمين</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">#</th>
												<th class="wd-15p border-bottom-0">اسم المستخدم</th>
												<th class="wd-15p border-bottom-0">الاسم</th>
												<th class="wd-15p border-bottom-0">الكنية</th>
												<th class="wd-15p border-bottom-0">العنوان</th>
												<th class="wd-15p border-bottom-0">رقم الموبايل</th>
												<th class="wd-15p border-bottom-0">البريد الإلكتروني</th>
												<th class="wd-15p border-bottom-0">الدور</th>
												<th class="wd-15p border-bottom-0">الحالة</th>
												<th class="wd-15p border-bottom-0">العمليات</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1 ?>
											@foreach($users as $user)
											<tr>
												<td>{{$i++}}</td>
												<td>{{$user->name}}</td>
												<td>{{$user->first_name}}</td>
												<td>{{$user->last_name}}</td>
												<td>{{$user->address}}</td>
												<td>{{$user->mobile}}</td>
												<td>{{$user->email }}</td>
												<td>{{$user->role}}</td>

												@if($user->status)
												<td><span class="custom-badge status-green">فعال</span></td>	
												@else
												<td><span class="custom-badge status-red">غير فعال</span></td>
												@endif

												<td>
													<a class="btn btn-sm btn-info" href="{{ route('user.edit', $user->id) }}" title="تعديل"><i class="las la-pen"></i></a>

													<a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                	data-id="{{ $user->id }}" data-title="{{ $user->name }}" data-toggle="modal"
                                                	href="#modaldemo9" title="حذف"><i class="las la-trash"></i></a>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!--/div-->
				</div>
				<!-- /row -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection