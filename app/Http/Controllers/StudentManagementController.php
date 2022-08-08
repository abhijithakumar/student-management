<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Students;
use App\Models\Teachers;
use Session;

class StudentManagementController extends Controller
{
    public function addStudentView(Request $request){
        $teachers = Teachers::select('*')->get();
        return view('students.addStudents')->with('teachers',$teachers);
    }
    public function addStudent(Request $request){
        $student = new Students;
        $student->name = $request->name;
        $student->age = $request->age;
        $student->gender = $request->gender;
        $student->teachers_id = $request->teachers;
        $insert = $student->save(); 
        Session::flash('message', 'Student Added Successfully');
        return redirect('add-student');
    }
    public function studentsListView(Request $request){
        $students = DB::table('students')
        ->join('teachers', 'students.teachers_id', '=', 'teachers.id')
        ->select('students.id','students.name','students.age','students.gender', 'teachers.name as reporting_teacher')
        ->get();
        return view('students.studentsList')->with('students', $students);
    }
   
    public function editStudentView(Request $request){
        $students = DB::table('students')
        ->leftJoin('teachers', 'students.teachers_id', '=', 'teachers.id')
        ->select('students.id','students.name','students.age','students.teachers_id','students.gender', 'teachers.name as reporting_teacher')
        ->where('students.id','=',$request->id)
        ->first();
        $teachers = Teachers::select('*')->get();
        return view('students.editStudent')->with('students',$students)->with('teachers',$teachers);
    }
    public function editStudent(Request $request){
         $data['name'] = $request->name;
         $data['age'] = $request->age;
         $data['gender'] = $request->gender;
         $data['teachers_id'] = $request->teachers;
         DB::table('students')
         ->where('id', $request->id)  
         ->update($data);
         Session::flash('message', 'Student Updated Successfully');
         return redirect('students-list-view');
     }

     public function deleteStudent(Request $request){
        DB::table('students')->where('id', $request->id)->delete();
        Session::flash('message', 'Student Deleted Successfully');
         return redirect('students-list-view');
     }
    
}
