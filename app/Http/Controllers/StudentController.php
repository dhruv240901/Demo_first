<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Standard;
use App\Models\Gender;

class StudentController extends Controller
{
    public function index(){
        $students=Student::get();
        return view('index',compact('students'));
    }

    public function addstudent(){
        $standard=Standard::get();
        $gender=Gender::get();
        return view('addstudent',compact('standard','gender'));
    }

    public function storestudent(Request $request){
        $validated = $request->validate([
            'name'=>'required',
            'phone'=>'required|max:10',
            'email'=>'required',
            'address'=>'required|max:50',
        ]);

        $insertdata=[
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'address'=>$request->address,
            'standard_id'=>$request->standard,
            'gender_id'=>$request->gender
        ];
        if($request->hasfile('image'))
        {
            $file=$request->file('image');
            // $extension=$file->getClientOriginalExtension();
            $name=$file->getClientOriginalName();
            $filename = pathinfo($name, PATHINFO_FILENAME);
            $extension = pathinfo($name, PATHINFO_EXTENSION);
            date_default_timezone_set('Asia/Kolkata');
            $date = date('dmYhisa', time());
            $filename=($date.'_'.$filename.'.'.$extension);
            $file->move('student/',$filename);
            $insertdata['image']=$filename;
        }
        Student::create($insertdata);
        return redirect('/')->with('success','Student added successfully');
    }

    public function showstudent(Request $request){
        $student=Student::where('id',$request->id)->first();
        return view('showstudent',compact('student'));
    }

    public function editstudent(Request $request){

        $student=Student::where('id',$request->id)->first();
        $standard=Standard::get();
        $gender=Gender::get();
        return view('editstudent',compact('student','standard','gender'));
    }

    public function updatestudent(Request $request){
        $student=Student::findOrFail($request->id);
        $validated = $request->validate([
            'name'=>'required',
            'phone'=>'required|max:10',
            'email'=>'required',
            'address'=>'required|max:50'
        ]);
        $updatedata=[
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'address'=>$request->address,
            'standard_id'=>$request->standard,
            'gender_id'=>$request->gender
        ];
        if($request->hasfile('image'))
        {
            $file=$request->file('image');
            // $extension=$file->getClientOriginalExtension();
            $name=$file->getClientOriginalName();
            $filename = pathinfo($name, PATHINFO_FILENAME);
            $extension = pathinfo($name, PATHINFO_EXTENSION);
            date_default_timezone_set('Asia/Kolkata');
            $date = date('dmYhisa', time());
            $filename=($date.'_'.$filename.'.'.$extension);
            $file->move('student/',$filename);
            $updatedata['image']=$filename;
        }
        $student->update($updatedata);
        return redirect('/')->with('success','Student edited successfully');
    }

    public function deletestudent($id)
    {
        $contact = Student::findOrFail($id);
        $contact->delete();
        return back()->with('success', 'Student deleted successfully');
    }

}
