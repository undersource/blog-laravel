<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Article;

class IndexController extends Controller {
    public function index() {
        $title = 'UNDERGROUND\'s BLOG';
        $admin_role = Role::where('name', 'admin')->first();
        $user = User::where('role', $admin_role->id)->first();
        $articles = Article::latest()->simplePaginate(3);

        return view('index', compact('title', 'user', 'articles'));
    }
}
