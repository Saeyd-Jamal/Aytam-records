@extends('layouts.master')
@section('content')
    <form action="{{ route('orphans_records.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- name --}}
        <div class="row mt-3">
            <div class="form-group col-md-3">
                <x-form.label>الاسم</x-form.label>
                <div class="input-group mb-3">
                    <x-form.input type="text" name="first_name" required />
                </div>
            </div>
            <div class="form-group col-md-3">
                <x-form.label>اسم الأب</x-form.label>
                <div class="input-group mb-3">
                    <x-form.input type="text" name="father_name" required />
                </div>
            </div>
            <div class="form-group col-md-3">
                <x-form.label>اسم الجد</x-form.label>
                <div class="input-group mb-3">
                    <x-form.input type="text" name="grandfather_name" required />
                </div>
            </div>
            <div class="form-group col-md-3">
                <x-form.label>العائلة</x-form.label>
                <div class="input-group mb-3">
                    <x-form.input type="text" name="family_name" required />
                </div>
            </div>
        </div>
        <div class="row mt-3">
    <div class="form-group col-md-3">
        <x-form.label>رقم هوية اليتيم</x-form.label>
        <div class="input-group mb-3">
            <x-form.input id="orphan_id" type="text" :value="$orphanRecord->orphan_id" name="orphan_id" minlength="9" maxlength="9" required />
        </div>
        <div class="invalid_feedback orphan_id_box"></div>
    </div>
    <div class="form-group col-md-3">
        <x-form.label>تاريخ الميلاد</x-form.label>
        <div class="input-group">
            <x-form.input class="form-control" min="{{$date_of_birth}}" max="{{$date_of_birth_to}}" :value="$orphanRecord->date_of_birth" placeholder="MM/DD/YYYY" type="date" name="date_of_birth" required/>
        </div>
    </div>
    <div class="form-group col-md-3">
        <x-form.label>مكان الميلاد</x-form.label>
        <div class="input-group mb-3">
            <x-form.input type="text" :value="$orphanRecord->address_of_birth" name="address_of_birth" required />
        </div>
    </div>
    <div class="form-group col-md-3">
        <x-form.label>الجنس</x-form.label>
        <select class="form-control" name="gender" required>
            <option value="ذكر" @selected($orphanRecord->gender == 'ذكر')>
                ذكر
            </option>
            <option value="أنثى" @selected($orphanRecord->gender == 'أنثى' OR $orphanRecord->gender == 'انثى')>
                أنثى
            </option>
        </select>
    </div>
