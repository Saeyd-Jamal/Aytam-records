<x-front-layout>
    @push('styles')
        <style>
            .horizontal .main-content{
                margin:0;
            }
        </style>
        <style>
            table{
                display: block;
                max-width: 100%;
                overflow-x: scroll;
            }
            table td{
                white-space: nowrap;
                padding: 5px 11px !important;
            }
            table th{
                white-space: nowrap;
                color: #000 !important;
                font-size: 18px;
                font-weight: bold;
            }
            table input,table select,table textarea{
                width: auto !important;
                background: none !important;
                border: none !important;
            }
            table td .name{
                width: 65px !important;
            }
        </style>
    @endpush
    <div class="row">
        <!-- Bordered table -->
        <div class="col-md-12 my-1">
            <div class="card shadow">
                <div class="card-body p-0">
                    <link rel="stylesheet" href="{{ asset('css/records.css') }}">
                    <livewire:record-tr />
                </div>
            </div>
        </div> <!-- Bordered table -->
    </div>
</x-front-layout>
