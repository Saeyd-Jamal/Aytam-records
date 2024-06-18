@extends('layouts.master')
@section('page-header')
        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="left-content">
                <div>
                    {{-- <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">مرحبا : {{ Auth::user()->name }}</h2> --}}
                </div>
            </div>
        </div>
        <!-- /breadcrumb -->

@endsection
@push('styles')
<link href="{{URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
@endpush

    @section('content')

    <form action="{{ route('orphans_records.update' , $orphanRecord->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        {{-- name --}}
        <div class="row mt-3">
            <div class="form-group col-md-12">
                <x-form.label>الاسم</x-form.label>
                <div class="input-group mb-3">
                    <x-form.input type="text" name="name" :value="$orphanRecord->name" required />
                </div>
            </div>
        </div>
        @include('dashboard.orphan_records._form')
        <div class="row mt-3">
                <div class="form-group col-md-4 d-flex justify-content-end align-items-center">
                    @if (in_array(Auth::user()->type_user,["متحكم رئيسي","مدير رئيسي","محرر"]))
                    <div>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    @endif
                    <x-form.button class="btn btn-success mb-2 mr-2 " type='submit'>
                        {{ $button_label ?? 'أضف' }}
                    </x-form.button>
                </div>
        </div>
        </div>

    </form>
    @if (in_array(Auth::user()->type_user,["متحكم رئيسي","مدير رئيسي","محرر"]))

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">حذف بيانات اليتيم {{$orphanRecord->deceased_name}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                هل أنت متأكد من حذف البيانات
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
            @if (in_array(Auth::user()->type_user,["متحكم رئيسي","مدير رئيسي",'محرر']))
            <form action="{{route('orphans_records.destroy',$orphanRecord->id)}}" method="post">
                @csrf
                @method('delete')
                <x-form.button class="btn btn-danger" type="submit">
                    حذف
                </x-form.button>
            </form>
            @endif
            </div>
        </div>
        </div>
    </div>
    @endif
@endsection

    {{-- css --}}
    @push('styles')
        {{-- css --}}
        <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
        <!--Internal  Datetimepicker-slider css -->
        <link href="{{URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
        <link href="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
        <link href="{{URL::asset('assets/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
        <!-- Internal Spectrum-colorpicker css -->
        <link href="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
        <!---Internal Fileupload css-->
        <link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
        <!---Internal Fancy uploader css-->
        <link href="{{URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
        <!-- Internal Select2 css -->
        <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

    @endpush
    {{-- js --}}
    @push('scripts')
        <!--Internal  jquery-simple-datetimepicker js -->
        <script src="{{URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
        <!-- Ionicons js -->
        <script src="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
        <!--Internal  Datepicker js -->
        <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
        <!--Internal  jquery.maskedinput js -->
        <script src="{{URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
        <!--Internal  spectrum-colorpicker js -->
        <script src="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
        <!-- Internal Select2.min js -->
        <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
        <!--Internal Ion.rangeSlider.min js -->
        <script src="{{URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
        <!--Internal  jquery-simple-datetimepicker js -->
        <script src="{{URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
        <!-- Ionicons js -->
        <script src="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
        <!--Internal  pickerjs js -->
        <script src="{{URL::asset('assets/plugins/pickerjs/picker.min.js')}}"></script>
        <!-- Internal form-elements js -->
        <script src="{{URL::asset('assets/js/form-elements.js')}}"></script>
        <!--Internal Fileuploads js-->
        <script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
        <script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
        <!--Internal Fancy uploader js-->
        <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
        <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
        <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
        <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
        <script src="{{URL::asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
        <!-- Internal Select2.min js -->
        <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
        <script>
            const csrf_token = "{{ csrf_token() }}";
        </script>
        <script src="{{ asset('js/filter.js') }}"></script>
        <script src="{{ asset('js/ajaxCode.js') }}"></script>

    @endpush
