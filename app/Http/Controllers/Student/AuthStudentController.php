<?php

namespace App\Http\Controllers\Student;
use App\Role;
use App\User;
use App\Student;
use App\Grade;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\FileUpload;


class AuthStudentController extends Controller
{   
    use RegistersUsers;

    protected $redirectTo = '/check/result';


    public function __construct()
    {
       // $this->middleware('auth.admin');
       // $this->middleware('auth.basic');
        $this->middleware('auth');
    }


    //show registration form

     public function showRegistrationForm()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Student $student)
    {   
       //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //create scholar

    public function create( Request $request)
    {
      //
    }

    public function showRegisterForm()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */

     public function show(Student $student, $id)
    {   
        if (Auth::user()->id == $id) {
            return redirect()->route('admin.users.index')->with('warning', 'You are not allowed to edit yourself');
        }
        $student = Auth::user()->student;
       // dd($student);
        return view('backend.student.authstudent.show', compact('student'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */

    //editing scholar
   public function edit($id)
    {
       if (Auth::user()->id == $id) {
            return redirect()->route('admin.users.index')->with('warning', 'You are not allowed to edit yourself');
        }
        $student = Auth::user()->student;
       // dd($student);
        return view('backend.student.authstudent.edit', compact('student'));
    }
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */

    //updating scholar

    public function update(Request $request, Student $student)
    {
        $data = Auth::user();
        //$data->update($request->all());
        $data->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'image' => $request['image'],
            'password' => Hash::make($request['password']),
             'image' => FileUpload::photo($request, 'image'),

        ]);
        return redirect()->route('scholar.show', $data->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
