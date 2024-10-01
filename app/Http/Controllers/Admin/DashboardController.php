<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{   
    public function index(){
        $count_post = Post::count();

       return view('admin.index', compact('count_post'));
    }
}
