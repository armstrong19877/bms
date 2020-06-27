<?php
namespace App\Http\Controllers\FrontEnd\Testing;
use App\Role;
use App\User;
use App\Student;
use App\Grade;
use App\Result;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Auth;

class PlayController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
      //  $this->middleware('auth.admin');
    }



    public function index()
    {
        $data = DB::table('students')->
        join('results', 'results.u_id', '=', 'students.user_id')->
        select( 'results.session', 'students.s_class', 'results.term', 'results.image', 'students.s_name', 'students.s_email')->get();
        return view('backend.play.index', compact('data'));
    }


     public function get(Request $request, Result $result, $id) 
    {

    $session = Input::get('session');
    $term = Input::get('term');

    $data = Result::where([ 
        ['session', 'LIKE', '%' . $session . '%'],
        ['term', 'LIKE', '%' . $term . '%'],
    ])->find($id);
    return view('backend.play.show', compact('data'));
    }


    public function show(Request $request, $id)
    {
    //    $data = DB::table('users')->
                                                                                                                                                                                                                                                                                                            
    }


}
