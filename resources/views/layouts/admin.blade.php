<!doctype html>
<html lang="en">
<head>
    @include('layouts/parts/head')
</head>
<body>
    <div class="container">
        @include('layouts/parts/flash_message')
        @include('layouts/parts/logout_btn')
        @include('layouts/parts/navigation')

        <div class="m-2 p-0 row">
            <div class="col-md-8">
                @yield('content')
            </div>
        </div>

        @include('layouts/parts/footer')
    </div>
</body>
</html>
