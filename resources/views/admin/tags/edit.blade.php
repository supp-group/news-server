@extends('admin.layouts.master')

@section('css')
@endsection

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الوسوم</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل وسم</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<a href="{{ url('/cpanel/site') }}" type="button" class="btn btn-primary" style="color: white">الموقع العام</a>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection

@section('content')

@if (session()->has('Edit'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<strong>{{ session()->get('Edit') }}</strong>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif

				<!-- row -->
				<div class="row">

					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
			
								<form action="{{ route('tags.update', $tag->id) }}" method="post" autocomplete="off">
									{{-- {{ method_field('patch') }} --}}
									{{ csrf_field() }}

									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">اسم الوسم</label>
											<input type="hidden" name="id" value="{{ $tag->id }}">
											<input type="text" class="form-control" id="inputName" name="tag_name"
											value="{{ $tag->tag_name }}" required>
										</div>
									</div><br>

									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">slug</label>
											<input type="hidden" name="slug" value="{{ $tag->slug }}">
											<input type="text" class="form-control" id="inputName" name="slug"
											value="{{ $tag->slug }}" required>
										</div>
									</div><br>

									<div class="row">
										<div class="col">
											<label for="exampleTextarea">الوصف</label>
											<input type="hidden" name="tag_description" value="{{ $tag->tag_description }}">
											<textarea class="form-control" id="exampleTextarea" name="tag_description" rows="3">
											{{ $tag->tag_description }}</textarea>
										</div>
									</div><br>
			
									<div class="d-flex justify-content-center">
										<button type="submit" class="btn btn-primary">حفظ البيانات</button>
									</div>
			
								</form>
							</div>
						</div>
					</div>
					
				</div>
				<!-- row closed -->
@endsection

@section('js')
@endsection
