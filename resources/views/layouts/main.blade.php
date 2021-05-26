<!doctype html>
<html lang="en">
<head>
    @include('layouts/parts/head')
</head>
<body>
    <div class="container">
        @include('layouts/parts/flash_message')
        @include('layouts/parts/navigation')
        <div class="m-2 p-0 row">
            <div class="col-md-8">
                @yield('content')
            </div>
            <div class="col-md-4 d-none d-sm-none d-md-block">
                News Feed block
                <div class="row">
                    <div class="col">
                        <h3>Облако тегов</h3>
                        <p>
                             @foreach($tagsWithWeights as $tag)
                                <span style='font-size: {{ 80 + $tag->fontSize }}%'>{{ $tag->name }}</span>
                             @endforeach
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts/parts/footer')
    </div>
</body>
</html>
