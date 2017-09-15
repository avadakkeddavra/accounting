<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product as ProductsModel;

class ProductsController extends Controller
{
    public function index()
    {
        $products = ProductsModel::orderBy('created_at','DESC')->withTrashed()->paginate(10);
        return view('adminlte::products',['products'  => $products] );
    }
}
