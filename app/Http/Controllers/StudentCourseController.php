<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Courses;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\StudentCourse;
use DataTables;


class StudentCourseController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }
    

    public function index()
    {
        $user_courses = User::with('courses.course')->where('id',Auth::id())->get(); 
        // $user = User::with('courses')->where('id',Auth::id())->get();
        // $data = Courses::latest()->get();
        $data = $user_courses[0]->courses;
        // dd($data);
        return view('student');
    }

    public function getStudentCourses(Request $request)
    {
        if ($request->ajax()) {
            // $data = Courses::latest()->get();
            $user_courses = User::with('courses.course')->where('id',Auth::id())->get(); 
            $data = $user_courses[0]->courses;
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    // $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Add to Favorites</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    $actionBtn = '<a onclick="deleteFavourite('.$row->id.')" class="edit btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'course_id' => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        $studentCourse = StudentCourse::where(['course_id'=> $request->course_id, 'student_id' => Auth::id()])->first();
  
        if (is_null($studentCourse)) {  
            $course_id = $request->course_id;
            $studentCourse = new StudentCourse;
            $studentCourse->student_id = Auth::id();
            $studentCourse->course_id = $request->course_id;
            $studentCourse->save();
            return response()->json(['success'=>'This Course is successfully added']);
        }else{
            return response()->json(['success'=>'This Course is already added']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StudentCourse::where('id', $id)->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
