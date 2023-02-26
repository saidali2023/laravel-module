<?php

namespace Modules\Posts\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Posts\Models\Post;
use Route;
use Auth;
use App\Models\AllModule;
use App\Models\UserModule;
use Illuminate\Support\Facades\Gate;
class PostsController extends Controller
{
    public function index()
    {
        if (! Gate::allows('view-module'))
            abort(403);
        
        
        $posts = Post::get();
        $path = config('modules.paths.modules');
        $modulesl = glob($path . '/*', GLOB_ONLYDIR);
        
        return view('posts::index', compact('posts','modulesl'));
    }

    public function create()
    {
        if (! Gate::allows('view-module'))
            abort(403);
        return view('posts::create');
    }

    public function store(Request $request)
    {
        if (! Gate::allows('view-module'))
            abort(403);
        $request->validate([
            'name' => 'required|string'
        ]);

        Post::create([
            'name' => $request->input('name')
        ]);

        return redirect(route('app.posts.index'));
    }

    public function edit($id)
    {
        if (! Gate::allows('view-module'))
            abort(403);
        $post = Post::findOrFail($id);

        return view('posts::edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        if (! Gate::allows('view-module'))
            abort(403);
        $request->validate([
            'name' => 'required|string'
        ]);

        Post::findOrFail($id)->update([
            'name' => $request->input('name')
        ]);

        return redirect(route('app.posts.index'));
    }

    public function destroy($id)
    {
        if (! Gate::allows('view-module'))
            abort(403);
        Post::findOrFail($id)->delete();

        return redirect(route('app.posts.index'));
    }
}
