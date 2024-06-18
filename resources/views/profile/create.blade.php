@extends('layouts.master3')
@section('css')
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
                            <h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ إنشاء جديد</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="https://bootdey.com/img/Content/avatar/avatar7.png">
                {{-- <span class="font-weight-bold">Edogaru</span> --}}
                {{-- <span class="text-black-50">edogaru@mail.com.my</span> --}}
                <span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">إنشاء مستخدم جديد</h4>
                </div>
                <form action="{{route('users.store')}}" method="POST">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label class="labels">الاسم</label>
                            <div class="input-group mb-3">
                                <x-form.input   type="text" name="name" placeholder="الاسم" required />
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">اسم المستخدم</label>
                            <div class="input-group mb-3">
                                <x-form.input   type="text" name="username" placeholder="اسم المستخدم" required/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">كلمة السر</label>
                            <x-form.input type="password" name="password" placeholder="ادخل كلمة السر" required/>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">رقم الجوال</label>
                            <x-form.input type="text" name="phone_number" placeholder="رقم الهاتف"/>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label class="labels">نوع المستخدم</label>
                        <select class="form-control" name="type_user" required>
                            <option label="أختر صلاحيته"></option>
                            @if (Auth::user()->type_user == "متحكم رئيسي")
                                <option value="متحكم رئيسي"> متحكم رئيسي</option>
                            @endif
                            @foreach ($type_user as $type_user)
                            <option value="{{ $type_user }}">
                                {{ $type_user }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">انشاء حساب جديد</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
@endsection
