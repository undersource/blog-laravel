<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 

use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use App\Models\Article;

use Yaf\Exception\LoadFailed\View;
use http\Client\Response;

class ArticleController extends Controller {
    public function show(Request $request): View {
        $slug = $request->slug;
        $article = Article::where('slug', $slug)->first();
        $user_id = $article->author;
        $user = User::where('id', $user_id)->first();
        $title = $article->title;

        return view('article', compact('title', 'user', 'article'));
    }

    public function add_form(Request $request): View {
        $user = Auth::user();
        $user_role = Role::where('id', $user->role)->first();
        
        if ($user_role->name != 'admin') {
            return abort(403);
        }

        $title = 'Add article';
        $categories = Category::all();

        return view('add', compact('title', 'user', 'categories'));
    }

    public function add(Request $request): RedirectResponse {
        $user = Auth::user();
        $user_role = Role::where('id', $user->role)->first();
        
        if ($user_role->name != 'admin') {
            return abort(403);
        }


        // Validate
        $request->validate([
            'image' => ['required', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'title' => ['required', 'string', 'max:1000'],
            'slug' => ['required', 'string', 'max:50'],
            'content' => ['required', 'string', 'max:50000'],
            'category' => ['required', 'int']
        ]);


        // Collect data
        $image = $request->file('image');
        $title = $request->title;
        $slug = $request->slug;
        $content = $request->content;
        $category = $request->category;
        $author = $user->id;
        $imageName = $slug.'.'.$image->getClientOriginalExtension();
        $imagePath = $image->storeAs('images', $imageName, 'public');


        // Add new article
        $article = new Article;
        $article->image = $imagePath;
        $article->title = $title;
        $article->slug = $slug;
        $article->content = $content;
        $article->category = $category;
        $article->author = $author;
        $article->save();

        return redirect()->route('index');
    }

    public function del(Request $request): Response {
        $user = Auth::user();
        $user_role = Role::where('id', $user->role)->first();
        
        if ($user_role->name != 'admin') {
            return abort(403);
        }

        $article = Article::where('slug', $request->slug)->first();
        File::delete('storage/'.$article->image);
        $article->delete();

        return redirect()->route('index');
    }
}
