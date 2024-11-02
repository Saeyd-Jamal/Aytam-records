<h1>البيانات المشتركة للأيتام</h1>
<div class="container-fluid">
    <hr>
    <h3>بيانات الأب (المتوفي)</h3>
    <div class="row">
        <div class="form-group col-md-3">
            <label>اسم المتوفى</label>
            <div class="input-group mb-3">
                <x-form.input type="text" :value="$record->first_deceased_name" name="first_deceased_name" required/>
            </div>
        </div>
        <div class="form-group col-md-3">
            <label>اسم والد المتوفى</label>
            <div class="input-group mb-3">
                <x-form.input type="text" :value="$record->father_deceased_name" name="father_deceased_name" required/>
            </div>
        </div>
        <div class="form-group col-md-3">
            <label>اسم جد المتوفى</label>
            <div class="input-group mb-3">
                <x-form.input type="text" :value="$record->grandfather_deceased_name" name="grandfather_deceased_name" required/>
            </div>
        </div>
        <div class="form-group col-md-3">
            <label>اسم العائلة المتوفى</label>
            <div class="input-group mb-3">
                <x-form.input type="text" :value="$record->family_deceased_name" name="family_deceased_name" required/>
            </div>
        </div>
        <div class="form-group col-md-3">
            <label>رقم هوية الاب</label>
            <div class="input-group mb-3">
                <x-form.input id="orphan_id" :value="$record->Id_father" type="text" name="Id_father" minlength="9" maxlength="9"/>
            </div>
        </div>
        <div class="form-group col-md-3">
            <label>تاريخ ميلاد الأب</label>
            <div class="input-group">
                <x-form.input :value="$record->DFB_father" placeholder="MM/DD/YYYY" type="date" name="DFB_father" />
            </div>
        </div>

        <div class="form-group col-md-3">
            <label>تاريخ الوفاة</label>
            <div class="input-group">
                <x-form.input :value="$record->date_of_death" placeholder="MM/DD/YYYY" type="date" name="date_of_death" required/>
            </div>
        </div>
        <div class="form-group col-md-3">
            <label>سبب الوفاة</label>
            <select class="form-control" name="cause_of_death" required>
                <option label="أختر السبب" @selected($record->cause_of_death == null)>
                </option>
                @foreach ($causes_of_death as $cause_of_death)
                    <option value="{{ $cause_of_death }}" @selected($record->cause_of_death == $cause_of_death)>
                        {{ $cause_of_death}}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <hr>
    <h3>بيانات ولي الأمر</h3>
    <div class="row">
        <div class="form-group col-md-3">
            <label>اسم ولي الأمر</label>
            <div class="input-group mb-3">
                <x-form.input type="text" :value="$record->first_guardian_name" name="first_guardian_name" required/>
            </div>
        </div>
        <div class="form-group col-md-3">
            <label>اسم والد ولي الأمر</label>
            <div class="input-group mb-3">
                <x-form.input type="text" :value="$record->father_guardian_name" name="father_guardian_name" required/>
            </div>
        </div>
        <div class="form-group col-md-3">
            <label>اسم جد ولي الأمر</label>
            <div class="input-group mb-3">
                <x-form.input type="text" :value="$record->grandfather_guardian_name" name="grandfather_guardian_name" required/>
            </div>
        </div>
        <div class="form-group col-md-3">
            <label>اسم عائلة ولي الأمر</label>
            <div class="input-group mb-3">
                <x-form.input type="text" :value="$record->family_guardian_name" name="family_guardian_name" required/>
            </div>
        </div>
        <div class="form-group col-md-3">
            <label>هوية ولي الأمر</label>
            <div class="input-group mb-3">
                <x-form.input type="text" :value="$record->guardian_id" name="guardian_id" minlength="9" maxlength="9" required/>
            </div>
        </div>
        <div class="form-group col-md-3">
            <label>المؤهل العملي ولي الأمر</label>
            <div class="input-group mb-3">
                <x-form.input type="text" :value="$record->guardian_scientific_qualification" name="guardian_scientific_qualification"/>
            </div>
        </div>
        <div class="form-group col-md-3">
            <label>عمل ولي الأمر</label>
            <div class="input-group mb-3">
                <x-form.input type="text" :value="$record->guardian_work" name="guardian_work"/>
            </div>
        </div>
        <div class="form-group col-md-3">
            <label>تاريخ ميلاد ولي الأمر</label>
            <div class="input-group">
                <x-form.input  :value="$record->DGM_guardian" placeholder="MM/DD/YYYY" type="date" name="DGM_guardian" />
            </div>
        </div>
        <div class="form-group col-md-3">
            <label>علاقته باليتيم</label>
            <select class="form-control" name="guardian_RWO" required>
                <option label="أختر العلاقة" @selected($record->guardian_RWO == null)>
                </option>
                @foreach ($guardian_RWOs as $guardian_RWO)
                    <option value="{{ $guardian_RWO }}" @selected($record->guardian_RWO == $guardian_RWO)>
                        {{ $guardian_RWO }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <hr>
    <h3>بيانات السكن</h3>
    <div class="row">
        <div class="form-group col-md-4">
            <label>المحافظة الأصلية (السابقة)</label>
            <select class="form-control" name="p_province" required>
                <option label="أختر المكان" @selected($record->p_province == null)>
                </option>
                @foreach ($provinces as $province)
                    <option value="{{ $province }}" @selected($record->p_province == $province)>
                        {{ $province }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>المدينة الأصلية (السابقة)</label>
            <select class="form-control" name="p_city" required>
                <option label="أختر المكان" @selected($record->p_city == null)>
                </option>
                @foreach ($cities as $city)
                    <option value="{{ $city }}" @selected($record->p_city == $city)>
                        {{ $city }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>العنوان السابق لليتيم بالتفصيل</label>
            <div class="col-lg">
                <textarea class="form-control" name="p_address" placeholder="أدخل العنوان السابق بالتفصيل" rows="3" required>{{$record->p_address}}</textarea>
            </div>
        </div>
        <div class="form-group col-md-4">
            <label>المحافظة الحالية (مكان النزوح)</label>
            <select class="form-control fields_address_displaced" disabled name="c_province" >
                <option label="أختر المكان" @selected($record->c_province == null)>
                </option>
                @foreach ($provinces as $province)
                    <option value="{{ $province }}" @selected($record->c_province == $province)>
                        {{ $province }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>المدينة الحالية (مكان النزوح)</label>
            <select class="form-control fields_address_displaced" disabled name="c_city" >
                <option label="أختر المكان" @selected($record->c_city == null)>
                </option>
                @foreach ($cities as $city)
                    <option value="{{ $city }}" @selected($record->c_city == $city)>
                        {{ $city }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>العنوان الحالي لليتيم بالتفصيل</label>
            <div class="col-lg">
                <textarea class="form-control fields_address_displaced" disabled name="c_address" placeholder="أدخل العنوان الحالي بالتفصيل" rows="3">{{$record->c_address}}</textarea>
            </div>
        </div>
    </div>
    <hr>
    <h3>بيانات عامة</h3>
    <div class="row">
        <div class="form-group col-md-3">
            <label>هل اليتيم نازح؟</label>
            <select class="form-control"  id="orphan_displaced" name="orphan_displaced" required>
                <option label="أختر الحالة" @selected($record->orphan_displaced == null)>
                </option>
                @foreach ($orphan_displaced as $orphan_displaced)
                    <option value="{{ $orphan_displaced }}" @selected($record->orphan_displaced == $orphan_displaced)>
                        {{ $orphan_displaced }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-3">
            <label>استفاد كسوة</label>
            <select class="form-control" name="livery">
                <option label="أختر" @selected($record->livery == null)></option>
                <option value="نعم" @selected($record->livery == 'نعم')>نعم</option>
                <option value="لا" @selected($record->livery == 'لا')>لا</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label>استفاد كفالة</label>
            <select class="form-control" name="financial_aid">
                <option label="أختر" @selected($record->financial_aid == null)>
                </option>
                <option value="نعم" @selected($record->financial_aid == 'نعم')>نعم</option>
                <option value="لا" @selected($record->financial_aid == 'لا')>لا</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label>وضع المنزل</label>
            <select class="form-control" name="CH_house" required>
                <option label="أختر الحالة" @selected($record->CH_house == null)>
                </option>
                @foreach ($CH_house as $CH_house)
                    <option value="{{ $CH_house }}" @selected($record->CH_house == $CH_house)>
                        {{ $CH_house }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-3">
            <label>رقم الجوال 1</label>
            <div class="input-group mb-3">
                <x-form.input type="text" :value="$record->mobile_number1" name="mobile_number1" minlength="10" maxlength="10" required/>
            </div>
        </div>
        <div class="form-group col-md-3">
            <label>رقم الجوال 2</label>
            <div class="input-group mb-3">
                <x-form.input type="text" :value="$record->mobile_number2" name="mobile_number2" minlength="10" maxlength="10" />
            </div>
        </div>
        <div class="form-group col-md-3">
            <label>رقم الواتس</label>
            <div class="input-group mb-3">
                <x-form.input type="text" :value="$record->WhatsApp_number" name="WhatsApp_number" minlength="10" maxlength="13" />
            </div>
        </div>
    </div>
    <hr>

</div>
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/records.css') }}">
@endpush


@if (isset($editData))
    <div class="form-group col-md-3">
        <label>مدخل البيانات</label>
        <div class="input-group mb-3">
            <x-form.input type="text" :value="$record->data_portal_name" name="data_portal_name" disabled  />
        </div>
    </div>
    <div class="form-group col-md-3">
        <label>تاريخ الإضافة</label>
        <div class="input-group mb-3">
            <x-form.input type="date-local" value="{{App\Helpers\FormatDate::formatDate($record->created_at)}}" name="created_at" disabled  />
        </div>
    </div>
@endif
<div class="d-flex justify-content-end">
    <button class="btn btn-success mb-2" type='submit'>
        {{ $btn_label ?? 'أضف' }}
    </button>
</div>

<hr>
{{-- بيانات اليتيم --}}
<h3>جدول الأيتام</h3>
<livewire:TableAddAytam  />
