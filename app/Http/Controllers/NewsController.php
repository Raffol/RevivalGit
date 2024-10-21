<?phpnamespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    // Отображение формы для создания новости
    public function create()
    {
        return view('createnews');
    }

    // Обработка и сохранение новости
    public function store(Request $request)
    {
        // Валидация данных
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'media' => 'nullable|mimes:jpeg,png,jpg,gif,mp4,mov,avi|max:20480', // Допустимые форматы файлов
        ]);

        // Создание новости
        $news = new News();
        $news->title = $request->title;
        $news->content = $request->content;

        // Загрузка медиафайла
        if ($request->hasFile('media')) {
            $mediaPath = $request->file('media')->store('news_media', 'public');
            $news->media = $mediaPath;
        }

        $news->save();

        return redirect()->route('newsindex')->with('success', 'Новость успешно добавлена!');
    }
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

