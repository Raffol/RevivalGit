@include('header')
<style>
    div{
        padding: 50px;
    }
</style>
<div>
    <h1>{{ $newsItem->title }}</h1>
    <p>{{ $newsItem->content }}</p>
    @if ($newsItem->image)
        <img src="{{ asset('img/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" width="300">
    @endif
    <br>
    <small>Опубликовано: {{ $newsItem->published_at ? $newsItem->published_at->format('d.m.Y') : 'Дата не указана' }}</small>

</div>

@include('footer')
