<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="css/style.css">

    <title>My f***ing blog!</title>
</head>
<body>
    <div class="container">
    @include('flashMessage')
    <!--Header-->
        <div class="row">
            <header class="col-lg-12 d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-info border-bottom shadow-sm">
                <p class="col-4 h3 my-0 me-md-auto fw-normal">Neblog</p>
                <nav class="col-6 my-2 my-md-0 me-md-3">
                    <a class="p-2 text-dark" href="/">Блог</a>
                    <a class="p-2 text-dark" href="/contacts">Контакты</a>
                    <a class="p-2 text-dark" href="/about">О сайте</a>
                </nav>
                <form action="{{ route('search-form') }}" method="get">
                    <input type="text" name="search" id="search" placeholder="Поиск по сайту" class="form-control">
                </form>
            </header>
        </div>
        <!--main part-->
        <div class="m-2 p-0 row">
            <div class="col-md-8 bg-warning">
                @yield('content')
            </div>
            <div class="col-md-4 bg-info">
                News Feed block
                <div class="row">
                    <div class="col-sm-4 bg-info">
                        <a href="/"><img src="images/publicationimg.png" alt="image"></a>
                    </div>
                </div>
            </div>
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

</body>
</html>
