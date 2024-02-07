@extends('admin.layouts.master')

@section('css')
@endsection

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الأخبار</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ جميع الأخبار</span>
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
				<!-- row -->
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">جميع الأخبار</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">#</th>
												<th class="wd-15p border-bottom-0">عنوان الخبر</th>
												<th class="wd-15p border-bottom-0">slug</th>
												<th class="wd-15p border-bottom-0">المحتوى</th>
												<th class="wd-20p border-bottom-0">صورة الخبر</th>
												<th class="wd-15p border-bottom-0"> الكاتب</th>
												<th class="wd-15p border-bottom-0"> التصنيف</th>
												<th class="wd-15p border-bottom-0"> الوسوم</th>
												<th class="wd-15p border-bottom-0">الحالة</th>
												<th class="wd-15p border-bottom-0">العمليات</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1 ?>
											@foreach($news as $new)
											<tr>
												<td>{{$i++}}</td>
												<td>{{$new->title}}</td>
												<td>{{$new->slug}}</td>
												<td>{{$new->content}}</td>
												<td>{{$new->news_image}}</td>
												<td>{{ App\Models\User::find($new->composer_id)->name }}</td>
												<td>{{ App\Models\Category::find($new->category_id)->category_name }}</td>
											
												<td>
													@foreach($results as $result)
													{{ $result }}
													@endforeach
												</td>

												@if($new->status)
												<td><span class="custom-badge status-green">فعال</span></td>	
												@else
												<td><span class="custom-badge status-red">غير فعال</span></td>
												@endif

												<td>
													<a class="btn btn-sm btn-info" href="{{ route('news.edit', $new->id) }}" title="تعديل"><i class="las la-pen"></i></a>

													<a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                	data-id="{{ $new->id }}" data-title="{{ $new->title }}" data-toggle="modal"
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
				<!-- row closed -->


<!-- delete -->
<div class="modal" id="modaldemo9">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content modal-content-demo">
			<div class="modal-header">
				<h6 class="modal-title">حذف الخبر</h6><button aria-label="Close" class="close" data-dismiss="modal"
					type="button"><span aria-hidden="true">&times;</span></button>
			</div>
			<form action={{ url('cpanel/news/delete', $new->id) }} method="post">
				{{method_field('delete')}}
				{{-- @method('delete') --}}
				{{csrf_field()}}
				<div class="modal-body">
					<p>هل أنت متأكد من عملية الحذف؟</p><br>
					<input type="hidden" name="id" id="id">
					<input class="form-control" name="title" id="title" type="text" readonly>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
					<button type="submit" class="btn btn-danger">تأكيد</button>
				</div>
			</form>
		</div>
	</div>
</div>

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

<script>
	 $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var title = button.data('title')
            var modal = $(this)

            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #title').val(title);
        })
</script>

@endsection
