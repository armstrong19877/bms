<?php

namespace App\Http\Controllers\Admin;
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

class AdminRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/users';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
   /*
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    */

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    //protected function create(array $data)
    public function create( Request $request)
    {
       $validate = \Validator::make($request->all(), [
        'name'      => 'required|min:2',
        'email'     => 'required|email|unique:users|max:70',
        'password'  => 'required|confirmed|min:1',
        'class' => 'required',
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
        'image' => 'required|mimes:jpeg,bmp,png,jpg,x-png'
    ]);
    if( $validate->fails()){
        return redirect()
        ->back()
        ->withErrors($validate);
    }
    $user = new User();
        $user-> password = bcrypt($request->password);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->class = $request->class;
    

         // saving image

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time().'.'. $extension;
            $file->move('uploads/photos/', $filename);
            $user->image = $filename;
        }
        else {
           return $request;
           $user->image = '';
        }

        //finish saving image.


            $user->save();

        
        $student = new Student();
        $student->sex = $request->sex;
        $student->phone = $request->phone;
        $student->user_id = $user->id;
        $student->p_name = $request->p_name;
        $student->reg_no = $request->reg_no;
        $student->dob = $request->dob;
        $student->lg = $request->lg;
        $student->add = $request->add;
        $student->reg_date = $request->reg_date;
        $student->nation = $request->nation;
        $student->state = $request->state;
        $student->class = $request->class;


       


        $student->save();    

        $role = Role::select('id')->where('name', 'scholar')->first();

        $user->roles()->attach($role);

        return redirect()->route('student.list');
    }

    public function showRegistrationForm()
    {
        $grades = Grade::all();
        return view('backend/student/auth.register', compact('grades'));
    }



/*
    public function show(Student $student)
    {
        //$student=User::where('student')->get();
         //$student = Student::find('user_id', auth()->user()->id)->get();
         //$student = Student::find('user_id', auth()->user()->id);
        return view('backend/admin.home', compact('student'));
    }

*/




    //still trying

/*
     public function show(Student $student, $id)
    {
       // $student = new Student();
       // $user->id =  $student->user_id;

        //return view('backend.admin.home')->with(['user' => User::find($id), 'students' => student::all()]);


           // $user = User::find($student->student->user_id);


        $user = new User();
        $student = new Student();

        $userId = Auth::user()->id;

        //$user = User::find($student->student->user_id);
        $student = Student::where('user_id', $userId)->get();
        return view('backend.admin.home', compact('student', 'user'));
    }
*/



     public function index()
    {
        $students = \App\Student::latest()->paginate(3);
        return view('backend/student.index', compact('students'));

       // return view('backend.student.index')->with('students',Student::paginate(2));
    }

/*
    public function show($id)
    {   
        $student = new Student();
        $student->user_id = Auth::user()->id;
        $student = Student::find($id);

        return view('backend/student.show', compact('student'));
    }
   */


     public function edit($id)
    {
        /*
        if (Auth::user()->id == $id) {
            return redirect()->route('admin.users.index')->with('warning', 'You are not allowed to edit yourself');
        }

        */

        $students = Student::all();
        $users = User::find($id);
        $students->user_id = $users->id;
        return view('backend.student.edit', compact('students', 'users'));
    }


    public function updated(Request $request, $id)
    {
        if (Auth::user()->id == $id) {
            return redirect()->route('admin.users.index')->with('warning', 'You are not allowed to edit yourself');
        }
        $student = Student::find($id);
        //$user->roles()->sync($request->roles);
        return redirect()->route('admin.users.index')->with('success', 'User has been updated');
    }
}
