@extends('layouts.master2')
@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')

		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="{{URL::asset('assets/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
						</div>
					</div>
				</div>
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex"> <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1></div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2>Welcome back!</h2>
												<h5 class="font-weight-semibold mb-4">الرجاء تسجيل الدخول لاكمال البيانات</h5>
												<form method="POST" action="{{ route('login') }}">
                                                    @csrf
													<div class="form-group">
                                                        <x-input-label for="username" :value="__('اسم المستخدم')" />
                                                        <x-text-input id="username" class="form-control block mt-1 w-full" placeholder="أدخل اسم المسخدم الخاص بك " type="text" name="username" :value="old('username')" required autofocus />
                                                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
													</div>
													<div class="form-group">
														<label>كلمة السر</label>
                                                        <x-text-input id="password" class="form-control block mt-1 w-full"
                                                                        type="password"
                                                                        name="password"
                                                                        required autocomplete="current-password"
                                                                        placeholder="أدخل كلمة السر" />
                                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
													</div>
                                                    <button class="btn btn-main-primary btn-block">تسجيل الدخول</button>
												</form>
                                                <div class="block mt-4">
                                                    <label for="remember_me" class="inline-flex items-center">
                                                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                                                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('تذكرني') }}</span>
                                                    </label>
                                                </div>
												<div class="main-signin-footer mt-5">
													<p><a href="">هل نسيت كلمة السر?</a></p>
													{{-- <p>Don't have an account? <a href="{{ url('/' . $page='register') }}">تسجيل دخول جديد</a></p> --}}
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
			</div>
		</div>
@endsection
@section('js')
@endsection
