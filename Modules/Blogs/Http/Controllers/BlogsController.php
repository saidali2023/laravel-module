<?php

namespace Modules\Blogs\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blogs\Models\Blog;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = Blog::get();

        return view('blogs::index', compact('blogs'));
    }

    public function create()
    {
        return view('blogs::create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        Blog::create([
            'name' => $request->input('name')
        ]);

        return redirect(route('app.blogs.index'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        return view('blogs::edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        Blog::findOrFail($id)->update([
            'name' => $request->input('name')
        ]);

        return redirect(route('app.blogs.index'));
    }

    public function destroy($id)
    {
        Blog::findOrFail($id)->delete();

        return redirect(route('app.blogs.index'));
    }
}
