<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as UserModel;
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
}
