<x-front-layout>
    <div class="row">
        <!-- Bordered table -->
        <div class="col-md-12 my-4">
            <div class="card shadow">
                <div class="card-body">

                    <link rel="stylesheet" href="{{ asset('css/records.css') }}">
                    <style>
                        table{
                            display: block;
                            max-width: 100%;
                            overflow-x: scroll;
                        }
                        table td{
                            white-space: nowrap;
                        }
                        table input,table select,table textarea{
                            width: auto !important;
                            background: none !important;
                            border: none !important;
                        }
                    </style>

                    <livewire:record-tr />

                </div>
            </div>
        </div> <!-- Bordered table -->
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#expand').on('click', function() {
                    $('aside.sidebar-left').css('display', 'none');
                    $('nav.navbar').css('display', 'none');
                    $('main.main-content').css('margin-right', '0');
                    $('#collapse').css('display', 'inline-block');
                    $(this).css('display', 'none');
                });
                $('#collapse').on('click', function() {
                    $('aside.sidebar-left').css('display', 'block');
                    $('nav.navbar').css('display', 'flex');
                    $('main.main-content').css('margin-right', '16rem');
                    $('#expand').css('display', 'inline-block');
                    $(this).css('display', 'none');
                });

                $("#filter-btn").click(function(){
                    $("#filter-div").slideToggle();
                });
            });
        </script>
    @endpush
</x-front-layout>
