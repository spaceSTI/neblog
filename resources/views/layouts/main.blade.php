<!doctype html>
<html lang="en">
<head>
    @include('layouts/parts/head')
</head>
<body>
    <div class="container">
        @include('layouts/parts/flash_message')
        @include('layouts/parts/navigation')
        @if(Route::current()->getName() === 'view-article')
            <div class="m-2 p-0 row">
                <div class="col-md-10">
                    @yield('content')
                </div>
                <div class="col-md-2 d-none d-sm-none d-md-block">
                    <div class="row">
                        @include('layouts/parts/tags_cloud')
                    </div>
                </div>
            </div>
        @else
            <div class="m-2 p-0 row">
                <div class="col-md-7">
                    @yield('content')
                </div>
                <div class="col-md-5 d-none d-sm-none d-md-block">
                    <div class="row">
                        @include('layouts/parts/tags_cloud')
                    </div>
                </div>
            </div>
        @endif
        @include('layouts/parts/footer')
    </div>
</body>
</html>
