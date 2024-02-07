@extends('admin.layouts.master')

@section('css')
@endsection

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">التعليقات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعليقات المستخدمين</span>
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
										<h4 class="card-title mg-b-0">جميع التعليقات</h4>
										<i class="mdi mdi-dots-horizontal text-gray"></i>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table text-md-nowrap" id="example1">
											<thead>
												<tr>
													<th class="wd-15p border-bottom-0">#</th>
													<th class="wd-15p border-bottom-0">التعليق</th>
													<th class="wd-15p border-bottom-0">الخبر</th>
													<th class="wd-15p border-bottom-0">المستخدم</th>
													<th class="wd-20p border-bottom-0">التاريخ</th>
													<th class="wd-15p border-bottom-0">الحالة</th>
													<th class="wd-15p border-bottom-0">العمليات</th>
												</tr>
											</thead>
											<tbody>
												<?php $i = 1 ?>
												@foreach($comments as $comment)
												<tr>
													<td>{{$i++}}</td>
													<td>{{$comment->content}}</td>
													<td></td>
													{{-- <td>{{App\Models\News::find($comment->news_id)->title}}</td> --}}
													<td>{{App\Models\User::find($comment->user_id)->name}}</td>
													<td>{{$comment->date}}</td>
													{{-- <td>{{ $comment->created_at->format('H:i:s') }}</td> --}}
													{{-- <td>{{ App\Models\Category::find($new->category_id)->category_name }}</td> --}}
													{{-- <td>{{$comment->status}}</td> --}}

													{{-- <td>@if($comment->status){{$comment->content}}@else <span style="color:red">محجوب</span> @endif</td> --}}
													@if($comment->status)
													<td><span class="custom-badge status-green">فعال</span></td>	
													@else
													<td><span class="custom-badge status-red">غير فعال</span></td>
													@endif

													<td>
														<a class="btn btn-sm btn-info" href="{{ route('comment.edit', $comment->id) }}" title="تعديل"><i class="las la-pen"></i></a>

														{{-- <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
														data-id="{{ $comment->id }}" data-title="{{ $comment->content }}" data-toggle="modal"
														href="#modaldemo10" title="تعديل"><i class="las la-pen"></i></a> --}}


														<a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
														data-id="{{ $comment->id }}" data-title="{{ $comment->content }}" data-toggle="modal"
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
				<h6 class="modal-title">حذف التعليق</h6><button aria-label="Close" class="close" data-dismiss="modal"
					type="button"><span aria-hidden="true">&times;</span></button>
			</div>
			<form action={{ route('comment.delete', $comment->id) }} method="post">
				{{method_field('delete')}}
				{{csrf_field()}}
				<div class="modal-body">
					<p>هل أنت متأكد من عملية الحذف؟</p><br>
					<input type="hidden" name="id" id="id">
					<input class="form-control" name="content" id="content" type="text" readonly>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
					<button type="submit" class="btn btn-danger">تأكيد</button>
				</div>
		</div>
		</form>
	</div>
</div>



<!-- Edit -->
{{-- <div class="modal" id="modaldemo10">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content modal-content-demo">
			<div class="modal-header">
				<h6 class="modal-title">تعديل حالة التعليق</h6><button aria-label="Close" class="close" data-dismiss="modal"
					type="button"><span aria-hidden="true">&times;</span></button>
			</div>
			<form action={{ route('comment.delete', $comment->id) }} method="post">
				{{method_field('delete')}}
				{{csrf_field()}}
				<div class="modal-body">
					<p>هل أنت متأكد من عملية الحذف؟</p><br>
					<input type="hidden" name="id" id="id">
					<input class="form-control" name="content" id="content" type="text" readonly>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
					<button type="submit" class="btn btn-danger">تأكيد</button>
				</div>
		</div>
		</form>
	</div>
</div> --}}

@endsection

@section('js')
@endsection
