<?php
/**
 * @var ArticlePresentation|null $article
 * @var TagPresentation[] $tags
 */

use App\Presentations\ArticlePresentation;
use App\Models\Tag;
use App\Models\Article; //модель нужна для констант хранящих статусы.
use App\Presentations\TagPresentation;

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

                <div class="form-group">
                    @error('tags')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('tags.*')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <select multiple size="10" name="tags[]" class="custom-select col-3">
                        {{--Гетер возвращает айдишники тегов из ДТО--}}
                        <?php $selectedTags = old('tags') ?? (isset($article) ? $article->getTagsIds() : []); ?>
                        {{--$tags-коллекция моделей, в цикле разбирается на отедельные теги $tag
                       в коллекции есть все свойства отдельных моделей, поэтому можно проверить айди тега
                       прямо в коллекции, как в массиве. Потому что она массив массивов, в случае если есть,
                       метод вьюхи 'selected' отмечает тег.
                       --}}
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}"
                                {{ in_array($tag->id, $selectedTags) ? 'selected' : '' }}
                            >
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>

                </div>

                <select name="status" class="custom-select col-2">
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

