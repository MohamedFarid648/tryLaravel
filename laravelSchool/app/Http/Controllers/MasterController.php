<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function getIndex()
    {

        return view('master.welcome');
    }

    public function getLogin()
    {

        return view('master.login');
    }

    public function getRegister()
    {

        return view('master.register');
    }


    public function getAdmin()
    {

        return view('admin.index');
    }
}
