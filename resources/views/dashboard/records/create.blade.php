<x-front-layout>
    <div class="row mr-3 ml-3">
        <form action="{{ route('records.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('dashboard.records._form')

        </form>
        <!--File Browser-->
        {{-- @if (in_array(Auth::user()->type_user,["متحكم رئيسي","مدير رئيسي"])) --}}
        <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        استيراد ملف إكسيل
                    </div>
                    <p class="mg-b-20">يرجى إختيار الملف أولا ثم رفع الملف</p>
                    <form action="{{ route('records-import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm">
                            <div class="col-sm-7 col-md-6 col-lg-4">
                                @csrf
                                <x-form.input type="file" name="file" id="file_excel" />
                                <br>
                                <button type="submit" class="btn btn-success mb-3">
                                    إستيراد ملف الاكسيل
                                </button>
                            </div>
                        </div>
                        <a class="nav-link" href="{{ asset('files/style_file_orphans_records.xlsx') }}" download="نموذج_استيراد_ملف_الاكسيل">تحميل ملف التعبئة</a>
                    </form>
                </div>
            </div>
        </div>
        {{-- @endif --}}
    </div>
    @push('scripts')
    <script>
        const csrf_token = "{{ csrf_token() }}";
        const app_link = "{{config('app.url')}}";
    </script>
    <script src="{{ URL::asset('js/ajaxCodeCreate.js') }}"></script>
    @endpush
</x-front-layout>
