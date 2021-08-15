<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class BlogController extends Controller
{
    public function loginPage()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');


        if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => 1])) {
            $request->session()->regenerate();
            return redirect()->intended('/checkuser');
                }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ]);

    }
    public function checkuser(Request $request)
    {

        if (  Auth::user()->users_role_id == 1) {
            return view('admin.welcome');
        }
        if (  Auth::user()->users_role_id == 2 ) {

            $getBlog = BlogPost::select('blog_posts.*','categories.name')->leftjoin('categories','categories.id','blog_posts.category_id')->where('blog_posts.created_by',Auth::user()->id)->where('blog_posts.status',1)->orderBy('blog_posts.id','DESC')->get();
            $getCategory = Category::where('status',1)->get();

            return view('/home/welcome', ['getBlog' =>$getBlog ,'getCategory' => $getCategory  ]);
        }
    }
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function blogSubmit(Request $request)
    {
        $description = $request->blogDiscription;
        $files = '';
        $file     = $request->file('image');
        if($request->hasfile('image'))
        {
        $destinationPath = 'blog';
        $files = $request->image->getClientOriginalName();
        $request->file('image')->move( $destinationPath,$files);
        }
        $category = $request->category;
        $insertBlog = new BlogPost;
        $insertBlog->discription = $description;
        $insertBlog->category_id = $category;
        $insertBlog->photo =   $files;
        $insertBlog->status =   1;
        $insertBlog->created_by =   Auth::user()->id;
        $insertBlog->updated_by =   Auth::user()->id;
        $insertBlog -> save();
        return redirect()->intended('/checkuser');
    }
    public function delect($id)
    {
        $blogDetails     = BlogPost::destroy($id);
        return redirect()->intended('/checkuser');

    }
    public function edit($id)
    {
        $getCategory = Category::where('status',1)->get();
        $blogDetails     =BlogPost::select('blog_posts.*','categories.name')->leftjoin('categories','categories.id','blog_posts.category_id')->where('blog_posts.created_by',Auth::user()->id)->where('blog_posts.status',1)->orderBy('blog_posts.id','DESC')->where('blog_posts.id',$id)->first();
        return view('/home/edit', ['getBlog' =>$blogDetails ,'getCategory' => $getCategory ]);
    }
    public function blogSubmitedit(Request $request)
    {
        $description = $request->blogDiscription;
        $id = $request->id;
        $file     = $request->file('image');
        if($request->hasfile('image'))
        {
        $destinationPath = 'blog';
        $files = $request->image->getClientOriginalName();
        $request->file('image')->move( $destinationPath,$files);
        }
        $category = $request->category;
        $insertBlog = BlogPost::findOrFail($id);
        $insertBlog->discription = $description;
        $insertBlog->category_id = $category;
        if ($file) {
            $insertBlog->photo =   $files;
        }
        $insertBlog->status =   1;
        $insertBlog->updated_by =   Auth::user()->id;
        $insertBlog -> save();
        return redirect()->intended('/checkuser');
        
    }
}
