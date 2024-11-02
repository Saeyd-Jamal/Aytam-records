<div class="container-fluid">
    @push('extra-navbar-items')
    <div class="row mx-3 align-items-center">
        <button type="button" class="btn btn-warning mr-2"data-toggle="modal" data-target="#filter">
            <i class="fe fe-filter"></i>
        </button>
        @can('create', 'App\\Models\Record')
        <a href="{{route('records.create')}}" class="btn btn-primary mr-2">
            <i class="fe fe-plus fe-12"></i>
        </a>
        @endcan
    </div>
    @endpush
    <div class="row">
        <table id="editable-table" class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <th>#</th>
                    <th class="sticky" colspan="4">الاسم</th>
                    <th>الجنس</th>
                    <th>رقم الهوية</th>
                    <th>تاريخ الميلاد</th>
                    <th>عمر اليتيم</th>
                    <th>مكان الميلاد</th>
                    <th>الحالة الصحية</th>
                    <th>ملاحظات حول الحالة الصحية</th>
                    <th>هل اليتيم فاقد الوالدين</th>
                    <th>عدد الأخوة</th>
                    <th>عدد الأخوات</th>
                    <th>ملاحظات عن اليتيم</th>

                    <th colspan="4">اسم المتوفي</th>
                    <th>رقم هوية الأب</th>
                    <th>تاريخ ميلاد الاب</th>
                    <th>تاريخ الوفاء</th>
                    <th>سبب الوفاء</th>

                    <th colspan="4">اسم الأم</th>
                    <th>رقم هوية الأم</th>
                    <th>تاريخ ميلاد الأم</th>
                    <th>تاريخ وفاء الأم</th>
                    <th>سبب وفاة الام</th>
                    <th>الحالة الإجتماعية للأم</th>

                    <th colspan="4">اسم ولي الامر</th>
                    <th>صلة القرابة</th>
                    <th>رقم هوية ولي الامر</th>
                    <th>تاريخ ميلاد ولي الامر</th>
                    <th>المؤهل العلمي للولي الامر</th>
                    <th>عمل ولي الامر</th>
                    <th>رقم الجوال 1</th>
                    <th>رقم الجوال 2</th>
                    <th>رقم الواتس</th>

                    <th>وضع المنزل</th>
                    <th>المحافظة الأصلية</th>
                    <th>المدينة الأصلية</th>
                    <th>العنوان الأصلي</th>
                    <th>المحافظة الحالية</th>
                    <th>المدينة الحالية</th>
                    <th>العنوان الحالي</th>
                    <th>هل اليتيم نازح؟</th>

                    <th>كسوة؟</th>
                    <th>كفالة؟</th>
                    <th>مدخل البيانات</th>
                    <th>الفرع</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $record)
                    <tr>
                        <td>
                            @can('update', 'App\\Models\Record')
                            <a href="{{route('records.edit', $record->id)}}">
                                <i class="fe fe-edit"></i>
                            </a>
                            @endcan
                        </td>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td class="sticky" style="right: 0;">
                            <input type="text" name="first_name" value="{{$record->first_name}}" class="form-control name" title="الاسم" wire:input="update({{$record->id}},'first_name', $event.target.value)">
                        </td>
                        <td class="sticky" style="right: 88px;">
                            <input type="text" name="father_name" value="{{$record->father_name}}" class="form-control name" title="الأب" wire:input="update({{$record->id}},'father_name', $event.target.value)">
                        </td>
                        <td class="sticky" style="right: 176px;">
                            <input type="text" name="grandfather_name" value="{{$record->grandfather_name}}" class="form-control name" title="الجد" wire:input="update({{$record->id}},'grandfather_name', $event.target.value)">
                        </td>
                        <td class="sticky" style="right: 264px;">
                            <input type="text" name="family_name" value="{{$record->family_name}}" class="form-control name" title="العائلة" wire:input="update({{$record->id}},'family_name', $event.target.value)">
                        </td>
                        <td>
                            <select class="form-control" name="gender" wire:input="update({{$record->id}},'gender', $event.target.value)" title="الجنس" >
                                <option value="ذكر" @selected($record->gender == 'ذكر')>
                                    ذكر
                                </option>
                                <option value="أنثى" @selected($record->gender == 'أنثى' or $record->gender == 'انثى')>
                                    أنثى
                                </option>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="orphan_id" value="{{$record->orphan_id}}" class="form-control" title="رقم الهوية" wire:input="update({{$record->id}},'orphan_id', $event.target.value)" minlength="9" maxlength="9" >
                        </td>
                        <td>
                            <input type="date" name="date_of_birth" value="{{$record->date_of_birth}}" class="form-control" title="تاريخ الميلاد" wire:input="update({{$record->id}},'date_of_birth', $event.target.value)" min="{{ $date_of_birth }}" max="{{ $date_of_birth_to }}">
                        </td>
                        <td>
                            <input type="text" name="age" value="{{$record->age}}" class="form-control name" title="عمر اليتيم"  readonly>
                        </td>
                        <td>
                            <input type="text" name="address_of_birth" value="{{$record->address_of_birth}}" class="form-control" title="عنوان الميلاد" wire:input="update({{$record->id}},'address_of_birth', $event.target.value)">
                        </td>
                        <td>
                            <select class="form-control" name="status_health_orphan" title="الحالة الصحية" wire:input="update({{$record->id}},'status_health_orphan', $event.target.value)">
                                <option label="أختر الحالة" @selected($record->status_health_orphan == 'null')>
                                </option>
                                @foreach ($status_health_orphan_array as $status_health_orphan)
                                    <option value="{{ $status_health_orphan }}" @selected($record->status_health_orphan == $status_health_orphan)>
                                        {{ $status_health_orphan }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <textarea class="form-control" name="health_status_notes" placeholder="يمكنك شرح الحالة بشكل مفصل" rows="1"  title="ملاحظات الحالة الصحية" wire:input="update({{$record->id}},'health_status_notes', $event.target.value)">{{ $record->health_status_notes }}</textarea>
                        </td>
                        <td>
                            <select class="form-control" id="child_orphaned_parents" name="child_orphaned_parents" title="الطفل يتيم الأبوين؟" wire:input="update({{$record->id}},'child_orphaned_parents', $event.target.value)">
                                <option label="أختر" @selected($record->child_orphaned_parents == null)>
                                </option>
                                @foreach ($child_orphaned_parents_array as $child_orphaned_parents)
                                    <option value="{{ $child_orphaned_parents }}" @selected($record->child_orphaned_parents == $child_orphaned_parents)>
                                        {{ $child_orphaned_parents }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="number" name="N_brothers" value="{{$record->N_brothers}}" class="form-control name" title="عدد الاخوات" wire:input="update({{$record->id}},'N_brothers', $event.target.value)" min='0'>

                        </td>
                        <td>
                            <input type="number" name="N_sisters" value="{{$record->N_sisters}}" class="form-control name" title="عدد الاخوات" wire:input="update({{$record->id}},'N_sisters', $event.target.value)" min='0'>
                        </td>
                        <td>
                            <textarea class="form-control" name="notes_orphan" placeholder="يمكنك كتابة ملاحظات " rows="1" wire:input="update({{$record->id}},'notes_orphan', $event.target.value)">{{ $record->notes_orphan }}</textarea>
                        </td>

                        <td>
                            <input type="text" name="first_deceased_name" value="{{$record->first_deceased_name}}" class="form-control name" title="اسم المتوفى" wire:input="update({{$record->id}},'first_deceased_name', $event.target.value)">
                        </td>
                        <td>
                            <input type="text" name="father_deceased_name" value="{{$record->father_deceased_name}}" class="form-control name" title="اسم أبو المتوفى" wire:input="update({{$record->id}},'father_deceased_name', $event.target.value)">
                        </td>
                        <td>
                            <input type="text" name="grandfather_deceased_name" value="{{$record->grandfather_deceased_name}}" class="form-control name" title="اسم جد المتوفى" wire:input="update({{$record->id}},'grandfather_deceased_name', $event.target.value)">
                        </td>
                        <td>
                            <input type="text" name="family_deceased_name" value="{{$record->family_deceased_name}}" class="form-control name" title="اسم عائلة المتوفى" wire:input="update({{$record->id}},'family_deceased_name', $event.target.value)">
                        </td>
                        <td>
                            <input type="text" name="Id_father" value="{{$record->Id_father}}" class="form-control" title="رقم الهوية الاب" wire:input="update({{$record->id}},'Id_father', $event.target.value)" minlength="9"
                            maxlength="9">
                        </td>
                        <td>
                            <input type="date" name="DFB_father" value="{{$record->DFB_father}}" class="form-control" title="تاريخ الميلاد الاب" wire:input="update({{$record->id}},'DFB_father', $event.target.value)">
                        </td>
                        <td>
                            <input type="date" name="date_of_death" value="{{$record->date_of_death}}" class="form-control" title="تاريخ وفاء المتوفى" wire:input="update({{$record->id}},'date_of_death', $event.target.value)">
                        </td>
                        <td>
                            <select class="form-control" name="cause_of_death" title="سبب وفاء المتوفى" wire:input="update({{$record->id}},'cause_of_death', $event.target.value)">
                                <option label="أختر السبب" @selected($record->cause_of_death == null)>
                                </option>
                                @foreach ($causes_of_death_array as $cause_of_death)
                                    <option value="{{ $cause_of_death }}" @selected($record->cause_of_death == $cause_of_death)>
                                        {{ $cause_of_death }}
                                    </option>
                                @endforeach
                            </select>
                        </td>

                        <td>
                            <input type="text" name="first_mother_name" value="{{$record->first_mother_name}}" class="form-control name" title="اسم الام" wire:input="update({{$record->id}},'first_mother_name', $event.target.value)">
                        </td>
                        <td>
                            <input type="text" name="father_mother_name" value="{{$record->father_mother_name}}" class="form-control name" title="اسم الام" wire:input="update({{$record->id}},'father_mother_name', $event.target.value)">
                        </td>
                        <td>
                            <input type="text" name="grandfather_mother_name" value="{{$record->grandfather_mother_name}}" class="form-control name" title="اسم الام" wire:input="update({{$record->id}},'grandfather_mother_name', $event.target.value)">
                        </td>
                        <td>
                            <input type="text" name="family_mother_name" value="{{$record->family_mother_name}}" class="form-control name" title="اسم الام" wire:input="update({{$record->id}},'family_mother_name', $event.target.value)">
                        </td>
                        <td>
                            <input type="text" name="Id_mother" value="{{$record->Id_mother}}" class="form-control" title="رقم الهوية الام" wire:input="update({{$record->id}},'Id_mother', $event.target.value)">
                        </td>
                        <td>
                            <input type="date" name="DMB_mother" value="{{$record->DMB_mother}}" class="form-control" title="تاريخ الميلاد الام" wire:input="update({{$record->id}},'DMB_mother', $event.target.value)">
                        </td>
                        <td>
                            <input type="date" name="DMD_mother" value="{{$record->DMD_mother}}" class="form-control" title="تاريخ وفاء الام" wire:input="update({{$record->id}},'DMD_mother', $event.target.value)"  @disabled($record->child_orphaned_parents == 'يتيم الأب' || $record->child_orphaned_parents == null)>
                        </td>
                        <td>
                            <select class="form-control fields_mother" name="CMD_mother" @disabled($record->child_orphaned_parents == 'يتيم الأب' || $record->child_orphaned_parents == null) title="سبب وفاء الام" wire:input="update('CMD_mother', $event.target.value)">
                                <option label="أختر السبب" @selected($record->CMD_mother == null)>
                                </option>
                                @foreach ($causes_of_death_array as $cause_of_death)
                                    <option value="{{ $cause_of_death }}" @selected($record->CMD_mother == $cause_of_death)>
                                        {{ $cause_of_death }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="text" name="mother_social_situation" value="{{$record->mother_social_situation}}" class="form-control" title="الحالة الاجتماعية" wire:input="update({{$record->id}},'mother_social_situation', $event.target.value)">
                        </td>


                        <td>
                            <input type="text" name="first_guardian_name" value="{{$record->first_guardian_name}}" class="form-control name" title="اسم ولي الأمر" wire:input="update({{$record->id}},'first_guardian_name', $event.target.value)">
                        </td>
                        <td>
                            <input type="text" name="father_guardian_name" value="{{$record->father_guardian_name}}" class="form-control name" title="اسم ولي الأمر" wire:input="update({{$record->id}},'father_guardian_name', $event.target.value)">
                        </td>
                        <td>
                            <input type="text" name="grandfather_guardian_name" value="{{$record->grandfather_guardian_name}}" class="form-control name" title="اسم ولي الأمر" wire:input="update({{$record->id}},'grandfather_guardian_name', $event.target.value)">
                        </td>
                        <td>
                            <input type="text" name="family_guardian_name" value="{{$record->family_guardian_name}}" class="form-control name" title="اسم عائلة ولي الأمر" wire:input="update({{$record->id}},'family_guardian_name', $event.target.value)">
                        </td>
                        <td>
                            <select class="form-control" name="guardian_RWO" title="العلاقة" wire:input="update({{$record->id}},'guardian_RWO', $event.target.value)">
                                <option label="أختر العلاقة" @selected($record->guardian_RWO == null)>
                                </option>
                                @foreach ($guardian_RWOs_array as $guardian_RWO)
                                    <option value="{{ $guardian_RWO }}" @selected($record->guardian_RWO == $guardian_RWO)>
                                        {{ $guardian_RWO }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="text" name="guardian_id" value="{{$record->guardian_id}}" class="form-control" title="رقم الهوية ولي الأمر" wire:input="update({{$record->id}},'guardian_id', $event.target.value)" minlength="9" maxlength="9">
                        </td>
                        <td>
                            <input type="date" name="DGM_guardian" value="{{$record->DGM_guardian}}" class="form-control" title="تاريخ الميلاد ولي الأمر" wire:input="update({{$record->id}},'DGM_guardian', $event.target.value)">
                        </td>
                        <td>
                            <input type="text" name="guardian_scientific_qualification" value="{{$record->guardian_scientific_qualification}}" class="form-control" title="المؤهلة العلمي لولي الأمر" wire:input="update({{$record->id}},'guardian_scientific_qualification', $event.target.value)">
                        </td>
                        <td>
                            <input type="text" name="guardian_work" value="{{$record->guardian_work}}" class="form-control" title="عمل ولي الأمر" wire:input="update({{$record->id}},'guardian_work', $event.target.value)">
                        </td>
                        <td>
                            <input type="text" name="mobile_number1" value="{{$record->mobile_number1}}" class="form-control" title="رقم الجوال" wire:input="update({{$record->id}},'mobile_number1', $event.target.value)">
                        </td>
                        <td>
                            <input type="text" name="mobile_number2" value="{{$record->mobile_number2}}" class="form-control" title="رقم الجوال" wire:input="update({{$record->id}},'mobile_number2', $event.target.value)">
                        </td>
                        <td>
                            <input type="text" name="WhatsApp_number" value="{{$record->WhatsApp_number}}" class="form-control" title="رقم الواتساب" wire:input="update({{$record->id}},'WhatsApp_number', $event.target.value)">
                        </td>

                        
                        <td>
                            <select class="form-control" name="CH_house" title="وضع المنزل" wire:input="update({{$record->id}},'CH_house', $event.target.value)">
                                <option label="أختر الحالة" @selected($record->CH_house == null)>
                                </option>
                                @foreach ($CH_house_array as $CH_house)
                                    <option value="{{ $CH_house }}" @selected($record->CH_house == $CH_house)>
                                        {{ $CH_house }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="p_province" title="المحافظة السابقة" wire:input="update({{$record->id}},'p_province', $event.target.value)">
                                <option label="أختر المكان" @selected($record->p_province == null)>
                                </option>
                                @foreach ($provinces_array as $province)
                                    <option value="{{ $province }}" @selected($record->p_province == $province)>
                                        {{ $province }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="p_city" title="المدينة السابقة" wire:input="update({{$record->id}},'p_city', $event.target.value)">
                                <option label="أختر المكان" @selected($record->p_city == null)>
                                </option>
                                @foreach ($cities_array as $city)
                                    <option value="{{ $city }}" @selected($record->p_city == $city)>
                                        {{ $city }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <textarea class="form-control" name="p_address" placeholder="أدخل العنوان السابق بالتفصيل" rows="1" title="العنوان السابق" wire:input="update({{$record->id}},'p_address', $event.target.value)">{{ $record->p_address }}</textarea>
                        </td>
                        <td>
                            <select class="form-control fields_address_displaced" name="c_province" title="المحافظة الحالية" wire:input="update({{$record->id}},'c_province', $event.target.value)" @disabled($record->orphan_displaced == 'لا')>
                                <option label="أختر المكان" @selected($record->c_province == null)>
                                </option>
                                @foreach ($provinces_array as $province)
                                    <option value="{{ $province }}" @selected($record->c_province == $province)>
                                        {{ $province }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-control fields_address_displaced" name="c_city" title="المدينة الحالية" wire:input="update({{$record->id}},'c_city', $event.target.value)" @disabled($record->orphan_displaced == 'لا')>
                                <option label="أختر المكان" @selected($record->c_city == null)>
                                </option>
                                @foreach ($cities_array as $city)
                                    <option value="{{ $city }}" @selected($record->c_city == $city)>
                                        {{ $city }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <textarea class="form-control fields_address_displaced" name="c_address" @disabled($record->orphan_displaced == 'لا')
                                placeholder="أدخل العنوان الحالي بالتفصيل" rows="1" title="العنوان الحالي" wire:input="update({{$record->id}},'c_address', $event.target.value)">{{ $record->c_address }}</textarea>
                        </td>
                        <td>
                            <select class="form-control" id="orphan_displaced" name="orphan_displaced" title="اليتيم نازح؟" wire:input="update({{$record->id}},'orphan_displaced', $event.target.value)">
                                <option label="أختر الحالة" @selected($record->orphan_displaced == null)>
                                </option>
                                @foreach ($orphan_displaced_array as $orphan_displaced)
                                    <option value="{{ $orphan_displaced }}" @selected($record->orphan_displaced == $orphan_displaced)>
                                        {{ $orphan_displaced }}
                                    </option>
                                @endforeach
                            </select>
                        </td>

                        <td>
                            <select class="form-control" name="livery" title="كسوة" wire:input="update({{$record->id}},'livery', $event.target.value)">
                                <option label="أختر" @selected($record->livery == null)></option>
                                <option value="نعم" @selected($record->livery == 'نعم')>نعم</option>
                                <option value="لا" @selected($record->livery == 'لا')>لا</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="financial_aid" title="الدعم المالي" wire:input="update({{$record->id}},'financial_aid', $event.target.value)">
                                <option label="أختر" @selected($record->financial_aid == null)>
                                </option>
                                <option value="نعم" @selected($record->financial_aid == 'نعم')>نعم</option>
                                <option value="لا" @selected($record->financial_aid == 'لا')>لا</option>
                            </select>
                        </td>

                        <td>
                            {{$record->data_portal_name}}
                        </td>
                        <td>
                            {{$record->section}}
                        </td>
                        <td>
                            @can('delete', 'App\\Models\Record')
                            <form action="{{route('records.destroy', $record->id)}}" class="d-inline" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="border-0" style="    background-color: transparent !important;">
                                    <i class="fe fe-trash text-danger" role="button"></i>
                                </button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-12 row justify-content-between">
            {{ $records->links() }}
            @can('export', 'App\\Models\Record')
            <form id="exportForm" class="d-inline" action="{{route('records.export')}}" method="post" target="_blank">
                @csrf
                <input type="hidden" name="filterArray" id="filterArray" value="{{$filterArrayS}}">
                <button type="submit" class="btn btn-info">
                    <i class="fe fe-download"></i> تصدير
                </button>
            </form>
            @endcan
        </div>
    </div>

    {{-- filter --}}
    <div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="filterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent>
                    <div class="modal-body row my-xl-auto">
                        <div class="form-group col-md-3">
                            <x-form.input name="first_name" label="اسم اليتيم" placeholder="إملا اسم اليتيم" wire:model="filterArray.first_name"/>
                        </div>
                        <div class="form-group col-md-3">
                            <x-form.input name="father_name" label="اسم والد اليتيم" placeholder="إملا اسم اليتيم" wire:model="filterArray.father_name"/>
                        </div>
                        <div class="form-group col-md-3">
                            <x-form.input name="grandfather_name" label="اسم جد اليتيم" placeholder="إملا اسم اليتيم" wire:model="filterArray.grandfather_name"/>
                        </div>
                        <div class="form-group col-md-3">
                            <x-form.input name="family_name" label="اسم عائلة اليتيم" placeholder="إملا اسم اليتيم" wire:model="filterArray.family_name"/>
                        </div>
                        <div class="form-group col-md-3">
                            <x-form.input name="orphan_id" label="رقم الهوية" placeholder="إملا رقم هوية اليتيم" maxlength="9" wire:model="filterArray.orphan_id"/>
                        </div>
                        <div class="form-group col-md-3">
                            <label>المحافظة الأصلية</label>
                            <select class="form-control" name="p_province" wire:model="filterArray.p_province">
                                <option label="أختر المكان">
                                </option>
                                @foreach ($provinces_array as $province)
                                    <option value="{{ $province }}">
                                        {{ $province }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>المدينة الأصلية</label>
                            <select class="form-control" name="p_city" wire:model="filterArray.p_city">
                                <option label="أختر المكان">
                                </option>
                                @foreach ($cities_array as $city)
                                    <option value="{{ $city }}">
                                        {{ $city }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>محافطة النزوح</label>
                            <select class="form-control" name="c_province" wire:model="filterArray.c_province">
                                <option label="أختر المكان">
                                </option>
                                @foreach ($provinces_array as $province)
                                    <option value="{{ $province }}">
                                        {{ $province }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>مدينة النزوح</label>
                            <select class="form-control" name="c_city" wire:model="filterArray.c_city">
                                <option label="أختر المكان">
                                </option>
                                @foreach ($cities_array as $city)
                                    <option value="{{ $city }}">
                                        {{ $city }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <x-form.input name="Id_mother" label="رقم هوية الام" placeholder="إملا رقم هوية الام" maxlength="9" wire:model="filterArray.Id_mother"/>
                        </div>
                        <div class="form-group col-md-3">
                            <x-form.input placeholder="اسم ولي الامر" label="اسم ولي الامر" name="first_guardian_name" wire:model="filterArray.first_guardian_name"/>
                        </div>
                        <div class="form-group col-md-3">
                            <x-form.input placeholder="اسم والد ولي الامر" label="اسم والد ولي الامر" name="father_guardian_name" wire:model="filterArray.father_guardian_name"/>
                        </div>
                        <div class="form-group col-md-3">
                            <x-form.input placeholder="اسم جد ولي الامر" label="اسم جد ولي الامر" name="grandfather_guardian_name" wire:model="filterArray.grandfather_guardian_name"/>
                        </div>
                        <div class="form-group col-md-3">
                            <x-form.input placeholder="اسم عائلة ولي الامر" label="اسم  عائلة ولي الامر" name="family_guardian_name" wire:model="filterArray.family_guardian_name"/>
                        </div>
                        <div class="form-group col-md-3">
                            <x-form.input name="guardian_id" label="رقم هوية ولي الامر" placeholder="إملا رقم هوية ولي الأمر" maxlength="9" wire:model="filterArray.guardian_id"/>
                        </div>
                        <div class="form-group col-md-3">
                            <label>سبب الوفاء</label>
                            <select class="form-control" name="cause_of_death" wire:model="filterArray.cause_of_death" >
                                <option label="أختر السبب">
                                </option>
                                @foreach ($causes_of_death_array as $cause_of_death)
                                    <option value="{{ $cause_of_death }}">
                                        {{ $cause_of_death }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>الحالة الصحية لليتيم</label>
                            <select class="form-control" name="status_health_orphan" wire:model="filterArray.status_health_orphan">
                                <option label="أختر الحالة">
                                </option>
                                @foreach ($status_health_orphan_array as $status_health_orphan)
                                    <option value="{{ $status_health_orphan }}">
                                        {{ $status_health_orphan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>يتيم الوالدين</label>
                            <select class="form-control" name="child_orphaned_parents" wire:model="filterArray.child_orphaned_parents">
                                <option label="أختر">
                                </option>
                                @foreach ($child_orphaned_parents_array as $child_orphaned_parents)
                                    <option value="{{ $child_orphaned_parents }}">
                                        {{ $child_orphaned_parents }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>وضع المنزل</label>
                            <select class="form-control" name="CH_house" wire:model="filterArray.CH_house">
                                <option label="أختر الحالة">
                                </option>
                                @foreach ($CH_house_array as $CH_house)
                                    <option value="{{ $CH_house }}">
                                        {{ $CH_house }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>هل اليتيم نازح؟</label>
                            <select class="form-control" name="orphan_displaced" wire:model="filterArray.orphan_displaced">
                                <option label="أختر الوضع">
                                </option>
                                @foreach ($orphan_displaced_array as $orphan_displaced)
                                    <option value="{{ $orphan_displaced }}">
                                        {{ $orphan_displaced }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <x-form.input type='date' name="date_of_birth_from" label="من تاريخ الميلاد" placeholder="إملا تاريخ الميلاد" wire:model="filterArray.date_of_birth_from"/>
                        </div>
                        <div class="form-group col-md-3">
                            <x-form.input type='date' name="date_of_birth_to" label="الى تاريخ الميلاد" placeholder="إملا تاريخ الميلاد" wire:model="filterArray.date_of_birth_to"/>
                        </div>
                        <div class="form-group col-md-3">
                            <label>مضاف من تاريخ</label>
                            <input class="form-control"  type="date" name="created_at_from" wire:model="filterArray.created_at_from">
                        </div>
                        <div class="form-group col-md-3">
                            <label>حتى تاريخ</label>
                            <input class="form-control" type="date" name="created_at_to" wire:model="filterArray.created_at_to">
                        </div>
                        {{-- @if (in_array(Auth::user()->type_user,["متحكم رئيسي","مدير رئيسي"])) --}}
                        <div class="form-group col-md-3">
                            <label>مدخل البيانات</label>
                            <select class="form-control" name="data_portal" wire:model="filterArray.data_portal">
                                <option label="أختر المدخل">
                                </option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- @endif --}}
                        <div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning" type="reset">مسح</button>
                        <button type="button" wire:click="filter" class="btn mb-2 btn-primary" data-dismiss="modal">بحث</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

