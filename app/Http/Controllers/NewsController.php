<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    // Показать список новостей
    public function index()
    {
        $news = News::latest()->get(); // Получаем все новости, сортированные по дате
        return view('newsindex', compact('news'));
    }

    // Показать форму добавления новости
    public function create()
    {
        return view('createnews');
    }

    // Сохранение новости
    public function store(Request $request)
    {
        // Валидация данных
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Создание новости
        $news = new News();
        $news->title = $request->title;
        $news->content = $request->content;

        if ($request->hasFile('image')) {
            // Загрузка изображения
            $imagePath = $request->file('image')->store('news_images', 'public');
            $news->image = $imagePath;
        }

        $news->save();

        return redirect()->route('newsindex')->with('success', 'Новость добавлена.');
    }

    // Показать одну новость
    public function show($id)
    {
        $newsItem = News::findOrFail($id);
        return view('newsslider', compact('newsItem'));
    }
}


/*namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function newsindex()
    {
        $news = News::all(); // Получаем все новости

        return view('newsindex', compact('news')); // Возвращаем представление
    }
    public function create()
    {
        return view('createnews');
    }
    // Метод для отображения отдельной новости
    public function show($id)
    {
        // Поиск новости по ID
        $newsItem = News::findOrFail($id);

        // Возвращаем представление и передаём в него новость
        return view('newsindex', ['news' => [$newsItem]]);

    }
    public function index()
    {
//            $news = News::orderBy('created_at', 'desc')->get();
        $news = News::all();

        return view('newsindex', compact('news'));
    }*/
   /*public function index()
    {
        // Получаем все новости из базы данных
        $news = News::orderBy('created_at', 'desc')->get();

        // Возвращаем представление с данными новостей
        return view('newsindex', compact('news'));
    }*/


/*public function createNews(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
    ]);

    News::create([
        'title' => $request->title,
        'content' => $request->content,
        'author' => auth()->user()->name,
    ]);

    return redirect()->route('news.index')->with('success', 'News added successfully.');
}

public function index()
{
    $news = News::orderBy('created_at', 'desc')->get();
    return view('news.index', compact('news'));
}*/

