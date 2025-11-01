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


        $categories = Category::all();
        $statictik = Statictik::all();
        $posts = Post::all();
        $HomePageImageTag = HomePageImageTag::all();  // shu qator juda muhim
        $schedule = Schudeli::with('smena')->get();


        return view('index', compact('statictik', 'posts', 'HomePageImageTag','schedule','categories'));
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



    public function leadershep() {
        // Rasmda belgilangan kategoriyalar
        $leaderCategoryNames = [
            "Direktor",
            "Psixolog",
            "Maktab Maslaxatchisi",
            "Chaqiriqgacha Tayyorlash Direktor O'rin Bosari",
            "O'quv ishlari bo'yicha direktor o'rinbosari",
            "Ma'naviy va Ma'rifiy Ishlar bo'yicha direktor o'rin bosari"
        ];

        $teachers = Employee::with(['position', 'category'])
            ->whereHas('category', function ($query) use ($leaderCategoryNames) {
                $query->where(function($q) use ($leaderCategoryNames) {
                    foreach ($leaderCategoryNames as $categoryName) {
                        $q->orWhere('name_uz', $categoryName);
                    }
                    // Ruscha variantlar
                    $q->orWhere('name_ru', 'Директор')
                      ->orWhere('name_ru', 'Психолог')
                      ->orWhere('name_ru', 'Школьный консультант')
                      ->orWhere('name_ru', 'Заместитель директора по предсозывной подготовке')
                      ->orWhere('name_ru', 'Заместитель директора по академической работе')
                      ->orWhere('name_ru', 'Заместитель директора по духовно-просветительской работе');
                });
            })
            ->get();

        return view('frond.leadershep', compact('teachers'));
    }

    public function leaderShepDetail($id) {
        // Rasmda belgilangan kategoriyalar
        $leaderCategoryNames = [
            "Direktor",
            "Psixolog",
            "Maktab Maslaxatchisi",
            "Chaqiriqgacha Tayyorlash Direktor O'rin Bosari",
            "O'quv ishlari bo'yicha direktor o'rinbosari",
            "Ma'naviy va Ma'rifiy Ishlar bo'yicha direktor o'rin bosari"
        ];

        $teacher = Employee::with(['position', 'category'])
            ->whereHas('category', function ($query) use ($leaderCategoryNames) {
                $query->where(function($q) use ($leaderCategoryNames) {
                    foreach ($leaderCategoryNames as $categoryName) {
                        $q->orWhere('name_uz', $categoryName);
                    }
                    // Ruscha variantlar
                    $q->orWhere('name_ru', 'Директор')
                      ->orWhere('name_ru', 'Психолог')
                      ->orWhere('name_ru', 'Школьный консультант')
                      ->orWhere('name_ru', 'Заместитель директора по предсозывной подготовке')
                      ->orWhere('name_ru', 'Заместитель директора по академической работе')
                      ->orWhere('name_ru', 'Заместитель директора по духовно-просветительской работе');
                });
            })
            ->findOrFail($id);

        return view('frond.LeaderShepDeatil', compact('teacher'));
    }







    public function teachers(Request $request)
    {
        $query = $request->input('query');

        // variantlarni hisobga olamiz: apostrof/kovichka farqlari bo'lishi mumkin
        $teacherCategoryNames = [
            "O'qituvchi",  // ascii apostrof
            "O`qituvchi",  // backtick variant
            "O'qituvchi",  // unicode left single quote
            "O'qituvchi",  // unicode right single quote
            "Oqituvchi",   // ehtimol apostrofsiz
            "Oʻqituvchi",  // boshqacha unicode
        ];


        $teachersQuery = Employee::with(['position', 'category'])
            // faqat empCategory nomi "O'qituvchi"ga teng bo'lganlar
            ->whereHas('category', function ($q) use ($teacherCategoryNames) {
                $q->where(function($qq) use ($teacherCategoryNames) {
                    foreach ($teacherCategoryNames as $categoryName) {
                        $qq->orWhere('name_uz', $categoryName);
                    }
                    $qq->orWhere('name_ru', 'Учитель');
                });
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

    public function teacherDetail($id) {
        $teacherCategoryNames = [
            "O'qituvchi",
            "O`qituvchi",
            "O'qituvchi",
            "O'qituvchi",
            "Oqituvchi",
            "Oʻqituvchi",
        ];

        $teacher = Employee::with(['position', 'category'])
            ->whereHas('category', function ($q) use ($teacherCategoryNames) {
                $q->where(function($qq) use ($teacherCategoryNames) {
                    foreach ($teacherCategoryNames as $categoryName) {
                        $qq->orWhere('name_uz', $categoryName);
                    }
                    $qq->orWhere('name_ru', 'Учитель');
                });
            })
            ->findOrFail($id);

        return view('frond.teacherDetail', compact('teacher'));
    }


    public function rekvizit() {

        return view('frond.rekvizit');
    }


    public function educationByCategory($slug)
    {
        $category = empCategory::where('slug', $slug)->firstOrFail();

        $teachers = Employee::where('emp_category_id', $category->id)->get();

        return view('frontend.pages.education_by_category', compact('category', 'teachers'));
    }

    public function schoolNews(){
        $posts = Post::latest()->take(3)->get();
        return view('frond.schoolNews',compact('posts'));
    }
    public function newsDetail($id){
        $post = Post::findOrFail($id); // bu yerda bitta post olinadi
        return view('frond.newsDetail', compact('post'));
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

    public function gallery() {

        $gallery = Gallery::all();
        return view('frond.gallery',compact('gallery'));
    }
    public function infoGrafika() {

        $infografika = Infografika::all();
        return view('frond.infoGrafika',compact('infografika'));
    }
    public function usefulResourceDetail($id)
    {
        $resource = UsefulResource::where('id', $id)->firstOrFail();
        return view('frond.usefulresoursedetail', compact('resource'));
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
