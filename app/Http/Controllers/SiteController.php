<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function main()
    {
        $products = Product::orderBy('id', 'desc')->get()->take(10);
        return view('pages.index', [
            'products'=>$products
        ]);

    }
    public function about()
    {
        return view('pages.about');
    }
    public function contact()
    {
        return view('pages.contact');
    }
}
