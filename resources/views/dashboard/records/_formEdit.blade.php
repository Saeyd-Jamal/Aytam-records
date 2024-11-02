<h3>بيانات اليتيم</h3>
<div class="row mt-3">
    <div class="form-group col-md-3">
        <label>الاسم</label>
        <div class="input-group mb-3">
            <x-form.input type="text" name="first_name" :value="$record->first_name" required />
        </div>
    </div>
    <div class="form-group col-md-3">
        <label>الأب</label>
        <div class="input-group mb-3">
            <x-form.input type="text" name="father_name" :value="$record->father_name" required />
        </div>
    </div>
    <div class="form-group col-md-3">
        <label>الجد</label>
        <div class="input-group mb-3">
            <x-form.input type="text" name="grandfather_name" :value="$record->grandfather_name" required />
        </div>
    </div>
    <div class="form-group col-md-3">
        <label>العائلة</label>
        <div class="input-group mb-3">
            <x-form.input type="text" name="family_name" :value="$record->family_name" required />
        </div>
    </div>
    <div class="form-group col-md-3">
        <label>رقم هوية اليتيم</label>
        <div class="input-group mb-3">
            <input type="text" name="orphan_id" id="{{$record->id}}" value="{{$record->orphan_id}}" class="form-control form-control-alternative orphan_id" minlength="9" maxlength="9" required="required">
        </div>
        <div class="invalid_feedback text-danger" id="orphan_id_box_{{$record->id}}"></div>
    </div>
    <div class="form-group col-md-3">
        <label>تاريخ الميلاد</label>
        <div class="input-group">
            <x-form.input class="form-control" min="{{ $date_of_birth }}" max="{{ $date_of_birth_to }}"
                :value="$record->date_of_birth" placeholder="MM/DD/YYYY" type="date" name="date_of_birth" required />
        </div>
    </div>
    <div class="form-group col-md-3">
        <label>مكان الميلاد</label>
        <div class="input-group mb-3">
            <x-form.input type="text" :value="$record->address_of_birth" name="address_of_birth" required />
        </div>
    </div>
    <div class="form-group col-md-3">
        <label>الجنس</label>
        <select class="form-control" name="gender" required>
            <option value="ذكر" @selected($record->gender == 'ذكر')>
                ذكر
            </option>
            <option value="أنثى" @selected($record->gender == 'أنثى' or $record->gender == 'انثى')>
                أنثى
            </option>
        </select>
    </div>
    <div class="form-group col-md-3">
        <label>عدد الاخوة الذكور</label>
        <div class="input-group mb-3">
            <x-form.input type="number" :value="$record->N_brothers" name="N_brothers" required min='0' />
        </div>
    </div>
    <div class="form-group col-md-3">
        <label>عدد الاخوات الإناث</label>
        <div class="input-group mb-3">
            <x-form.input type="number" :value="$record->N_sisters" name="N_sisters" required min='0' />
        </div>
    </div>
    <div class="form-group col-md-3">
        <label>ملاحظات عامة حول اليتيم</label>
        <textarea class="form-control" name="notes_orphan" placeholder="يمكنك كتابة ملاحظات " rows="2">{{ $record->notes_orphan }}</textarea>
    </div>
    <div class="form-group col-md-3">
        <label>حالة اليتيم الصحية</label>
        <select class="form-control" name="status_health_orphan" required>
            <option label="أختر الحالة" @selected($record->status_health_orphan == 'null')>
            </option>
            @foreach ($status_health_orphan as $status_health_orphan)
                <option value="{{ $status_health_orphan }}" @selected($record->status_health_orphan == $status_health_orphan)>
                    {{ $status_health_orphan }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-3">
        <label>ملاحظات حول حالة اليتيم الصحية</label>
        <textarea class="form-control" name="health_status_notes" placeholder="يمكنك شرح الحالة بشكل مفصل" rows="2">{{ $record->health_status_notes }}</textarea>
    </div>
    <div class="form-group col-md-3">
        <label>هل يتيم الوالدين؟</label>
        <select class="form-control" id="child_orphaned_parents" name="child_orphaned_parents" required>
            <option label="أختر" @selected($record->child_orphaned_parents == null)>
            </option>
            @foreach ($child_orphaned_parents as $child_orphaned_parents)
                <option value="{{ $child_orphaned_parents }}" @selected($record->child_orphaned_parents == $child_orphaned_parents)>
                    {{ $child_orphaned_parents }}
                </option>
            @endforeach
        </select>
    </div>

</div>
<hr>
<h3>بيانات المتوفي</h3>
<div class="row mt-3">
    <div class="form-group col-md-3">
        <label>اسم المتوفى</label>
        <div class="input-group mb-3">
            <x-form.input type="text" :value="$record->first_deceased_name" name="first_deceased_name" required />
        </div>
    </div>
    <div class="form-group col-md-3">
        <label>اسم والد المتوفى</label>
        <div class="input-group mb-3">
            <x-form.input type="text" :value="$record->father_deceased_name" name="father_deceased_name" required />
        </div>
    </div>
    <div class="form-group col-md-3">
        <label>اسم جد المتوفى</label>
        <div class="input-group mb-3">
            <x-form.input type="text" :value="$record->grandfather_deceased_name" name="grandfather_deceased_name" required />
        </div>
    </div>
    <div class="form-group col-md-3">
        <label>اسم عائلة المتوفى</label>
        <div class="input-group mb-3">
            <x-form.input type="text" :value="$record->family_deceased_name" name="family_deceased_name" required />
        </div>
    </div>
    <div class="form-group col-md-3">
        <label>تاريخ الوفاة</label>
        <div class="input-group">
            <x-form.input :value="$record->date_of_death" placeholder="MM/DD/YYYY" type="date" name="date_of_death" required />
        </div>
    </div>
    <div class="form-group col-md-3">
        <label>سبب الوفاة</label>
        <select class="form-control" name="cause_of_death" required>
            <option label="أختر السبب" @selected($record->cause_of_death == null)>
            </option>
            @foreach ($causes_of_death as $cause_of_death)
                <option value="{{ $cause_of_death }}" @selected($record->cause_of_death == $cause_of_death)>
                    {{ $cause_of_death }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-3">
        <label>رقم هوية الاب</label>
        <div class="input-group mb-3">
            <x-form.input id="orphan_id" :value="$record->Id_father" type="text" name="Id_father" minlength="9"
                maxlength="9" />
        </div>
    </div>
    <div class="form-group col-md-3">
        <label>تاريخ ميلاد الأب</label>
        <div class="input-group">
            <x-form.input :value="$record->DFB_father" placeholder="MM/DD/YYYY" type="date" name="DFB_father" />
        </div>
    </div>
</div>
<hr>
<h3>بيانات الأم</h3>
<div class="row mt-3">
    <div class="form-group col-md-3">
        <label>اسم الأم</label>
        <div class="input-group mb-3">
            <x-form.input type="text" :value="$record->first_mother_name" name="first_mother_name" required />
        </div>
    </div>
    <div class="form-group col-md-3">
        <label>اسم والد الأم</label>
        <div class="input-group mb-3">
            <x-form.input type="text" :value="$record->father_mother_name" name="father_mother_name" required />
        </div>
    </div>
    <div class="form-group col-md-3">
        <label>اسم جد الأم</label>
        <div class="input-group mb-3">
            <x-form.input type="text" :value="$record->grandfather_mother_name" name="grandfather_mother_name" required />
        </div>
    </div>
    <div class="form-group col-md-3">
        <label>اسم عائلة الأم</label>
        <div class="input-group mb-3">
            <x-form.input type="text" :value="$record->family_mother_name" name="family_mother_name" required />
        </div>
    </div>
    <div class="form-group col-md-3">
        <label>رقم هوية الأم</label>
        <div class="input-group mb-3">
            <x-form.input id="Id_mother" :value="$record->Id_mother" type="text" name="Id_mother" minlength="9"
                maxlength="9" />
        </div>
    </div>
    <div class="form-group col-md-3">
        <label>الحالة الإجتماعية للأم</label>
        <div class="input-group mb-3">
            <x-form.input type="text" :value="$record->mother_social_situation" name="mother_social_situation"/>
        </div>
    </div>
    <div class="form-group col-md-3">
        <label>تاريخ ميلاد الأم</label>
        <div class="input-group">
            <x-form.input type="date" name="DMB_mother" :value="$record->DMB_mother" />
        </div>
    </div>
    <div class="form-group col-md-3">
        <label>تاريخ وفاة الام</label>
        <div class="input-group">
            <input type="date" name="DMD_mother" id="DMD_mother" value="{{$record->DMD_mother}}" class="form-control form-control-alternative form-control fields_mother"  @disabled($record->child_orphaned_parents == 'يتيم الأب' || $record->child_orphaned_parents == null)>
        </div>
    </div>
    <div class="form-group col-md-3">
        <label>سبب وفاة الام</label>
        <select class="form-control fields_mother" name="CMD_mother" @disabled($record->child_orphaned_parents == 'يتيم الأب' || $record->child_orphaned_parents == null)>
            <option label="أختر السبب" @selected($record->CMD_mother == null)>
            </option>
            @foreach ($causes_of_death as $cause_of_death)
                <option value="{{ $cause_of_death }}" @selected($record->CMD_mother == $cause_of_death)>
                    {{ $cause_of_death }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<hr>
<h3>بيانات ولي الأمر</h3>
<div class="row mt-3">
    <div class="form-group col-md-3">
        <label>اسم ولي الأمر</label>
        <div class="input-group mb-3">
            <x-form.input type="text" :value="$record->first_guardian_name" name="first_guardian_name" required />
        </div>
    </div>
    <div class="form-group col-md-3">
        <label>اسم والد ولي الأمر</label>
        <div class="input-group mb-3">
            <x-form.input type="text" :value="$record->father_guardian_name" name="father_guardian_name" required />
        </div>
    </div>
    <div class="form-group col-md-3">
        <label>اسم جد ولي الأمر</label>
        <div class="input-group mb-3">
            <x-form.input type="text" :value="$record->grandfather_guardian_name" name="grandfather_guardian_name" required />
        </div>
    </div>
    <div class="form-group col-md-3">
        <label>اسم عائلة ولي الأمر</label>
        <div class="input-group mb-3">
            <x-form.input type="text" :value="$record->family_guardian_name" name="family_guardian_name" required />
        </div>
    </div>
    <div class="form-group col-md-3">
        <label>هوية ولي الأمر</label>
        <div class="input-group mb-3">
            <x-form.input type="text" :value="$record->guardian_id" name="guardian_id" minlength="9" maxlength="9"
                required />
        </div>
    </div>
    <div class="form-group col-md-3">
        <label>المؤهل العملي ولي الأمر</label>
        <div class="input-group mb-3">
            <x-form.input type="text" :value="$record->guardian_scientific_qualification" name="guardian_scientific_qualification" />
        </div>
    </div>
    <div class="form-group col-md-3">
        <label>عمل ولي الأمر</label>
        <div class="input-group mb-3">
            <x-form.input type="text" :value="$record->guardian_work" name="guardian_work" />
        </div>
    </div>
    <div class="form-group col-md-3">
        <label>تاريخ ميلاد ولي الأمر</label>
        <div class="input-group">
            <x-form.input :value="$record->DGM_guardian" placeholder="MM/DD/YYYY" type="date" name="DGM_guardian" />
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
<div class="row mt-3">
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
            <textarea class="form-control" name="p_address" placeholder="أدخل العنوان السابق بالتفصيل" rows="3" required>{{ $record->p_address }}</textarea>
        </div>
    </div>
    <div class="form-group col-md-4">
        <label>المحافظة الحالية (مكان النزوح)</label>
        <select class="form-control fields_address_displaced" name="c_province" @disabled($record->orphan_displaced == 'لا')>
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
        <select class="form-control fields_address_displaced" name="c_city" @disabled($record->orphan_displaced == 'لا')>
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
            <textarea class="form-control fields_address_displaced" name="c_address" @disabled($record->orphan_displaced == 'لا')
                placeholder="أدخل العنوان الحالي بالتفصيل" rows="3">{{ $record->c_address }}</textarea>
        </div>
    </div>
</div>
<hr>
<h3>معلومات عامة عن اليتيم</h3>
<div class="row mt-3">
    <div class="form-group col-md-3">
        <label>هل اليتيم نازح؟</label>
        <select class="form-control" id="orphan_displaced" name="orphan_displaced" required>
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
            <x-form.input type="text" :value="$record->mobile_number1" name="mobile_number1" minlength="10" maxlength="10"
                required />
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
            <option label="أختر" @selected($record->financial_aid == null)></option>
            <option value="نعم" @selected($record->financial_aid == 'نعم')>نعم</option>
            <option value="لا" @selected($record->financial_aid == 'لا')>لا</option>
        </select>
    </div>
</div>
<hr>
<h3>الإدخال</h3>
<div class="row mt-3">
    @if (isset($editData))
        <div class="form-group col-md-3">
            <label>مدخل البيانات</label>
            <div class="input-group mb-3">
                <x-form.input type="text" :value="$record->data_portal_name" name="data_portal_name" disabled />
            </div>
        </div>
        <div class="form-group col-md-3">
            <label>الفرع</label>
            <div class="input-group mb-3">
                <x-form.input type="text" :value="$record->section" name="section" disabled />
            </div>
        </div>
        <div class="form-group col-md-3">
            <label>تاريخ الإضافة</label>
            <div class="input-group mb-3">
                <x-form.input type="date-local" value="{{ App\Helpers\FormatDate::formatDate($record->created_at) }}"
                    name="created_at" disabled />
            </div>
        </div>
    @endif
</div>
