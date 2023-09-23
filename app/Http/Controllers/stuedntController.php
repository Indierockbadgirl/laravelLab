<?php

namespace App\Http\Controllers;

use App\Models\students;
use Illuminate\Http\Request;

class stuedntController extends Controller
{
    public function index(){
        $students = students::all();
        $trashStudents = students::onlyTrashed()->get();
        return view('student',compact('students','trashStudents'));
    }
    public function insert(Request $request){
        $new_student = new students();
        $new_student -> stu_name = $request->nameBox;
        $new_student -> age = $request->ageBox;
        $new_student -> grade = $request->gradeBox;
        $new_student->save();
        //$students = students::all();
        return redirect('/students');
        
    }
    public function delete($stu_id){
        $student = students::destroy($stu_id);

        return redirect('/students');
    }
    public function restore($stu_id){
        $student = students::withTrashed()->find($stu_id)->restore();

        return redirect('/students');
    }
    public function forcedelete($stu_id){
        $student = students::withTrashed()->find($stu_id)->forceDelete();

        return redirect('/students');
    }
    public function editForm($stu_id){
        $student = Students::find($stu_id); 
        $studentAll = students::all();
        return view('editFormStudents',compact('student','studentAll'));
    }
    
    public function update(Request $request,$stu_id){
    
        

        $supdate = students::find($stu_id);
        $supdate->id = $request->stu_idedit;
        $supdate-> stu_name= $request->nameBoxedit;
        $supdate->age = $request->ageBoxedit;
        $supdate->grade = $request->gradeBoxedit;
        $supdate->save();
        return redirect('/students'); 
    
    }
}