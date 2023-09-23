<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    public function index()
    {
        // $users = ['John Doe','Jane Smith','Michael Johnson'];
        // $users = lab08::all(); ต้องสร้าง model ถึงจะสามารถดึงข้อมูลจากตารางแบบนี้ได้
        $users = DB::select("SELECT * FROM lab08");
        return view('alluser', compact('users'));
    }
}
 