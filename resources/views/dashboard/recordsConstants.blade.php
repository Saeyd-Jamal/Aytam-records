@extends('layouts.master4')
@push('styles')
<!--Internal Sumoselect css-->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css')}}">
@endpush
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">سجلات الأيتام</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الثوابت</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                    <div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
								</div>
							</div>
							<div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <x-form.label>اقل تاريخ ميلاد لليتيم</x-form.label>
                                            <form action="{{route('orphans_records-recordsConstants-create')}}" method="POST">
                                                @csrf
                                                <div class="input-group mb-3">
                                                    <x-form.input :value="$date_of_birth_f" type="date" name="date_of_birth" />
                                                </div>
                                                <span class="input-group-btn"><button class="btn btn-primary" type="submit"><span class="input-group-btn"><i class="fas fa-check"></i></span></button></span>
                                            </form>
                                        </div>
                                        <hr style="width: 100%; opacity: 30%;" class="border d-block border-primary border-1 opacity-75">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 d-flex justify-content-between align-items-center mb-0">
                                            <x-form.label class="col-md-1">الجنس</x-form.label>
                                            <select class="form-control mr-2 ml-2 col-md-4 gender" id="gender" name="gender">
                                                <option value="null">اختر للعرض وتحديد الحذف</option>
                                                @foreach ($gender as $gender)
                                                    <option value="{{ $gender['values'] }}">
                                                        {{ $gender['values'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <form action="{{route('orphans_records-recordsConstants-destroy')}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <x-form.input type="hidden" name="old-gender" id="old-gender"/>
                                                <button class="btn btn-danger col-md-12" id="del-gender" type="submit">حذف الخيار المحدد</button>
                                            </form>
                                            <form action="{{route('orphans_records-recordsConstants-create')}}" method="POST">
                                                @csrf
                                                <x-form.input style="display: inline" class="form-control" type="text" class="col-md-8" name="new-gender" placeholder="إضافة عنصر جديد" required/>
                                                <span class="input-group-btn"><button class="btn btn-primary" type="submit"><span class="input-group-btn"><i class="fas fa-check"></i></span></button></span>
                                            </form>
                                        </div>
                                        <hr style="width: 100%; opacity: 30%;" class="border d-block border-primary border-1 opacity-75 mt-1 mb-1">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 d-flex justify-content-between align-items-center mb-0">
                                            <x-form.label class="col-md-2">المحافظات</x-form.label>
                                            <select class="form-control mr-2 ml-2 col-md-4 province" id="province" name="province">
                                                <option value="null">اختر للعرض وتحديد الحذف</option>
                                                @foreach ($provinces as $province)
                                                    <option value="{{ $province['values'] }}">
                                                        {{ $province['values'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <form action="{{route('orphans_records-recordsConstants-destroy')}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <x-form.input type="hidden" name="old-province" id="old-province"/>
                                                <button class="btn btn-danger col-md-12" id="del-province" type="submit">حذف الخيار المحدد</button>
                                            </form>
                                            <form action="{{route('orphans_records-recordsConstants-create')}}" method="POST">
                                                @csrf
                                                <x-form.input style="display: inline" class="form-control" type="text" class="col-md-8" name="new-province" placeholder="إضافة عنصر جديد" required/>
                                                <span class="input-group-btn"><button class="btn btn-primary" type="submit"><span class="input-group-btn"><i class="fas fa-check"></i></span></button></span>
                                            </form>
                                        </div>
                                        <hr style="width: 100%; opacity: 30%;" class="border d-block border-primary border-1 opacity-75 mt-1 mb-1">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 d-flex justify-content-between align-items-center mb-0">
                                            <x-form.label class="col-md-2">المدن</x-form.label>
                                            <select class="form-control mr-2 ml-2 col-md-4 city" id="city" name="city">
                                                <option value="null">اختر للعرض وتحديد الحذف</option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city['values'] }}">
                                                        {{ $city['values'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <form action="{{route('orphans_records-recordsConstants-destroy')}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <x-form.input type="hidden" name="old-city" id="old-city"/>
                                                <button class="btn btn-danger col-md-12" id="del-city" type="submit">حذف الخيار المحدد</button>
                                            </form>
                                            <form action="{{route('orphans_records-recordsConstants-create')}}" method="POST">
                                                @csrf
                                                <x-form.input style="display: inline" class="form-control" type="text" class="col-md-8" name="new-city" placeholder="إضافة عنصر جديد" required/>
                                                <span class="input-group-btn"><button class="btn btn-primary" type="submit"><span class="input-group-btn"><i class="fas fa-check"></i></span></button></span>
                                            </form>
                                        </div>
                                        <hr style="width: 100%; opacity: 30%;" class="border d-block border-primary border-1 opacity-75 mt-1 mb-1">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 d-flex justify-content-between align-items-center mb-0">
                                            <x-form.label class="col-md-2">أماكن الميلاد</x-form.label>
                                            <select class="form-control mr-2 ml-2 col-md-4 address_of_birth" id="address_of_birth" name="address_of_birth">
                                                <option value="null">اختر للعرض وتحديد الحذف</option>
                                                @foreach ($address_of_birth as $address_of_birth)
                                                    <option value="{{ $address_of_birth['values'] }}">
                                                        {{ $address_of_birth['values'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <form action="{{route('orphans_records-recordsConstants-destroy')}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <x-form.input type="hidden" name="old-address_of_birth" id="old-address_of_birth"/>
                                                <button class="btn btn-danger col-md-12" id="del-address_of_birth" type="submit">حذف الخيار المحدد</button>
                                            </form>
                                            <form action="{{route('orphans_records-recordsConstants-create')}}" method="POST">
                                                @csrf
                                                <x-form.input style="display: inline" class="form-control" type="text" class="col-md-8" name="new-address_of_birth" placeholder="إضافة عنصر جديد" required/>
                                                <span class="input-group-btn"><button class="btn btn-primary" type="submit"><span class="input-group-btn"><i class="fas fa-check"></i></span></button></span>
                                            </form>
                                        </div>
                                        <hr style="width: 100%; opacity: 30%;" class="border d-block border-primary border-1 opacity-75 mt-1 mb-1">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 d-flex justify-content-between align-items-center mb-0">
                                            <x-form.label class="col-md-2">صلة القرابة لليتيم</x-form.label>
                                            <select class="form-control mr-2 ml-2 col-md-4 guardian_RWO" id="guardian_RWO" name="guardian_RWO">
                                                <option value="null">اختر للعرض وتحديد الحذف</option>
                                                @foreach ($guardian_RWOs as $guardian_RWO)
                                                    <option value="{{ $guardian_RWO['values'] }}">
                                                        {{ $guardian_RWO['values'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <form action="{{route('orphans_records-recordsConstants-destroy')}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <x-form.input type="hidden" name="old-guardian_RWO" id="old-guardian_RWO"/>
                                                <button class="btn btn-danger col-md-12" id="del-guardian_RWO" type="submit">حذف الخيار المحدد</button>
                                            </form>
                                            <form action="{{route('orphans_records-recordsConstants-create')}}" method="POST">
                                                @csrf
                                                <x-form.input style="display: inline" class="form-control" type="text" class="col-md-8" name="new-guardian_RWO" placeholder="إضافة عنصر جديد" required/>
                                                <span class="input-group-btn"><button class="btn btn-primary" type="submit"><span class="input-group-btn"><i class="fas fa-check"></i></span></button></span>
                                            </form>
                                        </div>
                                        <hr style="width: 100%; opacity: 30%;" class="border d-block border-primary border-1 opacity-75 mt-1 mb-1">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 d-flex justify-content-between align-items-center mb-0">
                                            <x-form.label class="col-md-2">الحالة الصحية لليتيم</x-form.label>
                                            <select class="form-control mr-2 ml-2 col-md-4 status_health_orphan" id="status_health_orphan" name="status_health_orphan">
                                                <option value="null">اختر للعرض وتحديد الحذف</option>
                                                @foreach ($status_health_orphan as $status_health_orphan)
                                                    <option value="{{ $status_health_orphan['values'] }}">
                                                        {{ $status_health_orphan['values'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <form action="{{route('orphans_records-recordsConstants-destroy')}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <x-form.input type="hidden" name="old-status_health_orphan" id="old-status_health_orphan"/>
                                                <button class="btn btn-danger col-md-12" id="del-status_health_orphan" type="submit">حذف الخيار المحدد</button>
                                            </form>
                                            <form action="{{route('orphans_records-recordsConstants-create')}}" method="POST">
                                                @csrf
                                                <x-form.input style="display: inline" class="form-control" type="text" class="col-md-8" name="new-status_health_orphan" placeholder="إضافة عنصر جديد" required/>
                                                <span class="input-group-btn"><button class="btn btn-primary" type="submit"><span class="input-group-btn"><i class="fas fa-check"></i></span></button></span>
                                            </form>
                                        </div>
                                        <hr style="width: 100%; opacity: 30%;" class="border d-block border-primary border-1 opacity-75 mt-1 mb-1">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 d-flex justify-content-between align-items-center mb-0">
                                            <x-form.label class="col-md-2">هل الطفل يتيم الأبوين؟</x-form.label>
                                            <select class="form-control mr-2 ml-2 col-md-4 child_orphaned_parents" id="child_orphaned_parents" name="child_orphaned_parents">
                                                <option value="null">اختر للعرض وتحديد الحذف</option>
                                                @foreach ($child_orphaned_parents as $child_orphaned_parents)
                                                    <option value="{{ $child_orphaned_parents['values'] }}">
                                                        {{ $child_orphaned_parents['values'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <form action="{{route('orphans_records-recordsConstants-destroy')}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <x-form.input type="hidden" name="old-child_orphaned_parents" id="old-child_orphaned_parents"/>
                                                <button class="btn btn-danger col-md-12" id="del-child_orphaned_parents" type="submit">حذف الخيار المحدد</button>
                                            </form>
                                            <form action="{{route('orphans_records-recordsConstants-create')}}" method="POST">
                                                @csrf
                                                <x-form.input style="display: inline" class="form-control" type="text" class="col-md-8" name="new-child_orphaned_parents" placeholder="إضافة عنصر جديد" required/>
                                                <span class="input-group-btn"><button class="btn btn-primary" type="submit"><span class="input-group-btn"><i class="fas fa-check"></i></span></button></span>
                                            </form>
                                        </div>
                                        <hr style="width: 100%; opacity: 30%;" class="border d-block border-primary border-1 opacity-75 mt-1 mb-1">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 d-flex justify-content-between align-items-center mb-0">
                                            <x-form.label class="col-md-2">وضع المنزل</x-form.label>
                                            <select class="form-control mr-2 ml-2 col-md-4 CH_house" id="CH_house" name="CH_house">
                                                <option value="null">اختر للعرض وتحديد الحذف</option>
                                                @foreach ($CH_house as $CH_house)
                                                    <option value="{{ $CH_house['values'] }}">
                                                        {{ $CH_house['values'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <form action="{{route('orphans_records-recordsConstants-destroy')}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <x-form.input type="hidden" name="old-CH_house" id="old-CH_house"/>
                                                <button class="btn btn-danger col-md-12" id="del-CH_house" type="submit">حذف الخيار المحدد</button>
                                            </form>
                                            <form action="{{route('orphans_records-recordsConstants-create')}}" method="POST">
                                                @csrf
                                                <x-form.input required style="display: inline" class="form-control" type="text" class="col-md-8" name="new-CH_house" placeholder="إضافة عنصر جديد"/>
                                                <span class="input-group-btn"><button class="btn btn-primary" type="submit"><span class="input-group-btn"><i class="fas fa-check"></i></span></button></span>
                                            </form>
                                        </div>
                                        <hr style="width: 100%; opacity: 30%;" class="border d-block border-primary border-1 opacity-75 mt-1 mb-1">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 d-flex justify-content-between align-items-center mb-0">
                                            <x-form.label class="col-md-2">هل اليتيم نازح؟</x-form.label>
                                            <select class="form-control mr-2 ml-2 col-md-4 orphan_displaced" id="orphan_displaced" name="orphan_displaced">
                                                <option value="null">اختر للعرض وتحديد الحذف</option>
                                                @foreach ($orphan_displaced as $orphan_displaced)
                                                    <option value="{{ $orphan_displaced['values'] }}">
                                                        {{ $orphan_displaced['values'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <form action="{{route('orphans_records-recordsConstants-destroy')}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <x-form.input type="hidden" name="old-orphan_displaced" id="old-orphan_displaced"/>
                                                <button class="btn btn-danger col-md-12" id="del-orphan_displaced" type="submit">حذف الخيار المحدد</button>
                                            </form>
                                            <form action="{{route('orphans_records-recordsConstants-create')}}" method="POST">
                                                @csrf
                                                <x-form.input required style="display: inline" class="form-control" type="text" class="col-md-8" name="new-orphan_displaced" placeholder="إضافة عنصر جديد"/>
                                                <span class="input-group-btn"><button class="btn btn-primary" type="submit"><span class="input-group-btn"><i class="fas fa-check"></i></span></button></span>
                                            </form>
                                        </div>
                                        <hr style="width: 100%; opacity: 30%;" class="border d-block border-primary border-1 opacity-75 mt-1 mb-1">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 d-flex justify-content-between align-items-center mb-0">
                                            <x-form.label class="col-md-2">استفاد كسوة</x-form.label>
                                            <select class="form-control mr-2 ml-2 col-md-4 livery" id="livery" name="livery">
                                                <option value="null">اختر للعرض وتحديد الحذف</option>
                                                @foreach ($livery as $livery)
                                                    <option value="{{ $livery['values'] }}">
                                                        {{ $livery['values'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <form action="{{route('orphans_records-recordsConstants-destroy')}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <x-form.input type="hidden" name="old-livery" id="old-livery"/>
                                                <button class="btn btn-danger col-md-12" id="del-livery" type="submit">حذف الخيار المحدد</button>
                                            </form>
                                            <form action="{{route('orphans_records-recordsConstants-create')}}" method="POST">
                                                @csrf
                                                <x-form.input required style="display: inline" class="form-control" type="text" class="col-md-8" name="new-livery" placeholder="إضافة عنصر جديد"/>
                                                <span class="input-group-btn"><button class="btn btn-primary" type="submit"><span class="input-group-btn"><i class="fas fa-check"></i></span></button></span>
                                            </form>
                                        </div>
                                        <hr style="width: 100%; opacity: 30%;" class="border d-block border-primary border-1 opacity-75 mt-1 mb-1">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 d-flex justify-content-between align-items-center mb-0">
                                            <x-form.label class="col-md-2">استفاد كفالة</x-form.label>
                                            <select class="form-control mr-2 ml-2 col-md-4 financial_aid" id="financial_aid" name="financial_aid">
                                                <option value="null">اختر للعرض وتحديد الحذف</option>
                                                @foreach ($financial_aid as $financial_aid)
                                                    <option value="{{ $financial_aid['values'] }}">
                                                        {{ $financial_aid['values'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <form action="{{route('orphans_records-recordsConstants-destroy')}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <x-form.input type="hidden" name="old-financial_aid" id="old-financial_aid"/>
                                                <button class="btn btn-danger col-md-12" id="del-financial_aid" type="submit">حذف الخيار المحدد</button>
                                            </form>
                                            <form action="{{route('orphans_records-recordsConstants-create')}}" method="POST">
                                                @csrf
                                                <x-form.input  style="display: inline" class="form-control" type="text" class="col-md-8" name="new-financial_aid" placeholder="إضافة عنصر جديد" required/>
                                                <span class="input-group-btn"><button class="btn btn-primary" type="submit"><span class="input-group-btn"><i class="fas fa-check"></i></span></button></span>
                                            </form>
                                        </div>
                                        <hr style="width: 100%; opacity: 30%;" class="border d-block border-primary border-1 opacity-75 mt-1 mb-1">
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@push('scripts')
<!--Internal Sumoselect js-->
<script src="{{URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
<script src="{{URL::asset('js/recordsConstants.js')}}"></script>

@endpush


