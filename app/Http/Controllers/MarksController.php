<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Marks;
use Session;
use DB;

class MarksController extends Controller
{
    public function addMarksView(Request $request){
        $students = Students::select('*')->get();
        return view('marks.addMarks')->with('students',$students);
    }
    public function addMarks(Request $request){
        $marks = new Marks;
        $marks->term = $request->term;
        $marks->maths = $request->maths;
        $marks->science = $request->science;
        $marks->history = $request->history;
        $marks->students_id = $request->students;
        $marks->total_marks = $request->maths + $request->science + $request->history;
        $marks->save(); 
        Session::flash('message', 'Marks Added Successfully');
        return redirect('add-marks');
    }
    public function marksListView(Request $request){
        $marks = DB::table('marks')
        ->join('students', 'marks.students_id', '=', 'students.id')
        ->select('marks.id','students.name','marks.students_id','marks.maths','marks.science', 'marks.history', 'marks.term', 'marks.total_marks')
        ->get();
        return view('marks.marksListView')->with('marks', $marks);
    }
    public function editmarksView(Request $request){
        $marks = DB::table('marks')
        ->join('students', 'marks.students_id', '=', 'students.id')
        ->select('marks.id','students.name','marks.students_id','marks.maths','marks.science', 'marks.history', 'marks.term', 'marks.total_marks')
        ->where('marks.id','=',$request->id)
        ->first();
        $students = Students::select('*')->get();
        return view('marks.editMarks')->with('students',$students)->with('marks',$marks);
    }
    public function editMarks(Request $request){
        $data['term'] = $request->term;
        $data['maths'] = $request->maths;
        $data['science'] = $request->science;
        $data['history'] = $request->history;
        $data['students_id'] = $request->students;
        $data['total_marks'] = $request->maths + $request->science + $request->history;
        DB::table('marks')
        ->where('id', $request->id)  
        ->update($data);
        Session::flash('message', 'Marks Updated Successfully');
        return redirect('marks-list-view');
    }
    public function deleteMarks(Request $request){
        DB::table('marks')->where('id', $request->id)->delete();
        Session::flash('message', 'Marks deleted Successfully');
         return redirect('marks-list-view');
     }
}
