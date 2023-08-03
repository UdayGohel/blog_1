<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\bloguser;
use App\Models\Category;
use Illuminate\Support\Facades\Session;


class Manageblog extends Controller
{
    //
    public function blog()
    {
        $s = bloguser::where('user_id', '=', Session::get('loginId'))->first();
        $x = Category::get();
        $b = DB::table('bloguser')->join('posts', 'user_id', '=', 'author_id')->join('category', 'category_id', '=', 'id')->select('firstname', 'posts.*', 'title', 'description', 'id', 'avatar_src')->paginate(6);
        // dd($b);
        return view('blog', compact('b', 's', 'x'));
        // dd($b);
    }
    public function category_post($id)
    {
        $b = DB::table('posts')->join('category', 'category_id', '=', 'id')->join('bloguser', 'user_id', '=', 'author_id')->where('category_id', '=', $id)->get();
        $c = Category::where('id', '=', $id)->first();
        return view('category-posts', compact('b', 'c'));
        // dd($c);
    }
    public function single_post($no)
    {
        $b = DB::table('posts')->join('category', 'category_id', '=', 'id')->join('bloguser', 'user_id', '=', 'author_id')->where('post_id', '=', $no)->get();
        return view('post', compact('b'));
        // dd($b);
    }

    public function about_us()
    {
        $s = bloguser::where('user_id', '=', Session::get('loginId'))->first();
        return view('about', compact('s'));
    }
    public function service()
    {
        return view('service');
    }
    public function contact()
    {
        return view('contact');
    }
    public function search(Request $request)
    {
        $s = bloguser::where('user_id', '=', Session::get('loginId'))->first();
        $x = Category::get();
        if (isset($_GET['search'])) {
            // $search = $_GET['search'];
            $search = $request['search'];
            // dd($search);
            $b = DB::table('bloguser')->join('posts', 'user_id', '=', 'author_id')->join('category', 'category_id', '=', 'id')->select('bloguser.*', 'posts.*', 'category.*')->where('post_title', 'LIKE', "%$search%")->orWhere('firstname', 'LIKE', "%$search%")->paginate(6);
            return view('blog', compact('b', 's', 'x'));
        }
    }
}
