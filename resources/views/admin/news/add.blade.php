@extends('admin.layouts.master')

@section('css')

<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!---Internal Fileupload css-->
<link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
<!---Internal Fancy uploader css-->
<link href="{{URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
<!--Internal Sumoselect css-->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css')}}">
<!--Internal  TelephoneInput css-->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css')}}">

@endsection

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الأخبار</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ إضافة خبر</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<a href="{{ url('/cpanel/site') }}" type="button" class="btn btn-primary" style="color: white">الموقع العام</a>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection

@section('content')

    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
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
			
								<form action="{{ url('cpanel/news/save') }}" method="post" enctype="multipart/form-data" autocomplete="off">
									{{ csrf_field() }}
			
									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">عنوان الخبر </label>
											<input type="text" class="form-control" id="inputName" name="title"
												title="يرجى إدخال عنوان الخبر" required>
										</div>
									</div><br>
			
									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">slug</label>
											<input type="text" class="form-control" id="inputName" name="slug" required>
										</div>
									</div><br>

									<div class="row">
										<div class="col">
											<label for="exampleTextarea">المحتوى</label>
											<textarea class="form-control" id="exampleTextarea" name="content" rows="3"></textarea>
										</div>
									</div><br>

									<div class="form-group">
										<label>التصنيف</label>
										<select name="category_id" class="form-control select">
											
											@foreach($categories as $category)
											<option value="{{$category->id}}">{{$category->category_name}}</option>
											@endforeach 

										</select>
									</div><br>

									<div class="form-group">
										<label>الوسوم</label>
											<select name="tag_id[]" multiple="multiple" class="testselect2">

												@foreach($tags as $tag)
													<option selected value="{{$tag->id}}">{{$tag->tag_name}}</option>
												@endforeach 
											
											</select>
									</div><br>

									<div class="row">
										<div class="col">
											<label for="exampleTextarea">صورة الخبر</label>
											<input type="file" name="news_image" class="dropify" accept=".jpg, .png, image/jpeg, image/png"
											data-height="70" />
										</div>
									</div><br>

									<div class="form-group">
										<label class="display-block">حالة الخبر</label> <br>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="status" id="status_active" value="1" checked>
											<label class="form-check-label" for="status_active">
												&nbsp; فعال 
											</label>
										</div> 
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="status" id="status_inactive" value="0">
											<label class="form-check-label" for="status_inactive">
												&nbsp; غير فعال
											</label>
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

<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Fileuploads js-->
<script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
<!--Internal Fancy uploader js-->
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
<!--Internal  Form-elements js-->
<script src="{{URL::asset('assets/js/advanced-form-elements.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
<!--Internal Sumoselect js-->
<script src="{{URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
<!-- Internal TelephoneInput js-->
<script src="{{URL::asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
<script src="{{URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>

@endsection
