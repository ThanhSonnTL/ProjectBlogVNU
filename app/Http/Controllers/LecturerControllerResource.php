<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecturer;
use App\Models\Department;

use Illuminate\Support\Facades\DB;

class LecturerControllerResource extends Controller
{
    public function index(Request $request)
    {
        $data = Lecturer::get();
        $department_title = array();      
        $department_title = DB::select('SELECT departments.department_name FROM `departments`,`lecturers` WHERE lecturers.department_ID = departments.department_ID');  
        return view('admin.LecturerManage.index',['data' => $data,'department_title'=>$department_title]);
        
    }
    public function create()
    {
        
        $Department_name = Department::get();
        // Show the form for creating a new blog.
        return view('admin.LecturerManage.add', ['department_name' => $Department_name]);

    }
    public function store(Request $request)
    {
        $object = new Lecturer();
        $object->lecturer_name = $request->lecturer_name;
        $object->lecturer_gender = $request->lecturer_gender;
        $object->lecturer_email = $request->lecturer_email;

        $img = $request->file('lecturer_imgURL');

        $storePathIMG = $img->move('lecturer_imgURL',$img->getClientOriginalName());
         
        $object->lecturer_imgURL = $storePathIMG;
        $object->department_ID = $request->department_name;
        $object->save();
        
        return redirect()->route('lecturer.index');

    }
    public function destroy($lecturer_ID)
    {
        $Lecturer =Lecturer::where('lecturer_ID','=',$lecturer_ID)->delete();
        return redirect()->route('lecturer.index')->with('mess', 'Thành công');
    }
    public function edit($lecturer_ID)
    {
        $Lecturer =Lecturer::where('lecturer_ID','=',$lecturer_ID)->get();
        $Department_name = Department::get();
       
        return view('admin.LecturerManage.edit',['data' => $Lecturer,'department_name'=>$Department_name]);
    }
    public function update(Request $request,$lecturer_ID)
    {
        $img = $request->file('lecturer_imgURL');

        $storePathIMG = $img->move('lecturer_imgURL',$img->getClientOriginalName());
         
        $Lecturer = Lecturer::where('lecturer_ID','=',$lecturer_ID)
        ->update([  
            'lecturer_name' => $request->lecturer_name,
            'lecturer_gender' => $request->lecturer_gender,
            'lecturer_email' => $request->lecturer_email,
            'lecturer_imgURL' => $request->lecturer_imgURL,
            'department_ID' => $storePathIMG
        ]);
        return redirect()->route('lecturer.index');
        
    }

}
