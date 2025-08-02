<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slide;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        if (!auth()) {
            redirect()->back();
        }

        $products = Product::active()->get();
        $slides = Slide::active()->orderBy('position', 'ASC')->get();
        $categories = Category::parentCategories()
            ->orderBy('name', 'asc')
            ->get();

        return view('frontend.homepage', compact('products', 'slides', 'categories'));
    }
}
