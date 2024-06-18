@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">برنامج شؤون الأيتام</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ السجلات</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning btn-icon ml-2" id="filterError-btn"><i class="fas fa-exclamation-circle"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2" id="filter-btn"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<a type="button" class="btn btn-danger btn-icon ml-2" href="{{route('orphans_records.create')}}"><i class="mdi mdi-plus"></i></a>
						</div>
                        @if (in_array(Auth::user()->type_user,["متحكم رئيسي","مدير رئيسي",'محرر']))
						<div class="pr-1 mb-3 mb-xl-0">
                            <form action="{{ route('orphans_records-export') }}" method="get">
                                @csrf
                                <div class="row row-sm">
                                    <x-form.button type="submit" class="btn btn-success mb-3">
                                        تصدير لإكسيل
                                    </x-form.button>
                                </div>
						</div>
                        @endif
					</div>
				</div>
				<!-- breadcrumb -->
                <div id="filter-error-div" style="display: none;">
                    <div class="row my-xl-auto">
                        <div class="form-group col-md-3">
                            <x-form.label>إختر نوع الخطأ</x-form.label>
                            <select class="form-control " name="error-filter" id="error-filter" >
                                <option label="أختر النوع" value="null">
                                </option>
                                <!-- <option value="repeatId">تكرار البيانات حسب الهوية</option>
                                <option value="repeatName">تكرار البيانات حسب الاسم</option> -->
                                <option value="orphan_id">رقم هوية اليتيم</option>
                                <option value="Id_father">رقم هوية الأب</option>
                                <option value="Id_mother">رقم هوية الأم</option>
                                <option value="guardian_id">رقم هوية ولي الأمر</option>
                                <option value="date_of_birth">تاريخ الميلاد</option>
                                <option value="guardian_RWO">صلة قرابة ولي الامر باليتيم</option>
                                <option value="status_health_orphan">الحالة الصحية لليتيم</option>
                                <option value="cause_of_death">سبب وفاة المتوفي</option>
                                <option value="CMD_mother">سبب وفاة الام</option>
                                <option value="CH_house">وضع البيت</option>
                                <option value="p_province">المحافظة السابقة</option>
                                <option value="p_city">المدينة السابقة</option>
                                <option value="c_province">المحافظة الحالية</option>
                                <option value="c_city">المدينة الحالية</option>
                                <option value="orphan_displaced">هل اليتيم نازح؟</option>
                                <option value="mobile_number1">رقم جوال 1</option>
                            </select>
                        </div>
                    </div>
                </div>
                {{-- filter --}}
                <div id="filter-div" style="display: none;">
                    <div class="row my-xl-auto">
                        <div class="form-group col-md-3">
                            <x-form.label>رقم الهوية</x-form.label>
                            <input type="text" class="form-control orphan_search" name="orphan_id" id='orphan_id'
                                placeholder="إملا رقم هوية اليتيم" data-id="orphan_id" maxlength="9" />
                        </div>
                        <div class="form-group col-md-3">
                            <x-form.label>اسم اليتيم</x-form.label>
                            <input type="text" class="form-control orphan_search"
                                placeholder="اسم اليتيم" data-id="orphan_name" name="orphan_name" id="orphan_name" />
                        </div>
                        <div class="form-group col-md-3">
                            <x-form.label>المحافظة الأصلية</x-form.label>
                            <select class="form-control orphan_search" name="p_province" data-id="orphan_p_province" id="orphan_p_province">
                                <option label="أختر المكان">
                                </option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province }}">
                                        {{ $province }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <x-form.label>المدينة الأصلية</x-form.label>
                            <select class="form-control orphan_search" name="p_city" data-id="orphan_p_city" id="orphan_p_city">
                                <option label="أختر المكان">
                                </option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city }}">
                                        {{ $city }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <x-form.label>محافطة النزوح</x-form.label>
                            <select class="form-control orphan_search" name="c_province" data-id="orphan_c_province" id="orphan_c_province">
                                <option label="أختر المكان">
                                </option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province }}">
                                        {{ $province }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <x-form.label>مدينة النزوح</x-form.label>
                            <select class="form-control orphan_search" name="c_city" data-id="orphan_c_city" id="orphan_c_city">
                                <option label="أختر المكان">
                                </option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city }}">
                                        {{ $city }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <x-form.label>اسم الام</x-form.label>
                            <input type="text" class="form-control orphan_search"
                                placeholder="اسم الام" data-id="mother_name" name="mother_name" id="mother_name" />
                        </div>
                        <div class="form-group col-md-3">
                            <x-form.label>اسم المتوفى</x-form.label>
                            <input type="text" class="form-control orphan_search"
                                placeholder="اسم المتوفي" data-id="deceased_name" name="deceased_name" id="deceased_name" />
                        </div>
                        <div class="form-group col-md-3">
                            <x-form.label>سبب الوفاء</x-form.label>
                            <select class="form-control orphan_search" name="cause_of_death" data-id="cause_of_death" id="cause_of_death" >
                                <option label="أختر السبب">
                                </option>
                                @foreach ($causes_of_death as $cause_of_death)
                                    <option value="{{ $cause_of_death }}">
                                        {{ $cause_of_death }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <x-form.label>الحالة الصحية لليتيم</x-form.label>
                            <select class="form-control orphan_search" name="status_health_orphan" data-id="status_health_orphan" id="status_health_orphan" >
                                <option label="أختر الحالة">
                                </option>
                                @foreach ($status_health_orphan as $status_health_orphan)
                                    <option value="{{ $status_health_orphan }}">
                                        {{ $status_health_orphan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <x-form.label>يتيم الوالدين</x-form.label>
                            <select class="form-control orphan_search" name="child_orphaned_parents" data-id="child_orphaned_parents" id="child_orphaned_parents" >
                                <option label="أختر">
                                </option>
                                @foreach ($child_orphaned_parents as $child_orphaned_parents)
                                    <option value="{{ $child_orphaned_parents }}">
                                        {{ $child_orphaned_parents }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <x-form.label>وضع المنزل</x-form.label>
                            <select class="form-control orphan_search" name="CH_house" data-id="CH_house" id="CH_house" >
                                <option label="أختر الحالة">
                                </option>
                                @foreach ($CH_house as $CH_house)
                                    <option value="{{ $CH_house }}">
                                        {{ $CH_house }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <x-form.label>هل اليتيم نازح؟</x-form.label>
                            <select class="form-control orphan_search" name="orphan_displaced" data-id="orphan_displaced" id="orphan_displaced" >
                                <option label="أختر الوضع">
                                </option>
                                @foreach ($orphan_displaced as $orphan_displaced)
                                    <option value="{{ $orphan_displaced }}">
                                        {{ $orphan_displaced }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <x-form.label>من تاريخ الميلاد</x-form.label>
                            <input class="form-control orphan_search" id="date_of_birth_from" data-id="date_of_birth_from" type="date" name="date_of_birth_from">
                        </div>
                        <div class="form-group col-md-3">
                            <x-form.label>الى تاريخ ميلاد</x-form.label>
                            <input class="form-control orphan_search" id="date_of_birth_to" data-id="date_of_birth_to" type="date" name="date_of_birth_to">
                        </div>
                        <div class="form-group col-md-3">
                            <x-form.label>استفاد كسوة</x-form.label>
                            <select class="form-control orphan_search" name="livery" data-id="livery" id="livery" >
                                <option label="أختر الحالة">
                                </option>
                                @foreach ($livery as $livery)
                                    <option value="{{ $livery }}">
                                        {{ $livery }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <x-form.label>اسفاد كفالة</x-form.label>
                            <select class="form-control orphan_search" name="financial_aid" data-id="financial_aid" id="financial_aid" >
                                <option label="أختر الحالة">
                                </option>
                                @foreach ($financial_aid as $financial_aid)
                                    <option value="{{ $financial_aid }}">
                                        {{ $financial_aid }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <x-form.label>مضاف من تاريخ</x-form.label>
                            <input class="form-control orphan_search" id="created_at_from"  type="date" name="created_at_from">
                        </div>
                        <div class="form-group col-md-3">
                            <x-form.label>حتى تاريخ</x-form.label>
                            <input class="form-control orphan_search" id="created_at_to" type="date" name="created_at_to">
                        </div>
                        @if (in_array(Auth::user()->type_user,["متحكم رئيسي","مدير رئيسي"]))
                        <div class="form-group col-md-3">
                            <x-form.label>مدخل البيانات</x-form.label>
                            <select class="form-control orphan_search" name="data_portal" id="data_portal" >
                                <option label="أختر المدخل">
                                </option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                    </div>
                </div>
            </form>
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<!--div-->
					<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">سجلات الأيتام</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive" id="employee_table">
									<table  class="table table-bordered table-hover table-striped">
										<thead>
                                            <th class="border-bottom-0">الاسم</th>
                                            <th class="border-bottom-0">الجنس</th>
                                            <th class="border-bottom-0">رقم الهوية</th>
                                            <th class="border-bottom-0">تاريخ الميلاد</th>
                                            <th class="border-bottom-0">عمر اليتيم</th>
                                            <th class="border-bottom-0">اسم ولي الامر</th>
                                            <th class="border-bottom-0">صلة القرابة</th>
                                            <th class="border-bottom-0">هوية ولي الامر</th>
                                            <th class="border-bottom-0">الحالة الصحية</th>
                                            <th class="border-bottom-0">اسم المتوفي</th>
                                            <th class="border-bottom-0">تاريخ الوفاء</th>
                                            <th class="border-bottom-0">المحافظة الأصلية</th>
                                            <th class="border-bottom-0">المدينة الأصلية</th>
                                            <th class="border-bottom-0">الطفل يتيم الوالدين</th>
                                            <th class="border-bottom-0">عدد الأخوة</th>
                                            <th class="border-bottom-0">عدد الأخوات</th>
                                            <th class="border-bottom-0">رقم الجوال 1</th>
                                            <th class="border-bottom-0">رقم الواتس</th>
                                            <th class="border-bottom-0">اسفاد كسوة</th>
                                            <th class="border-bottom-0">اسفاد كفالة</th>
                                        </thead>
										<tbody id="table_orphan">
                                            @foreach ( $orphanRecords as $orphanRecord )
                                                <tr>
                                                    <td>
                                                        <a class="nav-link" href="{{route('orphans_records.edit',$orphanRecord['id'])}}">{{$orphanRecord['name']}}</a>
                                                    </td>
                                                    <td>{{$orphanRecord['gender']}}</td>
                                                    <td>{{$orphanRecord['orphan_id']}}</td>
                                                    <td>{{$orphanRecord['date_of_birth']}}</td>
                                                    <td>{{$orphanRecord['orphan_age']}}</td>
                                                    <td>{{$orphanRecord['guardian_name']}}</td>
                                                    <td>{{$orphanRecord['guardian_RWO']}}</td>
                                                    <td>{{$orphanRecord['guardian_id']}}</td>
                                                    <td>{{$orphanRecord['status_health_orphan']}}</td>
                                                    <td>{{$orphanRecord['deceased_name']}}</td>
                                                    <td>{{$orphanRecord['date_of_death']}}</td>
                                                    <td>{{$orphanRecord['p_province']}}</td>
                                                    <td>{{$orphanRecord['p_city']}}</td>
                                                    <td>{{$orphanRecord['child_orphaned_parents']}}</td>
                                                    <td>{{$orphanRecord['N_brothers']}}</td>
                                                    <td>{{$orphanRecord['N_sisters']}}</td>
                                                    <td>{{$orphanRecord['mobile_number1']}}</td>
                                                    <td>{{$orphanRecord['WhatsApp_number']}}</td>
                                                    <td>{{$orphanRecord['livery']}}</td>
                                                    <td>{{$orphanRecord['financial_aid']}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
									</table>
                                    <div class="box_links">
                                        {{ $orphanRecords->withQueryString()->links() }}
                                    </div>
								</div>
							</div>
						</div>
					</div>
					<!--/div-->
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
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
<script>
    const csrf_token = "{{ csrf_token() }}";
    const app_link = "{{ config('app.app_link')}}";
</script>
<script src="{{URL::asset('js/filter.js')}}"></script>
@endsection
