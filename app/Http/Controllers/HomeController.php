<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Courses;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_courses = User::with('courses.course')->where('id',Auth::id())->get(); 
        return view('home');
    }

    public function getCourses(Request $request)
    {
        if ($request->ajax()) {
            $data = Courses::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    // $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Add to Favorites</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    $actionBtn = '<a onclick="addtoFavourite('.$row->id.')" class="edit btn btn-success btn-sm">Add to Favorites</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function getAllCourses(Request $request){
        return Courses::latest()->get();
    }
}
