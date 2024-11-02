
<div class="container-fluid">
    <div class="row justify-content-end m-2">
        <button type="button" class="btn btn-danger" wire:click="minusRow">
            <i class="fe fe-minus"></i> حذف اخر يتيم
        </button>
        <button type="button" class="btn btn-primary" wire:click="addRow">
            <i class="fe fe-plus"></i> إضافة يتيم
        </button>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow"  id="table_box">
                <div class="card-header">
                    <div id="orphan_id_error" class="text-danger" wire:model="orphan_id_error">
                        {{ $orphan_id_error }}
                    </div>
                </div>

                <div class="card-body table-container">
                    <table class="table table-hover table-bordered dataTable-1" id="dataTable-1">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th colspan="4">الاسم</th>
                                <th>الجنس</th>
                                <th>رقم الهوية</th>
                                <th>تاريخ الميلاد</th>
                                <th>عنوان الميلاد</th>
                                <th>ملاحظات حول اليتيم</th>
                                <th>الحالة الصحية</th>
                                <th>ملاحظات حول الحالة الصحية</th>
                                <th>هل يتيم الأبوين؟</th>
                                <th colspan="4">اسم الأم</th>
                                <th>رقم هوية الأم</th>
                                <th>الحالة الإجتماعية للأم</th>
                                <th>تاريخ ميلاد الام</th>
                                <th>تاريخ وفاة الأم</th>
                                <th>سبب وفاة الأم</th>
                                <th>عدد الأخوة</th>
                                <th>عدد الأخوات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <style>
                                td input,td select,td textarea{
                                    width: 100px !important;
                                }
                            </style>
                            <input type="hidden" name="aytam_count" value="{{$aytam}}" class="form-control">
                            @for($i = 1; $i <= $aytam; $i++)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td class="sticky">
                                        <input type="text" name="first_name_{{$i}}" class="form-control" title="الاسم">
                                    </td>
                                    <td class="sticky">
                                        <input type="text" name="father_name_{{$i}}" class="form-control" title="الاسم">
                                    </td>
                                    <td class="sticky">
                                        <input type="text" name="grandfather_name_{{$i}}" class="form-control" title="الاسم">
                                    </td>
                                    <td class="sticky">
                                        <input type="text" name="family_name_{{$i}}" class="form-control" title="الاسم">
                                    </td>
                                    <td>
                                        <select class="form-control" name="gender_{{$i}}" required>
                                            <option value="ذكر">
                                                ذكر
                                            </option>
                                            <option value="أنثى">
                                                أنثى
                                            </option>
                                        </select>
                                    </td>
                                    <td>
                                        <div>
                                            <input type="text" name="orphan_id_{{$i}}" class="form-control form-control-alternative orphan_id" minlength="9" maxlength="9" required="required" wire:input="checkID($event.target.value)">
                                        </div>
                                    </td>
                                    <td>
                                        <x-form.input min="{{$date_of_birth}}" max="{{$date_of_birth_to}}" type="date" name="date_of_birth_{{$i}}" required/>
                                    </td>
                                    <td>
                                        <x-form.input type="text" name="address_of_birth_{{$i}}"  title="عنوان الميلاد" required />
                                    </td>
                                    <td>
                                        <textarea class="form-control" name="notes_orphan_{{$i}}"  style="width: 150px !important;" placeholder="يمكنك كتابة ملاحظات " rows="1" ></textarea>
                                    </td>
                                    <td>
                                        <select class="form-control" name="status_health_orphan_{{$i}}" required>
                                            <option label="أختر الحالة">
                                            </option>
                                            @foreach ($status_health_orphans as $status_health_orphan)
                                                <option value="{{ $status_health_orphan }}">
                                                    {{ $status_health_orphan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <textarea class="form-control" name="health_status_notes_{{$i}}" style="width: 150px !important;"  placeholder="يمكنك شرح الحالة بشكل مفصل" rows="1"></textarea>
                                    </td>
                                    <td>
                                        <select class="form-control" wire:input="disableField_child_orphaned_parents({{$i}},$event.target.value)" id="child_orphaned_parents_{{$i}}" name="child_orphaned_parents_{{$i}}" required>
                                            <option label="أختر"></option>
                                            @foreach ($child_orphaned_parents_array as $child_orphaned_parents)
                                                <option value="{{ $child_orphaned_parents }}" >
                                                    {{ $child_orphaned_parents }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <div class="input-group mb-3">
                                            <x-form.input type="text" name="first_mother_name_{{$i}}" required />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group mb-3">
                                            <x-form.input type="text" name="father_mother_name_{{$i}}" required />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group mb-3">
                                            <x-form.input type="text" name="grandfather_mother_name_{{$i}}" required />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group mb-3">
                                            <x-form.input type="text" name="family_mother_name_{{$i}}" required />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group mb-3">
                                            <x-form.input id="Id_mother" type="text" name="Id_mother_{{$i}}" minlength="9" maxlength="9"/>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group mb-3">
                                            <x-form.input type="text" name="mother_social_situation_{{$i}}" />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <x-form.input type="date" name="DMB_mother_{{$i}}" />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input type="date" name="DMD_mother_{{$i}}" id="DMD_mother" value="" class="form-control form-control-alternative form-control" placeholder="MM/DD/YYYY" wire:key="input-{{$i}}"  @if(!(isset($disabledFields_child_orphaned_parents[$i]) && $disabledFields_child_orphaned_parents[$i])) disabled @endif >
                                        </div>
                                    </td>
                                    <td>
                                        <select class="form-control" name="CMD_mother_{{$i}}" wire:key="input-{{$i}}" @if(!(isset($disabledFields_child_orphaned_parents[$i]) && $disabledFields_child_orphaned_parents[$i])) disabled @endif>
                                            <option label="أختر السبب">
                                            @foreach ($causes_of_death as $cause_of_death)
                                                <option value="{{ $cause_of_death }}">
                                                    {{ $cause_of_death }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <x-form.input type="number" name="N_brothers_{{$i}}" value="0" title="عدد الأخوة" required min='0' />
                                    </td>
                                    <td>
                                        <x-form.input type="number" name="N_sisters_{{$i}}" value="0"  title="عدد الاخوات" required min='0' />
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>
