@extends('admin.layouts.master')

@section('css')
@endsection

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">التصنيفات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل تصنيف</span>
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
			
								<form action="{{ route('category.update', $category->id) }}" method="post" autocomplete="off">
									{{-- {{ method_field('patch') }} --}}
									{{ csrf_field() }}

									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">اسم التصنيف</label>
											<input type="hidden" name="id" value="{{ $category->id }}">
											<input type="text" class="form-control" id="inputName" name="category_name"
												title="يرجى إدخال اسم التصنيف" value="{{ $category->category_name }}" required>
										</div>
									</div><br>

									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">slug</label>
											<input type="hidden" name="slug" value="{{ $category->slug }}">
											<input type="text" class="form-control" id="inputName" name="slug"
											value="{{ $category->slug }}" required>
										</div>
									</div><br>

									<div class="form-group">
										<label>التصنيف الأب</label>
										<input type="hidden" name="parent_id" value="{{ $category->parent_id }}">
										<select name="parent_id" class="form-control select">
											
											<option value="0">لا يوجد</option>

											 @foreach($parents as $parent)
											<option value="{{$parent->id}}">{{$parent->category_name}}</option>
											@endforeach 

										</select>
									</div>

									<div class="row">
										<div class="col">
											<label for="exampleTextarea">الوصف</label>
											<input type="hidden" name="category_description" value="{{ $category->category_description }}">
											<textarea class="form-control" id="exampleTextarea" name="category_description" rows="3">
											{{ $category->category_description }}</textarea>
										</div>
									</div><br>
			
									<div class="row">
										<div class="col">
											<label for="exampleTextarea">صورة التصنيف</label> <br>
											<input type="hidden" name="category_image" value="{{ $category->category_image }}">
											<input type="file" name="category_image" value="{{ $category->category_image }}" class="dropify" accept=".jpg, .png, image/jpeg, image/png"
											data-height="70" />
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
