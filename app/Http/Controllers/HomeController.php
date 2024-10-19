<?php

namespace App\Http\Controllers;
use App\models\Student ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{



    //home
    public function index(){
        return view("student") ;
    }
    public function alreadyExistEmail(Request $request) {
        $patients = DB::table('students')
        ->where('email',$request->email)
        ->first();

        // print(json_encode($patients));

        if($patients === null )
            return response()->json('false', 200);
        else
            return response()->json('true', 200);
    }

    //create
    public function uploaded(Request $request){
        $student = new Student() ;
        $duplicate = $this->alreadyExistEmail($request);

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . "." . $image->getClientOriginalExtension(); // Corrected filename
            $image->move(public_path('student'), $imageName);  // Save image in 'public/student' folder
            $student->image = $imageName;
        }

        $student->save();  // Save student data

        return redirect()->back()->with('success', 'Data submitted successfully!');
    }

    //view
    public function view(){
        $data = student::all() ;
        return view("display",compact("data")) ;
    }

    //delete
    public function delete($id){
        $data = student::find($id) ;
        $data->delete();
        return redirect()->back()->with('success', 'Data deleted successfully!');
    }

    //search
    public function search(Request $request){
            $search = $request->search ;
            $data = student::where("name","like",'%'.$search.'%')->get() ;
            return view("display",compact("data")) ;
    }

    //single view
    public function singleView($id){
        $student = student::find($id) ;
        return view("updateView",compact("student")) ;
    }

    //update
    public function update(Request $request ,$id){
        $student = student::find($id) ;
        $student->name = $request->name;
        $student->email = $request->email;
          // Handle image upload
          if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . "." . $image->getClientOriginalExtension(); // Corrected filename
            $image->move(public_path('student'), $imageName);  // Save image in 'public/student' folder
            $student->image = $imageName;
        }

        $student->save();  // Save student data

        return redirect()->back()->with('success', 'Data updated successfully!');

    }
}
