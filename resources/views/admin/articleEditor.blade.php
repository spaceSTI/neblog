@extends('layouts.admin')
@section('content')
    <div class="container">
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
                        ></textarea>
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
                        ></textarea>
                        @error('article')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <select name="status">
                        <option value="public">Public</option>
                        <option value="private">Private</option>
                        <option value="intermediate">Intermediate</option>
                    </select>
                    <button class="btn btn-primary" type="submit">Отправить</button>
                </form>
            </div>
        </div>
@endsection

