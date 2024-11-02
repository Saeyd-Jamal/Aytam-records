@include('layouts.partials.header')
    <div class="wrapper">
        @include('layouts.partials.nav')
        {{-- @include('layouts.partials.aside') --}}
        <main role="main" class="main-content">
            <div class="container-fluid">
                <x-alert type="success" />
                <x-alert type="warning" />
                <x-alert type="danger" />
                {{ $slot }}
            </div> <!-- .container-fluid -->
        </main> <!-- main -->
    </div> <!-- .wrapper -->
@include('layouts.partials.footer')
