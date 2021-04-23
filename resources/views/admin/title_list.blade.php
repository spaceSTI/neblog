<?php
/**
 * @var ArticlePresentation[] $articles
 */
use App\Presentations\ArticlePresentation;

?>
    <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="/css/style.css">

    <title>NeBlog</title>
</head>
<body>
    <div class="container">
    @include('flashMessage')
    <!--Header-->
        <div class="row">
            <header class="col-lg-12 d-flex flex-column flex-md-row align-items-center pr-1 pl-1 p-3 px-md-4 border-bottom shadow-sm">
                <p class="d-none d-sm-none d-md-block col-4 h3 my-0 me-md-auto fw-normal">Neblog</p>
                <nav class="d-none d-sm-none d-md-block col-md-4  col-6 my-2 my-md-0 me-md-3">
                    <a class="p-2 text-dark" href="/">Блог</a>
                    <a class="p-2 text-dark" href="/contacts">Контакты</a>
                    <a class="p-2 text-dark" href="/about">О сайте</a>
                </nav>
                {{----}}
                <form class="d-none d-sm-none d-md-block mb-1 mt-1 col-sm-12 col-md-4 col-lg-4 col-xl-4" action="{{ route('search-form') }}" method="get">
                    <input type="text" name="search" id="search" placeholder="Поиск по сайту" class="form-control">
                </form>

                {{--Navigation panel for mobile ver--}}
                <div class="row col-12 align-items-center pr-1 pl-1">
                    <p class="col-2 d-md-none d-lg-none d-xl-none h5 my-0 me-md-auto fw-normal pr-1 pl-1">NB</p>
                    <form class="col-8  d-md-none d-lg-none d-xl-none col-xs-8 mb-1 mt-1 pr-1 pl-1" action="{{ route('search-form') }}" method="get">
                        <input type="text" name="search" id="search" placeholder="Че ищем?" class="form-control">
                    </form>
                    <div class="btn-group dropleft col-2 d-md-none d-lg-none d-xl-none">
                        <!-- Кнопка -->
                        <button type="button" class="btn pl-1 pr-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bars"></i>
                        </button>
                        <!-- Меню -->
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/">Блог</a>
                            <a class="dropdown-item" href="/contacts">Контакты</a>
                            <a class="dropdown-item" href="/about">О сайте</a>
                        </div>
                    </div>
                </div>
            </header>
        </div>
        <!--main part-->
        <div class="m-2 p-0 row">
            <div class="col-md-8">

                @foreach($articles as $dto)
                    <div class="my-2">
                        <h5><a href="{{ $dto->itemUrl }}">{{ $dto->title }}</a></h5>
                        @endforeach
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
        </div>
    </div>
</body>
</html>
