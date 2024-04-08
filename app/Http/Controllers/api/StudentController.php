<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
      $students = Student::all();
      if ($students->count() > 0) {
        return response()->json([
          'studens'=>$students,
          'status code'=>200
        ],200);
      }else {
        return response()->json([
          'message'=>'No Data Found!',
          'status code'=>404
        ],404);
      }
    }
    public function store(Request $req){
        $validator = Validator::make($req->all(),[
          'name' => 'require|string|max:200',
          'course' => 'require|string|max:200',
          'email' => 'require|email|max:200',
          'phone' => 'require|digit|max:10'
        ])

        if ($validator->fail()) {
          return 
        }
    }

}
