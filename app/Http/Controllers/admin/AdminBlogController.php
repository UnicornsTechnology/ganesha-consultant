<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class AdminBlogController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:/admin/blog/list', ['only' => ['index']]);
        $this->middleware('permission:/admin/blog/create', ['only' => ['create']]);
        $this->middleware('permission:/admin/blog/view/{id}', ['only' => ['show']]);
        $this->middleware('permission:/admin/blog/edit/{id}', ['only' => ['edit']]);
    }

    public function index()
    {
        $blogs = Blog::where('isActive', 'active')->latest()->paginate(10);
        return view('back/admin/blog/index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back/admin/blog/create');
    }
    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->blog_name = $request->blog_name;
        $blog->blog_date = $request->blog_date;
        $blog->description = $request->description;
        $blog->blog_name_slug = str_replace(" ", "-", strtolower($request->blog_name));


        if ($request->file('image')) {
            $file =  $request->file('image');
            $extension = $file->getclientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/blog_images/', $filename);
            $blog->blog_image = $filename;
        }
        $blog->save();
        return redirect("/admin/blog/list")->with('msg', 'Blog has been created successfully !');
    }
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('back/admin/blog/edit', compact('blog'));
    }
    public function update(Request $request)
    {
        $blog = Blog::find($request->blog_id);

        $blog->blog_name = $request->blog_name;
        $blog->blog_date = $request->blog_date;
        $blog->description = $request->description;
        $blog->blog_name_slug = str_replace(" ", "-", strtolower($request->blog_name));


        if ($request->file('image')) {
            $file =  $request->file('image');
            $extension = $file->getclientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/blog_images/', $filename);
            $blog->blog_image = $filename;
        }
        $blog->save();
        return redirect("/admin/blog/list")->with('msg', 'Blog has been created successfully !');
    }
    public function show($id)
    {
        $blog = Blog::find($id);
        return view('back/admin/blog/view', compact('blog'));
    }
}
