<?php
namespace App\Http\Controllers\Teacher;

use App\Teacher;
use DB;
use App\Grade;
use App\Role;
use Auth;
use Illuminate\Support\Facades\Storage;
use App\FileUpload;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;

class AuthTeacherController extends Controller
{
    use RegistersUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
       // $this->middleware('auth.basic');
        //$this->middleware('auth.admin');
    }


     public function show(Teacher $teacher, $id)
    {   
        if (Auth::user()->id == $id) {
            return redirect()->route('admin.users.index')->with('warning', 'You are not allowed to edit yourself');
        }
        $teacher = Auth::user()->teacher;
       // dd($student);
        return view('backend.teacher.authteacher.show', compact('teacher'));
    }


    //editing teacher
   public function edit($id)
    {
       if (Auth::user()->id == $id) {
            return redirect()->route('admin.users.index')->with('warning', 'You are not allowed to edit yourself');
        }
        $teacher = Auth::user()->teacher;
       // dd($student);
        return view('backend.teacher.authteacher.edit', compact('teacher'));
    }


     //updating teacher
    public function update(Request $request, Teacher $teacher, $id)
    {


        $validatedData = $request->validate([
        'name'      => 'required|min:2',
       // 'email'     => 'required|email|unique:users|max:70',
        'password'  => 'required|confirmed|min:1',
        'state' => 'required',
        'dob' => 'required',
        'image' => 'required|mimes:jpeg,bmp,png,jpg,x-png',
    ]);
   
        $data = Auth::user();
        $data->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'image' => $request['image'],
            'password' => Hash::make($request['password']),
             'image' => FileUpload::photo($request, 'image'),

        ]);

         $data->teacher()->update([
            'dob' => $request['dob'],
            'state' => $request['state'],
        ]);

        return redirect()->route('staff.show', $data->name);
    }



}
