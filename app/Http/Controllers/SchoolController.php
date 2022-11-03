<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;

class SchoolController extends Controller
{
    public function index(){
        //egy a többhöz kapcsolat
        //modelben->belongs to hasmany
        $students = Student::with("course")->get();
        return view("/list_student",[
            "students"=> $students
        ]);
    }

    public function newStudent(){
        return view("new_student");
    }
    

    public function storeStudent(REQUEST $request){
        //get the id
        $course = $request->course;
        $courses = Course::where("name",$course)->get();
        $course_id = 0;
        foreach($courses as $course)
            $course_id = $course->id;


        $student = new Student;
        $student->name=$request->name;
        $student->email=$request->email;
        $student->course_id= $course_id;
        $student->save();

        $request->session()->flash("succes","Sikeres irás");
        return redirect("/");
    }

    public function showStudent(Request $request){
        $name = $request->name;
        //get one student datas from student and course
        $students = Student::with("course")->where("name",$name)->get();
        return view("/list_student",[
            "students"=> $students
        ]);
    }


    public function showUpdateStudent(Request $request){
        $name = $request->name;
        //get one student datas from student and course
        $students = Student::with("course")->where("name",$name)->first();
        return view("/update_student",[
            "student"=> $students
        ]);
    }

    public function updateStudent(Request $request){
        //we get the edited version from request

        $course = $request->course;
        $courses = Course::where("name",$course)->get();
        $course_id = 0;
        foreach($courses as $course)
            $course_id = $course->id;

        //finddal iogy kell kiolvasni a requestből
        //ha whererel keresünk akkor -> és first mert objektumot add vissza
        $student = Student::where("name",$request->name)->first();

        $student ->name = $request->name;
        $student-> email = $request->email;
        $student-> course_id = $course_id;

        $student->save();
        return redirect("/");
    }
}
