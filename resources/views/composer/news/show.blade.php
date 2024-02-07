@extends('composer.layouts.master')

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
						<a href="{{ url('/cpanelc/site') }}" type="button" class="btn btn-primary" style="color: white">الموقع العام</a>
					</div>
				</div>
				<!-- breadcrumb -->
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
												<th class="wd-15p border-bottom-0"> الكاتب</th>
												<th class="wd-15p border-bottom-0"> التصنيف</th>
												<th class="wd-15p border-bottom-0"> الوسوم</th>
												<th class="wd-15p border-bottom-0">الحالة</th>
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
												<td>{{ App\Models\User::find($new->composer_id)->name }}</td>
												<td>{{ App\Models\Category::find($new->category_id)->category_name }}</td>
												{{-- <td>{{ App\Models\Tags::find($new->tag_id)->tag_name }}</td> --}}
												<td>{{$new->status}}</td>
												<td>
													@if ( $new->composer_id == auth()->id())
														
													<a class="btn btn-sm btn-info" href="{{ route('newsc.edit', $new->id) }}" title="تعديل"><i class="las la-pen"></i></a>

													<a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                	data-id="{{ $new->id }}" data-title="{{ $new->title }}" data-toggle="modal"
                                                	href="#modaldemo9" title="حذف"><i class="las la-trash"></i></a>

													@endif

		
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
			<form action={{ route('newsc.delete', $new->id) }} method="post">
				{{method_field('delete')}}
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
		</div>
		</form>
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
