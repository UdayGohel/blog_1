<?php

namespace App\Http\Controllers;

use App\Models\bloguser;
use App\Models\Category;
use App\Models\posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SadminController extends Controller
{
    //
    public function showDashboard()
    {
        $adminCount = bloguser::where('is_admin', '=', '1')->count();
        $userCount  = bloguser::where('is_admin', '=', '0')->count();
        $categoryCount  = Category::count();
        $postCount = posts::count();

        return view("super_admin.admin_dash", compact('adminCount', 'userCount', 'categoryCount', 'postCount'));
    }

    public function manageAdmin()
    {
        $showAdmin =  bloguser::where('is_admin', '=', '1')->get();

        $postCount = DB::table('bloguser')->join('posts', 'user_id', '=', 'author_id')->select('posts.*')->count();
        $count = 1;
        // dd($postCount);
        return view('super_admin.adminTable', compact('showAdmin', 'count'));
    }
}