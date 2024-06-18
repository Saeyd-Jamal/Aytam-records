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
                            <h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{$user->name}} / تعديل</span>
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
                    <h4 class="text-right">إعدادات الملف الشخصي</h4>
                </div>
                <form action="{{route('users.update',$user->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">الاسم</label><input type="text" class="form-control" placeholder="name" name="name" value="{{$user->name}}"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">اسم المستخدم</label>
                            <input type="text" class="form-control"
                                                placeholder="اسم المستخدم"
                                                name="username"
                                                @disabled(!in_array(Auth::user()->type_user,["متحكم رئيسي","مدير رئيسي"]))
                                                value="{{$user->username}}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">كلمة السر</label>
                            <input type="password" class="form-control" placeholder="ادخل كلمة السر" name="password">
                        </div>
                        <div class="col-md-12"><label class="labels">رقم الجوال</label><input type="text" class="form-control" placeholder="رقم الهاتف" name="phone_number" value="{{$user->phone_number}}"></div>
                    </div>

                    @if ($user->type_user != 'متحكم رئيسي' &&( Auth::user()->type_user == "متحكم رئيسي" OR Auth::user()->type_user == "مدير رئيسي" ))
                        <label class="labels">نوع المستخدم</label>
                        <select class="form-control" name="type_user" required>
                            <option label="أختر صلاحيته" @selected($user->type_user == null)>
                            </option>
                            @if (Auth::user()->type_user == "متحكم رئيسي")
                                <option value="متحكم رئيسي"> متحكم رئيسي</option>
                            @endif
                            @foreach ($type_user as $type_user)
                            <option value="{{ $type_user }}"  @selected($user->type_user == $type_user)>
                                {{ $type_user }}
                            </option>
                            @endforeach
                        </select>
                    @endif

                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">حفظ الملف الشخصي</button></div>
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