</div>
<div class="row mt-3">
    <div class="form-group col-md-3">
        <x-form.label>ملاحظات عامة حول اليتيم</x-form.label>
        <div class="col-lg">
            <textarea class="form-control" value="{{$orphanRecord->notes_orphan}}" name="notes_orphan" placeholder="يمكنك كتابة ملاحظات " rows="3" ></textarea>
        </div>
    </div>
    <div class="form-group col-md-3">
        <x-form.label>حالة اليتيم الصحية</x-form.label>
        <select class="form-control" name="status_health_orphan" required>
            <option label="أختر الحالة" @selected($orphanRecord->status_health_orphan == 'null')>
            </option>
            @foreach ($status_health_orphan as $status_health_orphan)
                <option value="{{ $status_health_orphan }}" @selected($orphanRecord->status_health_orphan == $status_health_orphan)>
                    {{ $status_health_orphan }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-3">
        <x-form.label>ملاحظات حول حالة اليتيم الصحية</x-form.label>
        <div class="col-lg">
            <textarea class="form-control"  value="{{$orphanRecord->health_status_notes}}" name="health_status_notes" placeholder="يمكنك شرح الحالة بشكل مفصل" rows="3"></textarea>
        </div>
    </div>
    <div class="form-group col-md-3">
        <x-form.label>هل يتيم الوالدين؟</x-form.label>
        <select class="form-control"  id="child_orphaned_parents" name="child_orphaned_parents" required>
            <option label="أختر" @selected($orphanRecord->child_orphaned_parents == null)>
            </option>
            @foreach ($child_orphaned_parents as $child_orphaned_parents)
                <option value="{{ $child_orphaned_parents }}" @selected($orphanRecord->child_orphaned_parents == $child_orphaned_parents)>
                    {{ $child_orphaned_parents }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="row mt-3">
    <div class="form-group col-md-3">
        <x-form.label>رقم هوية الاب</x-form.label>
        <div class="input-group mb-3">
            <x-form.input id="orphan_id" :value="$orphanRecord->Id_father" type="text" name="Id_father" minlength="9" maxlength="9"/>
        </div>
    </div>
    <div class="form-group col-md-3">
        <x-form.label>تاريخ ميلاد الأب</x-form.label>
        <div class="input-group">
            <x-form.input :value="$orphanRecord->DFB_father" placeholder="MM/DD/YYYY" type="date" name="DFB_father" />
        </div>
    </div>
    <div class="form-group col-md-3">
        <x-form.label>اسم المتوفى</x-form.label>
        <div class="input-group mb-3">
            <x-form.input type="text" :value="$orphanRecord->deceased_name" name="deceased_name" required/>
        </div>
    </div>
    <div class="form-group col-md-3">
        <x-form.label>تاريخ الوفاء</x-form.label>
        <div class="input-group">
            <x-form.input :value="$orphanRecord->date_of_death" placeholder="MM/DD/YYYY" type="date" name="date_of_death" required/>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="form-group col-md-3">
        <x-form.label>سبب الوفاء</x-form.label>
        <select class="form-control" name="cause_of_death" required>
            <option label="أختر السبب" @selected($orphanRecord->cause_of_death == null)>
            </option>
            @foreach ($causes_of_death as $cause_of_death)
                <option value="{{ $cause_of_death }}" @selected($orphanRecord->cause_of_death == $cause_of_death)>
                    {{ $cause_of_death}}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-3">
        <x-form.label>اسم الأم</x-form.label>
        <div class="input-group mb-3">
            <x-form.input type="text" :value="$orphanRecord->mother_name" name="mother_name" required />
        </div>
    </div>
    <div class="form-group col-md-3">
        <x-form.label>رقم هوية الأم</x-form.label>
        <div class="input-group mb-3">
            <x-form.input id="Id_mother" :value="$orphanRecord->Id_mother" type="text" name="Id_mother" minlength="9" maxlength="9" required/>
        </div>
    </div>
    <div class="form-group col-md-3">
        <x-form.label>تاريخ ميلاد الأم</x-form.label>
        <div class="input-group">
            <x-form.input type="date" name="DMB_mother" :value="$orphanRecord->DMB_mother" />
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="form-group col-md-3">
        <x-form.label>تاريخ وفاء الام</x-form.label>
        <div class="input-group">
            <x-form.input class="form-control fields_mother" disabled :value="$orphanRecord->DMD_mother" placeholder="MM/DD/YYYY" type="date" name="DMD_mother"/>
        </div>
    </div>
    <div class="form-group col-md-3">
        <x-form.label>سبب وفاء الام</x-form.label>
        <select class="form-control fields_mother" name="CMD_mother">
            <option label="أختر السبب" @selected($orphanRecord->CMD_mother == null)>
            </option>
            @foreach ($causes_of_death as $cause_of_death)
                <option value="{{ $cause_of_death }}" @selected($orphanRecord->CMD_mother == $cause_of_death)>
                    {{ $cause_of_death }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-3">
        <x-form.label>عدد الاخوة الذكور</x-form.label>
        <div class="input-group mb-3">
            <x-form.input type="number" :value="$orphanRecord->N_brothers" name="N_brothers" required min='0'/>
        </div>
    </div>
    <div class="form-group col-md-3">
        <x-form.label>عدد الاخوات الإناث</x-form.label>
        <div class="input-group mb-3">
            <x-form.input type="number" :value="$orphanRecord->N_sisters" name="N_sisters" required min='0'/>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="form-group col-md-3">
        <x-form.label>اسم ولي الأمر</x-form.label>
        <div class="input-group mb-3">
            <x-form.input type="text" :value="$orphanRecord->guardian_name" name="guardian_name" required/>
        </div>
    </div>
    <div class="form-group col-md-3">
        <x-form.label>هوية ولي الأمر</x-form.label>
        <div class="input-group mb-3">
            <x-form.input type="text" :value="$orphanRecord->guardian_id" name="guardian_id" minlength="9" maxlength="9" required/>
        </div>
    </div>
    <div class="form-group col-md-3">
        <x-form.label>تاريخ ميلاد ولي الأمر</x-form.label>
        <div class="input-group">
            <x-form.input  :value="$orphanRecord->DGM_guardian" placeholder="MM/DD/YYYY" type="date" name="DGM_guardian" />
        </div>
    </div>
    <div class="form-group col-md-3">
        <x-form.label>علاقته باليتيم</x-form.label>
        <select class="form-control" name="guardian_RWO" required>
            <option label="أختر العلاقة" @selected($orphanRecord->guardian_RWO == null)>
            </option>
            @foreach ($guardian_RWOs as $guardian_RWO)
                <option value="{{ $guardian_RWO }}" @selected($orphanRecord->guardian_RWO == $guardian_RWO)>
                    {{ $guardian_RWO }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="row mt-3">
    <div class="form-group col-md-4">
        <x-form.label>المحافظة الأصلية (السابقة)</x-form.label>
        <select class="form-control" name="p_province" required>
            <option label="أختر المكان" @selected($orphanRecord->p_province == null)>
            </option>
            @foreach ($provinces as $province)
                <option value="{{ $province }}" @selected($orphanRecord->p_province == $province)>
                    {{ $province }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
        <x-form.label>المدينة الأصلية (السابقة)</x-form.label>
        <select class="form-control" name="p_city" required>
            <option label="أختر المكان" @selected($orphanRecord->p_city == null)>
            </option>
            @foreach ($cities as $city)
                <option value="{{ $city }}" @selected($orphanRecord->p_city == $city)>
                    {{ $city }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
        <x-form.label>العنوان السابق لليتيم بالتفصيل</x-form.label>
        <div class="col-lg">
            <textarea class="form-control" name="p_address" placeholder="أدخل العنوان السابق بالتفصيل" rows="3" required>{{$orphanRecord->p_address}}</textarea>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="form-group col-md-4">
        <x-form.label>المحافظة الحالية (مكان النزوح)</x-form.label>
        <select class="form-control fields_address_displaced" disabled name="c_province" >
            <option label="أختر المكان" @selected($orphanRecord->c_province == null)>
            </option>
            @foreach ($provinces as $province)
                <option value="{{ $province }}" @selected($orphanRecord->c_province == $province)>
                    {{ $province }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
        <x-form.label>المدينة الحالية (مكان النزوح)</x-form.label>
        <select class="form-control fields_address_displaced" disabled name="c_city" >
            <option label="أختر المكان" @selected($orphanRecord->c_city == null)>
            </option>
            @foreach ($cities as $city)
                <option value="{{ $city }}" @selected($orphanRecord->c_city == $city)>
                    {{ $city }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
        <x-form.label>العنوان الحالي لليتيم بالتفصيل</x-form.label>
        <div class="col-lg">
            <textarea class="form-control fields_address_displaced" disabled name="c_address" placeholder="أدخل العنوان الحالي بالتفصيل" rows="3">{{$orphanRecord->c_address}}</textarea>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="form-group col-md-3">
        <x-form.label>هل اليتيم نازح؟</x-form.label>
        <select class="form-control"  id="orphan_displaced" name="orphan_displaced" required>
            <option label="أختر الحالة" @selected($orphanRecord->orphan_displaced == null)>
            </option>
            @foreach ($orphan_displaced as $orphan_displaced)
                <option value="{{ $orphan_displaced }}" @selected($orphanRecord->orphan_displaced == $orphan_displaced)>
                    {{ $orphan_displaced }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-3">
        <x-form.label>استفاد كسوة</x-form.label>
        <select class="form-control" name="livery">
            <option label="أختر" @selected($orphanRecord->livery == null)>
            </option>
            @foreach ($livery as $livery)
                <option value="{{ $livery }}" @selected($orphanRecord->livery == $livery)>
                    {{ $livery }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-3">
        <x-form.label>استفاد كفالة</x-form.label>
        <select class="form-control" name="financial_aid">
            <option label="أختر" @selected($orphanRecord->financial_aid == null)>
            </option>
            @foreach ($financial_aid as $financial_aid)
                <option value="{{ $financial_aid }}" @selected($orphanRecord->financial_aid == $financial_aid)>
                    {{ $financial_aid }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-3">
        <x-form.label>وضع المنزل</x-form.label>
        <select class="form-control" name="CH_house" required>
            <option label="أختر الحالة" @selected($orphanRecord->CH_house == null)>
            </option>
            @foreach ($CH_house as $CH_house)
                <option value="{{ $CH_house }}" @selected($orphanRecord->CH_house == $CH_house)>
                    {{ $CH_house }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="row mt-3">
    <div class="form-group col-md-3">
        <x-form.label>رقم الجوال 1</x-form.label>
        <div class="input-group mb-3">
            <x-form.input type="text" :value="$orphanRecord->mobile_number1" name="mobile_number1" minlength="10" maxlength="10" required/>
        </div>
    </div>
    <div class="form-group col-md-3">
        <x-form.label>رقم الجوال 2</x-form.label>
        <div class="input-group mb-3">
            <x-form.input type="text" :value="$orphanRecord->mobile_number2" name="mobile_number2" minlength="10" maxlength="10" />
        </div>
    </div>
    <div class="form-group col-md-3">
        <x-form.label>رقم الواتس</x-form.label>
        <div class="input-group mb-3">
            <x-form.input type="text" :value="$orphanRecord->WhatsApp_number" name="WhatsApp_number" minlength="10" maxlength="13" />
        </div>
    </div>
    @if (isset($editData))
    <div class="form-group col-md-3">
        <x-form.label>مدخل البيانات</x-form.label>
        <div class="input-group mb-3">
            <x-form.input type="text" :value="$orphanRecord->data_portal_name" name="data_portal_name" disabled  />
        </div>
    </div>
    <div class="form-group col-md-3">
        <x-form.label>تاريخ الإضافة</x-form.label>
        <div class="input-group mb-3">
            <x-form.input type="date-local" value="{{App\Helpers\FormatDate::formatDate($orphanRecord->created_at)}}" name="created_at" disabled  />
        </div>
    </div>
    @endif
</div>

        <div class="d-flex justify-content-end">
            <x-form.button class="btn btn-success mb-2" type='submit'>
                {{ $button_label ?? 'أضف' }}
            </x-form.button>
        </div>
    </form>
    <!--File Browser-->
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    استيراد ملف إكسيل
                </div>
                <p class="mg-b-20">يرجى إختيار الملف أولا ثم رفع الملف</p>
                <form action="{{ route('orphans_records-import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row row-sm">
                        <div class="col-sm-7 col-md-6 col-lg-4">
                            @csrf
                            <x-form.input type="file" name="file" id="file_excel" />
                            <br>
                            <x-form.button type="submit" class="btn btn-success mb-3">
                                إستيراد ملف الاكسيل
                            </x-form.button>
                        </div>
                    </div>
                    <a class="nav-link" href="{{ asset('files/style_file_orphans_records.xlsx') }}" download>تحميل ملف
                        التعبئة</a>
                </form>
            </div>
        </div>
    </div>
@endsection
{{-- css --}}
@push('styles')
    {{-- css --}}
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{ URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css') }}"
        rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/pickerjs/picker.min.css') }}" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!-- Internal Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet">
@endpush
{{-- js --}}
@push('scripts')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{ URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{ URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
    <!-- Ionicons js -->
    <script src="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
    <!--Internal  pickerjs js -->
    <script src="{{ URL::asset('assets/plugins/pickerjs/picker.min.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script>
        const csrf_token = "{{ csrf_token() }}";
    </script>
    <script src="{{ URL::asset('js/ajaxCode.js') }}"></script>
@endpush
