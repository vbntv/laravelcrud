<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Student;

class MainController extends Controller
{   
    public function index(){
        return view('layouts.web');
    }

}
