<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SliderFormRequest;
use Illuminate\Support\Facades\File;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\Brand;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function index()
    {
        return view('frontend.cart.index');
    }
}
