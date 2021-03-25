<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="css/style.css">

    <title>NeBlog</title>
</head>
<body>
    <div class="container">
    @include('flashMessage')
    <!--Header-->
        <div class="row">
            <header class="col-lg-12 d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-info border-bottom shadow-sm">
                <p class="col-4 h3 my-0 me-md-auto fw-normal">Neblog</p>
                <nav class="col-md-4 d-none d-sm-none d-md-block col-6 my-2 my-md-0 me-md-3">
                    <a class="p-2 text-dark" href="/">Блог</a>
                    <a class="p-2 text-dark" href="/contacts">Контакты</a>
                    <a class="p-2 text-dark" href="/about">О сайте</a>
                </nav>
                <form class="mb-1 mt-1 col-sm-12 col-md-4 col-lg-4 col-xl-4" action="{{ route('search-form') }}" method="get">
                    <input type="text" name="search" id="search" placeholder="Поиск по сайту" class="form-control">
                </form>
                <div class="dropdown">
                    <button type="button" class="col-12 d-md-none d-lg-none d-xl-none btn btn-warning" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Навигация по сайту
                    </button>
                    <div class="dropdown-menu col-12">
                        <a class="dropdown-item" href="/">Блог</a>
                        <a class="dropdown-item" href="/contacts">Контакты</a>
                        <a class="dropdown-item" href="/about">О сайте</a>
                    </div>
                </div>
            </header>
        </div>
        <!--main part-->
        <div class="m-2 p-0 row">
            <div class="col-md-8 bg-warning">
                @yield('content')
            </div>
            <div class="col-md-4 d-none d-sm-none d-md-block bg-info">
                News Feed block
                <div class="row">
                    <div class="col bg-warning">
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
        <div class="scrollup">
            <!-- Иконка fa-chevron-up (Font Awesome) -->
            <i class="fa fa-chevron-up"></i>
        </div>
        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="row">
                <div class="col-12 col-md">
                    <small class="d-inline  text-muted">neblog.ru © 2021</small>
                    <small class="d-inline text-muted">Время на сайте GMT+3 (Москва)</small>
                </div>
            </div>
        </footer>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
    <script src="/js/scrollup.js"></script>
</body>
</html>
