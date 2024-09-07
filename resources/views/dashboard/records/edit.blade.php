<x-front-layout>
    <div class="row mr-3 ml-3 ">
        <form action="{{ route('records.update',$record->id) }}" method="POST" enctype="multipart/form-data" class="w-100">
            @csrf
            @method('PUT')
            <div class="container-fluid">
                @include('dashboard.records._formEdit')
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-success mb-2" type='submit'>
                    {{ $btn_label ?? 'أضف' }}
                </button>
            </div>
        </form>
    </div>
    @push('scripts')
    <script>
        const csrf_token = "{{ csrf_token() }}";
        const app_link = "{{config('app.url')}}";
    </script>
    <script src="{{ URL::asset('js/ajaxCode.js') }}"></script>
    @endpush
</x-front-layout>
