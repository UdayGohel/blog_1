<?php

namespace App\Http\Controllers;

use App\Models\bloguser;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\Demomail;
// use Mail;
// use Session;

class Registration extends Controller
{
    //
    public function index()
    {
        return view('signin');
    }
    public function singup()
    {
        return view('signup');
    }
    public function register(Request $request)
    {

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
            $blog_user->password = Hash::make($request->password);
            $blog_user->email = $request['email'];
            $image = $request->avatar_src;
            $name = $image->getClientOriginalName();
            $image->storeAs('public/images', $name);
            //  End of Storing Images in database
            $blog_user->avatar_src = $name;
            $blog_user->is_admin = '0';
            $blog_user->save();
            // Send Mail for Registration 

            $sendmailData = [
                'title' =>  'Registration Successful',
                'body' => 'Please Login Through Your Registered Email and Password. Happy Reading in Fill Free to Read ',
            ];
            Mail::to($request['email'])->send(new Demomail($sendmailData));
            //  End of Registration Thrugh Validation !! 
            return redirect('/signin')->with(['success' => 'Congratulation ! You have Successfully Registered']);

            // echo "<pre>";
            // return $blog_user;
            // print_r($blog_user->avatar_src);
        } else {
            return back()->withErrors(['msg' => 'Your Email is Already Exists']);
        }
    }
    public function signin(Request $request)
    {
        // Validation for User Login System 

        $request->validate(
            [
                'signin_username' => 'required',
                'signin_password' => 'required',
            ]
        );

        //  Check for Use Exists in Database Through Email 

        $s = bloguser::where('email', '=', $request->signin_username)->first();
        //  Check for Use Exists in Database Through Username 

        $f = bloguser::where('username', '=', $request->signin_username)->first();
        if ($s) {
            if (Hash::check($request->signin_password, $s->password)) {
                // Put a userid as a session variable name 'loginId' in Session
                $request->session()->put('loginId', $s->user_id);
                return redirect('home');
            } else {
                return back()->with('fail', 'Please Enter valid Password');
            }
        } else if ($f) {
            if (Hash::check($request->signin_password, $f->password)) {
                $request->session()->put('loginId', $f->user_id);
                return redirect('/home');
            } else {
                return back()->with('fail', 'Please Enter valid Password');
            }
        } else {
            return back()->with('fail', 'Please Enter valid Details');
        }
    }
    public function mainpage(Request $request)
    {
        if (Session::has('loginId')) {
            $data = array();
            $data = bloguser::where('user_id', '=', Session::get('loginId'))->first();
            $b = DB::table('bloguser')->join('posts', 'user_id', '=', 'author_id')->join('category', 'category_id', '=', 'id')->select('firstname', 'posts.*', 'title', 'description', 'id', 'avatar_src')->paginate(6);
            $c = DB::table('bloguser')->join('posts', 'user_id', '=', 'author_id')->join('category', 'category_id', '=', 'id')->select('bloguser.*', 'posts.*', 'category.*')->where('is_featured', '=', '1')->first();
            // return view('test', compact('c'));
            // echo "<pre>";
            // print_r($data);
            return view('index', compact('data', 'b', 'c'));
        } else {
            return back()->with('fail', 'Please Login First');
        }
    }
    public function logout()
    {
        if (Session::has('loginId')) {
            Auth::logout();
            Session::flush();
            return redirect('signin')->with('success', 'Logout Success !');
        }
        // Session::flush();
        // Auth::logout();
        // return redirect('signin')->with('success', 'Logout Success !');
    }
}
