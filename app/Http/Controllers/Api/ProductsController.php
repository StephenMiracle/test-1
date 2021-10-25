<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{

    public function index(Request $request)
    {
        $userID = Auth::id();

        $products = Product::where("user_id", $userID)->get();

        return $products;
    }
}
