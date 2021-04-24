<div class="row">
    <header class="col-lg-12 d-flex flex-column flex-md-row align-items-center pr-1 pl-1 p-3 px-md-4 border-bottom shadow-sm">
        <div class="d-none d-sm-none d-md-block col-4 h3 my-0 me-md-auto fw-normal">
            <img class="logo" src="/images/logo.png" alt="image">
        </div>
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
            <div class="col-2 d-md-none d-lg-none d-xl-none h5 my-0 me-md-auto fw-normal pr-1 pl-1">
                <img class="logo" src="/images/mobile_logo.png" alt="image">
            </div>
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
