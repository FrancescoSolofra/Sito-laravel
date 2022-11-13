<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){ //Pagina index dei prodotti
        $viewData = [];
        $viewData['title'] = "Blog";
        $viewData['subtitle'] = "Lista Blog";
        $viewData['blog'] = Blog::all();
        return view('blog.index')->with('viewData', $viewData);
    }

    public function show($id){
        $viewData = [];
        $blog = Blog::findOrFail($id); //Select del prodotto con id = all'id passato
        $viewData['title'] = $blog->getName();
        $viewData['subtitle'] = $blog->getName();
        $viewData['product'] = $blog;
        return view('blog.show')->with('viewData', $viewData);
    }
}
