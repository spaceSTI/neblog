<?php

use App\Helpers;

?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
@if(!Helpers::isAdmin())
    @yield('crawlerMeta')
@endif
<link type="image/x-icon" rel="shortcut icon" href="/favicon.ico">
<link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
    crossorigin="anonymous"
>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<link rel="stylesheet" href="/css/style.css">

<title>NeBlog</title>

