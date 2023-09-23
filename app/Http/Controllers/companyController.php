<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\companies;
class companyController extends Controller
{
    public function index(){
        $companys = companies::all();
        return view('company',compact('companys'));
    }
}