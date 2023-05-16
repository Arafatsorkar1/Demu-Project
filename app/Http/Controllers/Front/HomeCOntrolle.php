<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class HomeCOntrolle extends Controller
{
    public  function Home()
    {
        return view('Fornt.home.home');
    }

    public function pageOne($slug)
    {
        $category =  Category::where('slug',$slug)->first();


        $products = Product::where('category_id',$category->id)->latest()->get();
        return view('Fornt.home.page_one', compact('category','products'));


    }
}
