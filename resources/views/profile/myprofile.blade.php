@extends('layouts.master')
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
				<div class="breadcrumb-header justify-content-between" style="padding-right: 45%; padding-top: 20px;">
					<h4 class="content-title" style="font-weight: bold;">الملف الشخصي</h4>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
	<!-- row opened -->
		<div class="row">
					<div class="col-xl-12">
						<div class="card">
							<br><br>
							<form action="{{ route('profile.update') }}" method="POST">
								@csrf
								@method('patch')
								<div class="container">
									<div class="heading_container">
										<h5>
											معلومات الملف الشخصي
										</h5>
									</div>
									<br>
										<div class="col-md-12">
											<div class="form_container contact-form" style="padding-right: 10%;">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group form-focus">
														<x-input-label for="name" :value="__('الاسم')" /><br>
														<x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" style="width: 90%;" />
														<x-input-error class="mt-2" :messages="$errors->get('name')" />
													
														</div>
													</div>

												<div class="col-md-6">
													<div class="form-group form-focus">
													<x-input-label for="email" :value="__('البريد الإلكتروني')" /><br>
													<x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" style="width: 90%;"/>
													<x-input-error class="mt-2" :messages="$errors->get('email')" />
										
													@if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
														<div>
															<p class="text-sm mt-2 text-gray-800">
																{{ __('Your email address is unverified.') }}
										
																<button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
																	{{ __('Click here to re-send the verification email.') }}
																</button>
															</p>
										
															@if (session('status') === 'verification-link-sent')
																<p class="mt-2 font-medium text-sm text-green-600">
																	{{ __('A new verification link has been sent to your email address.') }}
																</p>
															@endif
														</div>
													@endif
												</div>
											</div>
													<br>
													<div class="d-flex justify-content-center">
														<button type="submit" class="btn btn-primary">حفظ البيانات</button>
													</div>
													<br>
												</div>
												<hr>
												<br>
											</div>
										</div>
								</div>
							</form>

								<form action="{{ route('password.update') }}" method="POST">
									@csrf
									@method('PUT')
									<div class="heading_container">
										<h5 style="padding-right: 5%;">
											تعديل كلمة المرور
										</h5>
									</div>
									<br>
										<div class="col-md-12">
											<div class="form_container contact-form" style="padding-right: 15%;">
												{{-- <div class="row"> --}}
													<div class="col-md-6">
													<div class="form-group form-focus">
														<x-input-label for="update_password_current_password" :value="__('كلمة المرور الحالية')" /><br>
														<x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" style="width: 85%;"/>
														<x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
													</div>
													</div>

													<div class="col-md-6">
														<div class="form-group form-focus">
															<x-input-label for="update_password_password" :value="__('كلمة المرور الجديدة')" /><br>
															<x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" style="width: 85%; float: right;"/>
															<x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
														</div>
													</div><br>
													<div class="col-md-6">
														<div class="form-group form-focus">
															<x-input-label for="update_password_password_confirmation" :value="__('تأكيد كلمة المرور')" /><br>
															<x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" style="width: 85%;"/>
															<x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
														</div>
													</div>
												
													<br>
													<div class="d-flex justify-content-center" style="float: right;">
														<button type="submit" class="btn btn-primary">حفظ البيانات</button>
													</div>
													<br><br>
												{{-- </div> --}}
												<hr>
												<br>
											</div>
										</div>
								</form>


								{{-- <x-danger-button
								x-data=""
								x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
								>{{ __('Delete Account') }}</x-danger-button> --}}
    							
								{{-- <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable> --}}

								{{-- <form action="{{ route('profile.destroy') }}" method="delete">
									@csrf
									<div class="heading_container">
										<h5 style="padding-right: 5%;">
										حذف الحساب
										</h5>
									</div>
									<br>
										<div class="col-md-12">
											<div class="form_container contact-form">
													<div class="col-md-6">
													<div class="form-group form-focus">
													<x-input-label for="password" value="{{ __('كلمة المرور') }}" class="sr-only" />

                									<x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4" placeholder="{{ __('كلمة المرور') }}" style="width: 73%; margin-right: 30%;"/>

                									<x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
													</div>
												</div>
												<br>

												<div class="mt-6 flex justify-end">
													<x-secondary-button x-on:click="$dispatch('close')">
														{{ __('إلغاء') }}
													</x-secondary-button>
									
													<x-danger-button class="ms-3 btn btn-danger" type="submit">
														{{ __('حذف الحساب') }}
													</x-danger-button>
												</div>													
													<br><br>
												<hr>
												<br>
											</div>
										</div>
								</form> --}}
    							
								{{-- </x-modal> --}}

						</div>                            
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