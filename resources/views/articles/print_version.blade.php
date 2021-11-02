<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link type="image/x-icon" rel="shortcut icon" href="/favicon.ico">
    <link rel="stylesheet" href="/css/print.css">

    <title>NeBlog</title>
</head>
<body>
    <article>
        <h3>{{ $article->title }}</h3>
        <p>
            <small>{{ $article->createdAt }}</small>
        </p>
        <table class="intro txtGrid">
            <tbody>
            <tr>
                <td class="barker">
                    <img class="barker" src="/images/123.png" alt="image" width="250" height="120">
                </td>
                <td>
                    <p> {!! $article->brief !!} </p>
                </td>
            </tr>
            </tbody>
        </table>
        <p class="article"> {!! $article->article !!} </p>
    </article>
</body>
</html>
