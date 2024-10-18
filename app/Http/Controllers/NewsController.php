<?php
namespace App\Http\Controllers;

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
    }
   /*public function index()
    {
        // Получаем все новости из базы данных
        $news = News::orderBy('created_at', 'desc')->get();

        // Возвращаем представление с данными новостей
        return view('newsindex', compact('news'));
    }*/
}

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

