<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    /**
     *
     * Display the users table list
     *
     * @return Respose
    */
    public function index()
    {
        $data = UserModel::orderBy('created_at','DESC')->withTrashed()->get();
        return view('adminlte::users',['users' => $data]);
    }

    public function showUserPage(UserModel $user)
    {
        if(\Auth::user()->id == $user->id || \Auth::user()->isAdmin())
        {
            $user_id = $user->id;

            $products = DB::table('products')->select(DB::raw("products.name, products.price, users_products.created_at, count(*) as CountProd"))
            ->join('users_products','products.id','=','users_products.product_id')
            ->where('users_products.user_id','=',$user_id)
            ->groupBy('products.name', 'products.price', 'users_products.created_at')->orderBy('users_products.created_at','DESC')->get();

            $stats = DB::table('users_products')->select(DB::raw("users_products.created_at, count(*) as DateCount"))
                ->where('user_id','=',$user_id)->groupBy('created_at')->get();

            $stats_for_prod = DB::table('products')->select(DB::raw("products.price, users_products.created_at, count(*) as CountProd"))
                ->join('users_products','products.id','=','users_products.product_id')
                ->where('users_products.user_id','=',$user_id)
                ->groupBy('users_products.created_at')->get();
            print_r($stats_for_prod);
            $total = 0;
            foreach ($products as $product)
            {
                $total = $total+$product->price;
            }
            return view('adminlte::single_user',['user'=> $user, 'products' => $products,'total' => $total,'stats'=>$stats]);
        }else{
            return redirect()->route('home')
                ->with('error', 'You dont have premission');
        }

    }
}
