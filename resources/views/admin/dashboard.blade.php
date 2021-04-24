@extends('layouts.admin')
@section('content')
    <ul>
        <li><a href="{{ route('admin-article-form') }}">Add article</a></li>
    </ul>

    <ul>
        <li><a href="{{ route('admin-article-list') }}">Article list</a></li>
    </ul>
    <ul>
        <li><a href="{{ route('admin-title-list') }}">Title list</a></li>
    </ul>

@endsection
