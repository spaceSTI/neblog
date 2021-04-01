<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
        <div class="row col-12">
            <form name="create-date" method="post" action="input1.php">
                <p><b>Дата создания</b><br>
                    <input type="date">
                </p>
            </form>
            <p><b>Заголовок</b><br>
                <input type="Text" size="1000">
            </p>
            <p><b>Превью</b><br>
                <input type="text">
            </p>
            <p><b>Текст статьи</b><br>
                <input type="Text">
            </p>
        </div>
    </div>

</body>
</html>
