<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryTopp;
use App\Models\empCategory;
use App\Models\Employee;
use App\Models\Gallery;
use App\Models\InfoGrafika;
use App\Models\Position;
use App\Models\Post;
use App\Models\Schudeli;
use \App\Models\HomePageImageTag;
use \App\Models\SmenaType;
use App\Models\Statictik;
use App\Models\UsefulResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Message;
use Illuminate\Support\Facades\App;





class FrondController extends Controller
{
    protected $categories;
    protected $categoryTop;



    public function __construct() {
        $this->categories = Category::all();
        $this->categoryTop = CategoryTopp::all();


        // Blade view'larda avtomatik ishlatish uchun:
        view()->share('categories', $this->categories);
        view()->share('categoryTop', $this->categoryTop);

    }





public function index()
{
    $schedule = Schudeli::all();
    $statictik = Statictik::all();
    $posts = Post::all();
    $HomePageImageTag = HomePageImageTag::all();  // shu qator juda muhim

    return view('index', compact('statictik', 'posts', 'HomePageImageTag','schedule'));
}
   public function schoolTack(Request $request)
{
    $categoryId = $request->category;

    // Kerakli kategoriyani topish yoki shu bo‘yicha filtering qilish
    $category = Category::with('children')->find($categoryId);

    return view('frond.schoolTack', compact('category'));
}
    public function LeaderShepDatail() {
        $teachers = Employee::with(['position', 'category'])
            ->whereHas('category', function ($query) {
                $query->where('name_uz', 'Rahbariyat');
            })
            ->get();
        return view('frond.LeaderShepDeatil',compact('teachers'));
    }
  public function searchPosts(Request $request)
{
    // Qidiruv so'rovini olish
    $query = $request->input('query');

    // Postlar modelida qidiruvni amalga oshirish
    $posts = Post::query();

    if ($query) {
        $posts = $posts->where('title_uz', 'like', "%{$query}%")
                       ->orWhere('title_uz', 'like', "%{$query}%")
                        ->orWhere('body_uz', 'like', "%{$query}%")
                         ->orWhere('body_ru', 'like', "%{$query}%"); // content - agar matn bor bo'lsa
    }


    $posts = $posts->get();

    return view('frond.schoolNews', compact('posts', 'query'));
}



    public function leaderShep() {
        $categories = Category::all();
        $categoryTop = CategoryTopp::all();
        $teachers = Employee::with(['position', 'category'])
            ->whereHas('category', function ($query) {
                $query->where('name_uz', 'Rahbariyat');
            })
            ->get();

        return view('frond.leaderShep', compact('teachers','categoryTop','categories'));
    }






    public function teachers(Request $request) {
    $query = $request->input('query');

    $teachersQuery = Employee::with(['position', 'category'])
        ->whereHas('category', function ($q) {
            $q->where('name_uz', '!=', 'Rahbariyat');
        });

    if ($query) {
        $teachersQuery->where(function ($q) use ($query) {
            $q->where('name_uz', 'like', "%{$query}%")
                ->orWhere('name_ru', 'like', "%{$query}%")
                ->orWhereHas('category', function ($cat) use ($query) {
                    $cat->where('name_uz', 'like', "%{$query}%")
                        ->orWhere('name_ru', 'like', "%{$query}%");
                });
        });
    }

    $teachers = $teachersQuery->get()
        ->groupBy(fn($item) => $item->category ? $item->category['name_'. \App::getLocale()] : 'Boshqa toifa');

    $categories = Category::all();
    $categoryTop = CategoryTopp::all();

    return view('frond.teachers', compact('teachers', 'categoryTop', 'categories', 'query'));
}


    public function rekvizit() {

        return view('frond.rekvizit');
    }


public function educationByCategory($categoryId)
{
    // Kategoriyaga tegishli ma'lumotlarni olish
    $educations = Schudeli::where('category_id', $categoryId)->get();

    $smenaType = SmenaType::all();

    return view('frond.education', compact('educations', 'smenaType'));
}




    public function education(Request $request)
{

    $query = $request->input('query');
    $categoryId = $request->input('category');

    $queryBuilder = Schudeli::query();

    if ($query) {
        $queryBuilder->where('week_day', 'like', "%{$query}%");
    }

    if ($categoryId) {
        $queryBuilder->where('category_id', $categoryId);
    }

    $educations = $queryBuilder->get();

    $smenaType = SmenaType::all();

    return view('frond.education', compact('educations', 'smenaType'));
}


public function educationDetail($id)
{
    $schedule = Schudeli::find($id);

    if (!$schedule) {
        abort(404);
    }

    $categories = Category::all();
    $categoryTops = CategoryTopp::all();

    return view('frond.educationDetail', compact('schedule', 'categories', 'categoryTops'));
}











    public function usefulResurs() {

        $usefulresource = UsefulResource::all();

        return view('frond.usefulResurs', compact('usefulresource'));
    }
    public function schoolNews() {

        $posts = Post::all();
        return view('frond.schoolNews',compact('posts'));
    }
    public function gallery() {

        $gallery = Gallery::all();
        return view('frond.gallery',compact('gallery'));
    }
    public function infoGrafika() {

        $infografika = Infografika::all();
        return view('frond.infoGrafika',compact('infografika'));
    }
    public function UseFulResourseDetail($id) {
   $resource = UsefulResource::findOrFail($id);

    return view('frond.UseFulResoursDetail', compact('resource'));
}

    public function connect() {
        $categories = Category::all();
        $categoryTop = CategoryTopp::all();
        $categories = Category::all();
        return view('frond.connect',compact('categories','categoryTop','categories'));
    }

    public function SendEmail(Request $request) {

        $data = $request->all();
        Mail::to('behruzjalolov13@gmail.com')->send(new Message($data));

        return redirect()->route('connect')->with('success', 'Email muvaffaqiyatli yuborildi!');
    }
}
