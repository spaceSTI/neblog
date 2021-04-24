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
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            In vitae eros nec erat mattis bibendum.
                            Mauris semper lacus sit amet odio facilisis, ac maximus nunc sagittis.
                            Nullam viverra purus egestas nisl suscipit, consectetur maximus ante mattis.
                            Integer malesuada odio feugiat mattis dignissim.
                            Vestibulum nec felis sit amet dui ornare vulputate vel et odio.
                            Suspendisse in turpis blandit felis faucibus tempor eget sit amet nisi.
                            Sed vestibulum enim in lectus fringilla viverra.</p>

                        <h3>Метки</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            In vitae eros nec erat mattis bibendum.
                            Mauris semper lacus sit amet odio facilisis, ac maximus nunc sagittis.
                            Nullam viverra purus egestas nisl suscipit, consectetur maximus ante mattis.
                            Integer malesuada odio feugiat mattis dignissim.
                            .</p>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts/parts/footer')
    </div>
</body>
</html>
