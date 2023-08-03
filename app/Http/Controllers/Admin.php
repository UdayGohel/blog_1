<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bloguser;
use App\Models\Category;
use App\Models\posts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class Admin extends Controller
{
    //
    public function dashboard(Request $request)
    {
        $s = bloguser::where('user_id', '=', Session::get('loginId'))->first();
        if (Session::has('loginId')) {
            if ($s->is_admin === '1') {

                $b = DB::table('bloguser')->join('posts', 'user_id', '=', 'author_id')->select('bloguser.*', 'posts.*')->get();
                // return $b;
                // $p = posts::all();
                // echo "<pre>";
                // print_r($b);
                return view('dashboard', compact('b', 's'));
            } else {
                Auth::logout();
                Session::flush();
                return redirect('signin')->with('fail', 'Please Login With Authorized Email Or Username ! ');
            }
        } else {
            Auth::logout();
            Session::flush();
            return redirect('signin')->with('fail', 'Please Login With Authorized Email Or Username ! ');
        }
    }
    public function AddUser()
    {
        $s = bloguser::where('user_id', '=', Session::get('loginId'))->first();
        if (Session::has('loginId')) {
            if ($s->is_admin === '1') {
                return view('add-user', compact('s'));
            } else {
                Auth::logout();
                Session::flush();
                return redirect('signin')->with('fail', 'Please Login With Authorized Email Or Username ! ');
            }
        } else {
            Auth::logout();
            Session::flush();
            return redirect('/signin')->with('fail', 'Please Login With Authorized Email Or Username ! ');
        }
    }

    public function register(Request $request)
    {

        //  End of Storing Images in database
        $request->validate(
            [
                'firstname' => 'required|string|max:12',
                'lastname' => 'required|string|max:12',
                'username' => 'required|string|max:15',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8|max:16|confirmed',
                'password_confirmation' => 'required',
                'avatar_src' => 'required',
            ]
        );
        // End of Validation 

        $u = bloguser::where('email', '=', $request['email'])->first();
        if ($u === null) {
            // echo "Valid";
            $blog_user = new bloguser;
            $blog_user->firstname = $request['firstname'];
            $blog_user->lastname = $request['lastname'];
            $blog_user->username = $request['username'];
            $blog_user->password = Hash::make($request->Apassword);
            $blog_user->email = $request['email'];
            $image1 = $request->avatar_src;
            $name1 = $image1->getClientOriginalName();
            $image1->storeAs('public/images', $name1);
            $blog_user->avatar_src = $name1;
            $blog_user->is_admin = $request->user_name;
            // dd($blog_user);
            $blog_user->save();

            //  End of Registration Thrugh Validation !! 
            return redirect('/signin')->with(['success' => 'Congratulation ! You have Successfully Registered']);
            //     // echo "<pre>";
            //     // return $blog_user;
            //     // print_r($blog_user->avatar_src);
        } else {
            return back()->withErrors(['msg' => 'Your Email is Already Exists']);
        }
    }
    public function manageuser()
    {
        $s = bloguser::where('user_id', '=', Session::get('loginId'))->first();
        if (Session::has('loginId')) {
            // $data = array();
            if ($s->is_admin === '1') {
                $data = bloguser::paginate(20);
                return view('manage-users', compact('data', 's'));
            } else {
                Auth::logout();
                Session::flush();
                return redirect('signin')->with('fail', 'Please Login With Authorized Email Or Username ! ');
            }
        } else {
            Auth::logout();
            Session::flush();
            return redirect('/signin')->with('fail', 'Please Login With Authorized Email Or Username ! ');
        }
    }
    public function edituser($id)
    {
        $user = bloguser::find($id);
        if (is_null($user)) {
            // not found
            return redirect('/admin/manageUser');
        } else {
            return view('edit-user', compact('user'));
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'firstname' => 'required|string|max:12',
                'lastname' => 'required|string|max:12',
                'edit_admin' => 'required'
            ]
        );

        $blog_user =  bloguser::find($id);
        $blog_user->firstname = $request['firstname'];
        $blog_user->lastname = $request['lastname'];
        $blog_user->is_admin = $request->edit_admin;
        $blog_user->save();
        return redirect('/admin/manageUser')->with(['success' => 'Congratulation ! You have Successfully Updated']);
    }

    public function delete($id)
    {
        $blog_user = bloguser::find($id);
        if (!is_null($blog_user)) {
            $blog_user->delete();
        }
        return back()->with(['success' => 'Congratulation ! You have Successfully Deleted User']);
    }
    public function Addcategory()
    {
        $s = bloguser::where('user_id', '=', Session::get('loginId'))->first();
        if (Session::has('loginId')) {
            // $data = array();
            if ($s->is_admin === '1') {
                return view('add-catagory', compact('s'));
            } else {
                Auth::logout();
                Session::flush();
                return redirect('signin')->with('fail', 'Please Login With Authorized Email Or Username ! ');
            }
        } else {
            Auth::logout();
            Session::flush();
            return redirect('/signin')->with('fail', 'Please Login With Authorized Email Or Username ! ');
        }
    }
    public function category_register(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|string|min:5|max:25',
                'description' => 'required|string|max:200',
            ]
        );
        $u = Category::where('title', '=', $request['title'])->first();
        if ($u === null) {
            $category = new Category;
            $category->title = $request['title'];
            $category->description = $request['description'];
            $category->save();
            return redirect('/admin/dashboard')->with(['success' => 'Congratulation ! You have Successfully Added Category']);
        } else {
            return redirect('/admin/Addcategory')->withErrors(['msg' => 'Title Already Exists !!']);
        }
    }
    public function manage_category()
    {
        $s = bloguser::where('user_id', '=', Session::get('loginId'))->first();
        if (Session::has('loginId')) {
            // $data = array();
            if ($s->is_admin === '1') {
                $data = Category::paginate(20);
                return view('manage-categories', compact('data', 's'));
            } else {
                Auth::logout();
                Session::flush();
                return redirect('signin')->with('fail', 'Please Login With Authorized Email Or Username ! ');
            }
        } else {
            Auth::logout();
            Session::flush();
            return redirect('/signin')->with('fail', 'Please Login With Authorized Email Or Username ! ');
        }
    }
    public function delete_category($id)
    {
        $s = bloguser::where('user_id', '=', Session::get('loginId'))->first();
        if (Session::has('loginId')) {
            // $data = array();
            if ($s->is_admin === '1') {
                $category = Category::find($id);
                if (!is_null($category)) {
                    $category->delete();
                }
                return back()->with(['success' => 'Congratulation ! You have Successfully Deleted User']);
            } else {
                Auth::logout();
                Session::flush();
                return redirect('signin')->with('fail', 'Please Login With Authorized Email Or Username ! ');
            }
        } else {
            Auth::logout();
            Session::flush();
            return redirect('/signin')->with('fail', 'Please Login With Authorized Email Or Username ! ');
        }
    }
    public function edit_category($id)
    {
        $s = bloguser::where('user_id', '=', Session::get('loginId'))->first();
        if (Session::has('loginId')) {
            // $data = array();
            if ($s->is_admin === '1') {
                $data = Category::find($id);
                if (is_null($data)) {
                    // not found
                    return redirect('/admin/managecategory');
                } else {
                    return view('edit-category', compact('data'));
                }
            } else {
                Auth::logout();
                Session::flush();
                return redirect('signin')->with('fail', 'Please Login With Authorized Email Or Username ! ');
            }
        } else {
            Auth::logout();
            Session::flush();
            return redirect('/signin')->with('fail', 'Please Login With Authorized Email Or Username ! ');
        }
    }
    public function update_category(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'required|string|min:5|max:25',
                'description' => 'required|string|max:200',
            ]
        );

        $category =  Category::find($id);
        $category->title = $request['title'];
        $category->description = $request['description'];
        $category->save();
        return redirect('/admin/managecategory')->with(['success' => 'Congratulation ! You have Successfully Updated Category']);
    }

    public function Add_post()
    {
        $s = bloguser::where('user_id', '=', Session::get('loginId'))->first();
        if (Session::has('loginId')) {
            // $data = array();
            if ($s->is_admin === '1') {
                $cat = Category::all();
                return view('add-post', compact('cat', 's'));
            } else {
                return view('edit-category', compact('data'));
            }
        } else {
            Auth::logout();
            Session::flush();
            return redirect('signin')->with('fail', 'Please Login With Authorized Email Or Username ! ');
        }
    }



    public function post_register(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|string|min:5|max:25',
                'category' => 'required',
                // 'checkbox' => 'required',
                'body' => 'required | string | max:500',
                'thumbnail' => 'required|image|mimes:jpg,png,jpeg,gif',

            ]
        );

        $post = new posts;
        $post->post_title = $request['title'];
        $post->body = $request['body'];
        $image1 = $request->thumbnail;
        $name1 = $image1->getClientOriginalName();
        $image1->storeAs('public/images/thumbnail', $name1);
        $post->thumbnail = $name1;
        if ($request->has('checkbox')) {
            $post->is_featured = '1';
        } else {
            $post->is_featured = '0';
        }
        $post->category_id = $request->category;
        $data = array();
        $data = bloguser::where('user_id', '=', Session::get('loginId'))->first();
        $post->author_id = $data->user_id;
        $post->save();
        return redirect('/admin/dashboard')->with(['success' => 'Congratulation ! You have Successfully Post Registered']);

        // echo "<pre>";
        // print_r($post);\
        // dd($post);
    }
    public function editpost($id)
    {
        $data = bloguser::where('user_id', '=', Session::get('loginId'))->first();
        $b = Category::all();
        $post = posts::find($id);
        if (is_null($post)) {
            // not found
            return redirect('/admin/dashboard');
        } else {
            return view('edit-post', compact('post', 'b', 'data'));
        }
    }
    public function update_post(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'required|string|min:5|max:25',
                'category' => 'required',
                // 'checkbox' => 'required',
                'body' => 'required | string | max:500',
                'thumbnail' => 'required|image|mimes:jpg,png,jpeg,gif',

            ]
        );
        $post =  posts::find($id);
        $post->post_title = $request['title'];
        $post->body = $request['body'];
        $image1 = $request->thumbnail;
        $name1 = $image1->getClientOriginalName();
        $image1->storeAs('public/images/thumbnail', $name1);
        $post->thumbnail = $name1;
        if ($request->has('checkbox')) {
            $post->is_featured = '1';
        } else {
            $post->is_featured = '0';
        }
        $post->category_id = $request->category;
        $data = array();
        $data = bloguser::where('user_id', '=', Session::get('loginId'))->first();
        $post->author_id = $data->user_id;
        $post->save();
        return redirect('/admin/dashboard')->with(['success' => 'Congratulation ! You have Successfully Post Registered']);
    }
    public function   deletepost($id)
    {

        $s = bloguser::where('user_id', '=', Session::get('loginId'))->first();
        if (Session::has('loginId')) {
            // $data = array();
            if ($s->is_admin === '1') {
                $post = posts::find($id);
                if (!is_null($post)) {
                    // $post->forceDelete();
                    $post->delete();
                }
                return back()->with(['success' => 'Congratulation ! You have Successfully Deleted User']);
            } else {
                Auth::logout();
                Session::flush();
                return redirect('signin')->with('fail', 'Please Login With Authorized Email Or Username ! ');
            }
        } else {
            Auth::logout();
            Session::flush();
            return redirect('/signin')->with('fail', 'Please Login With Authorized Email Or Username ! ');
        }
    }
}
