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
							<h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ صلاحيات المستخدمين</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<a href="{{ url('/cpanel/site') }}" type="button" class="btn btn-primary" style="color: white">الموقع العام</a>
					</div>
				</div>
				<!-- breadcrumb -->


<style>
	
.dash-widget {
	background-color: #fff;
	border-radius: 4px;
	margin-bottom: 30px;
	padding: 20px;
	position: relative;
	box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
}
.dash-widget-bg1 {
	width: 65px;
	float: left;
	color: #fff;
	display: block;
	font-size: 50px;
	text-align: center;
	line-height: 65px;
	background: #0162e8;
	border-radius: 50%;
	font-size: 40px;
	height: 65px;
}
.dash-widget-bg2 {
	width: 65px;
	float: left;
	color: #fff;
	display: block;
	font-size: 50px;
	text-align: center;
	line-height: 65px;
	background: #22c03c;
	border-radius: 50%;
	font-size: 40px;
	height: 65px;
}
.dash-widget-bg3 {
	width: 65px;
	float: left;
	color: #fff;
	display: block;
	font-size: 50px;
	text-align: center;
	line-height: 65px;
	background: #7a92a3;
	border-radius: 50%;
	font-size: 40px;
	height: 65px;
}
.dash-widget-info > h3 {
	font-size: 24px;
	font-weight: 500;
	margin-bottom: 0.5rem;
}
.dash-widget-info span i {
	width: 16px;
	background: #fff;
	border-radius: 50%;
	color: #666666;
	font-size: 9px;
	height: 16px;
	line-height: 16px;
	text-align: center;
	margin-left: 5px;
}
.dash-widget-info > span.widget-title1 {
	background: #0162e8;
	color: #fff;
	padding: 5px 10px;
	border-radius: 4px;
	font-size: 13px;
}
.dash-widget-info > span.widget-title2 {
	background: #22c03c;
	color: #fff;
	padding: 5px 10px;
	border-radius: 4px;
	font-size: 13px;
}
.dash-widget-info > span.widget-title3 {
	background: #7a92a3;
	color: #fff;
	padding: 5px 10px;
	border-radius: 4px;
	font-size: 13px;
}

</style>


@endsection
@section('content')
	<!-- row opened -->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
			<a href="">

				<div class="dash-widget">
					<span class="dash-widget-bg1"><i class="fa fa-user" aria-hidden="true"></i></span>
					<div class="dash-widget-info text-right">
					  <h3 style="color: black;">{{ $admin }}</h3>
					  <span class="widget-title1">Admin &nbsp; <i class="fa fa-check" aria-hidden="true"></i></span>
					</div>
				</div>

			</a>

		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
			<a href="">

				<div class="dash-widget">
					<span class="dash-widget-bg2"><i class="fa fa-user"></i></span>
						<div class="dash-widget-info text-right">
							<h3 style="color: black;">{{ $composer }}</h3>
							<span class="widget-title2">Composer &nbsp; <i class="fa fa-check" aria-hidden="true"></i></span>
						</div>
				 </div>

			</a>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
			<a href="">

				<div class="dash-widget">
					<span class="dash-widget-bg3"><i class="fa fa-users" aria-hidden="true"></i></span>
					<div class="dash-widget-info text-right">
						<h3 style="color: black;">{{ $visitor }}</h3>
						<span class="widget-title3">Visitor &nbsp; <i class="fa fa-check" aria-hidden="true"></i></span>
					</div>
				</div>

			</a>
		</div>
	</div>
	<!-- /row -->
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