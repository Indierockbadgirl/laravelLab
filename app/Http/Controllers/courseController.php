<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class courseController extends Controller
{
    public function getCourse($nameCourse)
    {
        return "My course is $nameCourse";
    }
    public function index()
    {
        return "xx";
    }
}
