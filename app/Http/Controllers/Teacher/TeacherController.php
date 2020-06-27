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

class TeacherController extends Controller
{
    use RegistersUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       // $this->middleware('auth');
       // $this->middleware('auth.basic');
        $this->middleware('auth.admin');
    }


    public function index()
    {
         $grades = Grade::all();

    $p = Input::get('p');

    $data = Teacher::where([ 
        ['class', 'LIKE', '%' . $p . '%'],
    ])->get();


        $datas = User::with('teacher')->get();
       // $users = User::all();
        return view('backend.teacher.teacher.index', compact('data', 'datas', 'grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm(Request $request)
    {
         $classes = Grade::all();
        return view('backend/teacher.teacher.showRegistrationForm', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'image' => $request['image'],
            'password' => Hash::make($request['password']),
             'image' => FileUpload::photo($request, 'image'),

        ]);

          $user->teacher()->createMany(array([
            'sex' => $request['sex'],
            'phone' => $request['phone'],
            'dob' => $request['dob'],
            'add' => $request['add'],
            'state' => $request['state'],
            'class' => $request['class'],
        ]));   

        $role = Role::select('id')->where('name', 'teacher')->first();

        $user->roles()->attach($role);
        
        return redirect()->route('teacher.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher, $id)
    {
         if (Auth::user()->id == $id) {
            return redirect()->route('admin.users.index')->with('warning', 'You are not allowed to edit yourself');
        }

       $user = User::find($id);
       // dd($student);
        return view('backend.teacher.teacher.show', compact( 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher, $id)
    {
         if (Auth::user()->id == $id) {
            return redirect()->route('admin.users.index')->with('warning', 'You are not allowed to edit yourself');
        }

       $user = User::find($id);
       // dd($student);
        return view('backend.teacher.teacher.edit', compact( 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher, $id)
    {
        if (Auth::user()->id == $id) {
            return redirect()->route('admin.users.index')->with('warning', 'You are not allowed to edit yourself');
        }

       $user = User::find($id);

        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'image' => $request['image'],
            'password' => Hash::make($request['password']),
             'image' => FileUpload::photo($request, 'image'),

        ]);

         $user->teacher()->update([
            'sex' => $request['dob'],
            'state' => $request['state'],
        ]);

        return redirect()->route('teacher.show', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher, $id)
    {
         if (Auth::user()->id == $id) {
            return redirect()->route('admin.users.index')->with('warning', 'You are not allowed to delete yourself');
        }
        
          $user = User::find($id);
            if($user){
            $user->roles()->detach();
            $user->teacher->delete();
            $user->delete();
            return redirect()->route('teacher.list');
          }
            return redirect()->route('teacher.list');
    }
}
