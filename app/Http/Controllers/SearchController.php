<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Director;
use App\Models\Post;



class SearchController extends Controller
{


    public function search(Request $request)
    {
        $query = $request->input('query');

        $employees = Employee::where('name_uz', 'like', "%{$query}%")
            ->orWhere('email', 'like', "%{$query}%")
            ->get();

        $posts = Post::where('title_uz', 'like', "%{$query}%")
            ->orWhere('body_uz', 'like', "%{$query}%")
            ->get();

        return view('section.search', compact('employees', 'directors', 'posts'));
    }

}