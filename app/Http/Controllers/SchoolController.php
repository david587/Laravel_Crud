<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;

class SchoolController extends Controller
{
    public function index(){
        return view("new_student");
    }

    public function storeStudent(REQUEST $request){
        //get the id
        $course = $request->course;
        $courses = Course::where("name","php")->get();
        $course_id = 0;
        foreach($courses as $course)
            $course_id = $course->id;


        $student = new Student;
        $student->name=$request->name;
        $student->email=$request->email;
        $student->course_id= $course_id;
        $student->save();

        $request->session()->flash("succes","Sikeres irás");
        return redirect("new Student");
    }
}
