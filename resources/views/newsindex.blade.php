@include('header')
<style>
    h1{
        text-align: center;
    }
    .news-item{
        font-size: 20px;
        margin-left: 150px;
        margin-right: 150px;
    }

</style>

    <h1>Новости</h1>

    @foreach($news as $newsItem)
        <div class="news-item">
            <h2><a href="{{ route('newsindex', $newsItem->id) }}">{{ $newsItem->title }}</a></h2>
            <p>{{ Str::limit($newsItem->content, 150) }}</p>

            @if($newsItem->image)
                <img src="{{ asset('img/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" width="100">
            @endif
        </div>
    @endforeach

{{--<div class="container">
    <h1>Новости</h1>
    @foreach($news as $newsItem)
        <div class="news-item">
            <h2 style="text-align: center">
                <a href="{{ route('newsslider', $newsItem->id) }}">{{ $newsItem->title }}</a>
            </h2>
            <p>{{ Str::limit($newsItem->content, 800) }}</p>
            <br>
            <p style="text-align: end"><small>Опубликовано: {{ $newsItem->published_at }}</small></p>
            <hr>
        </div>
    @endforeach
</div>--}}


@include('footer')
{{--@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Новости</h1>

@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
@endif

    <a href="{{ route('news.create') }}" class="btn btn-primary mb-3">Добавить новость</a>

@if ($news->isEmpty())
        <p>Нет новостей.</p>
@else
        <ul class="list-group">
@foreach ($news as $newsItem)
                <li class="list-group-item">
                    <h5>{{ $newsItem->title }}</h5>
                    <p>{{ Str::limit($newsItem->content, 100) }}</p>
                    <a href="{{ route('news.show', $newsItem->id) }}" class="btn btn-secondary">Подробнее</a>
                </li>
@endforeach
        </ul>
@endif
</div>
@endsection--}}
