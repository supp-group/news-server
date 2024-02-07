@extends('admin.layouts.master')

@section('css')
@endsection

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الإعجابات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ إعجابات الأخبار</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<a href="{{ url('/cpanel/site') }}" type="button" class="btn btn-primary" style="color: white">الموقع العام</a>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection

@section('content')
				<!-- row -->
				<div class="row">

					<div class="py-12">
						<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
							<div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
								<div class="p-6 bg-white border-b border-gray-200">
									<div>
										<h4 class="mb-4 text-2xl font-bold">الأخبار</h4>
										@if (session()->has('message'))
										<div class="px-4 py-4 text-green-800 bg-green-200 border-l-4 border-green-900 rounded">
											{{ session('message') }}
										</div>
										@endif
										<div>
											<div class="flex flex-col mt-8">
												<div class="py-2">
													<div class="min-w-full border-b border-gray-200 shadow">
														<table class="min-w-full">
															<thead>
																<tr>
																	<th
																		class="px-6 py-3 text-left text-gray-500 border-b border-gray-200 bg-gray-50">
																		#
																	</th>
																	<th
																		class="px-6 py-3 text-left text-gray-500 border-b border-gray-200 bg-gray-50">
																		Title
																	</th>
																	<th
																		class="px-6 py-3 text-left text-gray-500 border-b border-gray-200 bg-gray-50">
																		Description
																	</th>
																	<th
																		class="px-6 py-3 text-left text-gray-500 border-b border-gray-200 bg-gray-50">
																		Action
																	</th>
																</tr>
															</thead>
				
															<tbody class="bg-white">
																@foreach($news as $new)
																<tr>
																	<td class="px-6 py-4 border-b border-gray-200">
																		<div class="flex items-center">
																			<div class="ml-4">
																				<div class="text-sm text-gray-900">
																					{{ $new->id }}
																				</div>
																			</div>
																		</div>
																	</td>
				
																	<td class="px-6 py-4 border-b border-gray-200">
																		<div class="text-sm text-gray-900">
																			{{ $new->title }}
																		</div>
																	</td>
				
																	<td class="px-6 py-4 border-b border-gray-200">
																		{{ $new->content }}
																	</td>
				
																	{{-- <td
																		class="px-6 py-4 text-sm text-gray-500 border-b border-gray-200 ">
																		<form action="{{ route('like.post', $post->id) }}"
																			method="post">
																			@csrf
																			<button
																				class="{{ $post->liked() ? 'bg-blue-600' : '' }} px-4 py-2 text-white bg-gray-600">
																				like {{ $post->likeCount }}
																			</button>
																		</form>
				
																	</td> 
																	<td
																		class="px-6 py-4 text-sm text-gray-500 border-b border-gray-200">
																		<form action="{{ route('unlike.post', $post->id) }}"
																			method="post">
																			@csrf
																			<button
																				class="{{ $post->liked() ? 'block' : 'hidden'  }} px-4 py-2 text-white bg-red-600">
																				unlike
																			</button>
																		</form>
																	</td> --}}
				
																</tr>
																@endforeach
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
	
				</div>
				<!-- row closed -->
@endsection

@section('js')
@endsection
