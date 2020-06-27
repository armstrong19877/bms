<?php

namespace App\Http\Controllers;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function lastId()
    {
        $student = DB::table('students')->latest('id')->first();
        $user = DB::table('users')->latest('id')->first();
        //dd($students);
        return view ('backend.layouts.app', compact('student', 'user'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.student.authstudent.show', compact('student'));
    }
}
