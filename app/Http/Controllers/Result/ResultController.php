<?php

namespace App\Http\Controllers\Result;
use App\User;
use App\Student;
use App\Result;
use App\Grade;
use PDF;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class ResultController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth.admin');
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
    return view('backend.result.index', compact('data', 'grades'));

    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*    show result form   */
    public function rshow(Request $request, $id)
    {
        $result = new Result();   
        $student = Student::all();
        $student->user_id = $result->u_id;
        $student = Student::find($id);
        


        return view('backend/result.createResultForm', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = \Validator::make($request->all(), [
        'term'      => 'required',
        'session'     => 'required',
         'image' => 'required|mimes:jpeg,bmp,png,jpg,x-png',
         'u_id' => 'required'
            ]);

        $users = User::all();


         $results = new Result();
        $results->term = $request->term;
        $results->session = $request->session;
        $results->u_id = $request->u_id;
        


       // $users->id = $results->user_id;         //when adding more table
         // saving image
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time().'.'. $extension;
            $file->move('uploads/results/', $filename);
            $results->image = $filename;
        }
        else {
           return $request;
           $results->image = '';
        }

        //finish saving image.

            $results->save();

            return redirect()->route('result.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result) {
    
            //
    }


    public function result_check()
    {  
        return view('backend.result.resultcheck');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        //
    }
}
