<?php
/**
 * @var Article|null $article
 */

use App\Models\Article;

?>

@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-12">
            <form method="post">
            @csrf <!-- {{ csrf_field() }} -->
                <div class="form-group">
                    <input
                        class="form-control"
                        name="title"
                        type="text"
                        placeholder="Заголовок"
                        value="{{ old('title') ?? $article->title ?? ''}}"
                    >
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                        <textarea
                            class="form-control"
                            name="brief"
                            rows="1"
                            placeholder="Превью"
                        >{{ old('brief') ?? $article->brief ?? '' }}</textarea>
                    @error('brief')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                        <textarea
                            class="form-control"
                            name="article"
                            rows="5"
                            placeholder="Текст статьи"
                        >{{ old('article') ?? $article->article ?? '' }}</textarea>

                    @error('article')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input
                        class="form-control"
                        name="keywords"
                        type="text"
                        placeholder="Ключевые слова"
                        value="{{ old('keywords') ?? $article->keywords ?? ''}}"
                    >
                    @error('keywords')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <select name="status" class="custom-select col-1">
                    <?php $currentStatus = old('status') ?? $article->status ?? ''; ?>
                    @foreach(Article::STATUSES as $status)
                        <option
                            value="{{ $status }}"
                            {{ $status === $currentStatus ? 'selected' : '' }}
                        >
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>

                <button class="btn btn-primary" type="submit">Отправить</button>
            </form>
        </div>
    </div>
@endsection

