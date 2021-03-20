@extends('layouts.main')
@section('content')
    <div class="my-2 bg-primary">
        <h3><a href="/">subject of the article</h3>
        <p>
            <small>publication creation date</small>
        </p>
        <div class="row">
            <div class="col-md-4 bg-info">
                <a href="/"><img src="images/publicationimg.png" alt="image"></a>
            </div>
            <div class="col-md">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </div>
        </div>
    </div>

    <div class="my-2 bg-secondary">
        <h3>subject of the article 2</h3>
        <p>
            <small>publication creation date 2</small>
        </p>
        <div class="row">
            <div class="col-md-4 bg-info">
                <a href="/"><img src="images/publicationimg.png" alt="image"></a>
            </div>
            <div class="col-md bg-warning">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </div>
        </div>
    </div>
@endsection
