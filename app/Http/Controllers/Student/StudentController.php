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
use Illuminate\Support\Facades\Storage;
use App\FileUpload;
use Illuminate\Support\Facades\Input;


class StudentController extends Controller
{   
    use RegistersUsers;

    protected $redirectTo = '/admin/users';


    public function __construct()
    {
        $this->middleware('auth.admin');
    }


    //show registration form

     public function showRegistrationForm()
    {
        $classes = Grade::all();
        return view('backend/student/auth.register', compact('classes'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $grades = Grade::all();

    $p = Input::get('p');

    $data = Student::where([ 
        ['s_class', 'LIKE', '%' . $p . '%'],
    ])->get();


        $datas = Student::with('user')->get();
      //   $student = DB::table('students')->latest('id')->first();
        //$user = DB::table('users')->latest('id')->first();
        $users = User::all();
        return view('backend.student.index', compact('data', 'users','datas', 'grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //create scholar

    public function create( Request $request)
    {


        /*
       $validate = \Validator::make($request->all(), [
       // 's_name'      => 'required|min:2',
        'name'      => 'required|min:2',
        'email'     => 'required|email|unique:users|max:70',
        'password'  => 'required|confirmed|min:1',
       // 'class' => 'required',
        'sex' => 'required',
        'phone' => 'required|max:14',
        'p_name' => 'required|min:3',
        'reg_no' => 'required|min:2',
        'dob' => 'required',
        'lg' => 'required|min:2',
        'add' => 'required|min:3',
        'reg_date' => 'required',
        'nation' => 'required',
        'class' => 'required',
       // 'student_id' => 'required',
        'image' => 'required|mimes:jpeg,bmp,png,jpg,x-png'
    ]);
    if( $validate->fails()){
        return redirect()
        ->back()
        ->withErrors($validate);
    }
   /*
    $user = new User();
        $user-> password = bcrypt($request->password);
        $user->email = $request->email;
        $user->name = $request->name;
        //$user->class = $request->class;
        

         // saving image

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time().'.'. $extension;
            $file->move('uploads/photos/', $filename);
            $user->image = $filename;

            //$id = $user->id;
        }
        else {
           return $request;
           $user->image = '';
        }

        //finish saving image.

            $user->save();

       // $student = new Student();
        $student->sex = $request->sex;
        $student->phone = $request->phone;
     //   $student->user_id = $user->id;   //in student_user_table
        $student->p_name = $request->p_name;
        $student->reg_no = $request->reg_no;
        $student->dob = $request->dob;
        $student->lg = $request->lg;
        $student->add = $request->add;
        $student->reg_date = $request->reg_date;
        $student->nation = $request->nation;
        $student->state = $request->state;
        $student->s_class = $request->s_class;
       // $student->s_email = $user->email;
       // $student->s_image = $request->s_image;
       // $student->s_name = $user->name;
       // $student->class = $request->class;
       */

         $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'image' => $request['image'],
            'password' => Hash::make($request['password']),
             'image' => FileUpload::photo($request, 'image'),

        ]);

          $user->student()->createMany(array([
            'sex' => $request['sex'],
            'phone' => $request['phone'],
            'p_name' => $request['p_name'],
            'reg_no' => $request['reg_no'],
            'dob' => $request['dob'],
            'lg' => $request['lg'],
            'add' => $request['add'],
            'reg_date' => $request['reg_date'],
            'nation' => $request['nation'],
            'state' => $request['state'],
            's_class' => $request['s_class'],
        ]));

        //$user->students->saveMany($student);    

        $role = Role::select('id')->where('name', 'scholar')->first();

        $user->roles()->attach($role);
        
        return redirect()->route('student.list');
    }

    public function showRegisterForm()
    {
        $grades = Grade::all();
        return view('backend/student/auth.register', compact('grades'));
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

     public function show(Student $student, User $user, $id)
    {   
        if (Auth::user()->id == $id) {
            return redirect()->route('admin.users.index')->with('warning', 'You are not allowed to edit yourself');
        }

       $user = User::find($id);
       // dd($student);
        return view('backend/student.show', compact( 'user'));
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

       $user = User::find($id);
       // dd($student);
        return view('backend/student.edit', compact( 'user')); 
    }
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */

    //updating scholar

    public function update(Request $request, Student $student, $id)
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

         $user->student()->update([
            'sex' => $request['dob'],
            'phone' => $request['nation'],
        ]);

        return redirect()->route('student.show', $user->id);
       // dd($student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student, $id)
    {
         if (Auth::user()->id == $id) {
            return redirect()->route('admin.users.index')->with('warning', 'You are not allowed to delete yourself');
        }
        
          $user = User::find($id);
            if($user){
            $user->roles()->detach();
            $user->student->delete();
            $user->delete();
            return redirect()->route('student.list');
          }
            return redirect()->route('student.list');
    }
    
}
