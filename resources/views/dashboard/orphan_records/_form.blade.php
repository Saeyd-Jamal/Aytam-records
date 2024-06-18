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
            @if(!in_array($orphanRecord->status_health_orphan,$status_health_orphan))
                <option selected>{{$orphanRecord->status_health_orphan}}</option>
            @endif
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
            @if(!in_array($orphanRecord->child_orphaned_parents,$child_orphaned_parents))
                <option selected>{{$orphanRecord->child_orphaned_parents}}</option>
            @endif
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
            @if(!in_array($orphanRecord->causes_of_death,$causes_of_death))
                <option selected>{{$orphanRecord->causes_of_death}}</option>
            @endif
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
            @if(!in_array($orphanRecord->CMD_mother,$causes_of_death))
                <option selected>{{$orphanRecord->CMD_mother}}</option>
            @endif
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
            @if(!in_array($orphanRecord->guardian_RWO,$guardian_RWOs))
                <option selected>{{$orphanRecord->guardian_RWO}}</option>
            @endif
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
            @if(!in_array($orphanRecord->p_province,$provinces))
                <option selected>{{$orphanRecord->p_province}}</option>
            @endif
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
            @if(!in_array($orphanRecord->p_city,$cities))
                <option selected>{{$orphanRecord->p_city}}</option>
            @endif
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
            @if(!in_array($orphanRecord->c_province,$provinces))
                <option selected>{{$orphanRecord->c_province}}</option>
            @endif
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
            @if(!in_array($orphanRecord->c_city,$cities))
                <option selected>{{$orphanRecord->c_city}}</option>
            @endif
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
            @if(!in_array($orphanRecord->orphan_displaced,$orphan_displaced))
                <option>{{$orphanRecord->orphan_displaced}}</option>
            @endif
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
            @if(!in_array($orphanRecord->livery,$livery))
                <option selected>{{$orphanRecord->livery}}</option>
            @endif
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
            @if(!in_array($orphanRecord->financial_aid,$financial_aid))
                <option selected>{{$orphanRecord->financial_aid}}</option>
            @endif
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
            @if(!in_array($orphanRecord->CH_house,$CH_house))
                <option @selected($orphanRecord->CH_house == $CH_house)>{{$orphanRecord->CH_house}}</option>
            @endif
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
