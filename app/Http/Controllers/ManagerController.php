<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    //
    public function ManagerDashboard(){


        return view('manager.manager_dashboard');


    }
}
