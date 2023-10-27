<?php

namespace App\Controllers;
use App\Models\UserModel ;
class AdminDashboardController extends BaseController
{
    public function index(){
        // echo "Admin dashboard";
        // $model = new UserModel();
        // $users = $model->findAll();

       return view('admin_dashboard/dashboard');
    }

    public function users(){
        // echo "Admin dashboard";
        $model = new UserModel();
        $users = $model->findAll();

       return view('admin_dashboard/users',['users'=>$users]);
    }

}