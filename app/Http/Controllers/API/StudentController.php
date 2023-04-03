<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = student::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $validator = Validator::make($request->all(),[
            'name'=> 'required|min:3|max:191',
            'course'=> 'required|max:191',
            'email'=> 'required|email|max:191',
            'phone'=> 'required|min:11|max:11',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'message'=>$validator->messages()
            ],422);

        }
        else{
            $student= new student;
            $student->name =$request ->name;
            $student->course =$request ->course;
            $student->email =$request ->email;
            $student->phone =$request ->phone;
            $student ->save();

            return response()->json([
                'status'=>200,
                'message'=>'student created successfully'
            ],200);//7.30

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
