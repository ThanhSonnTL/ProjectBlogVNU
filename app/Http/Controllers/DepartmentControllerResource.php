<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentControllerResource extends Controller
{
    public function index()
    {
        //Get all 
        $data = Department::get();
        return view('admin.DepartmentManage.index')->with('data', $data);
    }
    public function create()
    {
        // Show the form for creating a new 
        return view('admin.DepartmentManage.add');
    }
    public function Store(Request $request)
    {

        $object = new Department();
        $object->department_name = $request->department_name;
        $object->department_desc = $request->department_desc;
        $object->department_imgURL = $request->department_imgURL;
        $object->save();
        return redirect()->route('department.index');
    }
    public function destroy($department_ID)
    {
        $object =Department::where('department_ID','=',$department_ID)->delete();
        return redirect()->route('department.index')->with('mess', 'Thành công');
    }
    public function edit($department_ID)
    {
        $object =Department::where('department_ID','=',$department_ID)->get();
        return view('admin.DepartmentManage.edit',['data' => $object]);
    }
    public function update(Request $request,$department_ID)
    {
        $object = Department::where('department_ID','=',$department_ID)
        ->update([  
            'department_name' => $request->department_name,
            'department_desc' => $request->department_desc,
            'department_imgURL' => $request->department_imgURL,
        ]);
        return redirect()->route('department.index');
        
    }

}
