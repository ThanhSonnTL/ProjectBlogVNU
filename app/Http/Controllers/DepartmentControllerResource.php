<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentControllerResource extends Controller
{
    public function index()
    {
        //Get all 
        $Department = Department::paginate(10);
        return view('DepartmentManage.listDepartment')->with('Departments', $Department);
    }
    public function create()
    {
        // Show the form for creating a new 
        return view('DepartmentManage.addDepartment');
    }
    public function Store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:10'
        ]);
        $result = 'Đăng bài thất bại !';
        $Department = new Department;
        $Department->department_name = $request->title;
        $Department->department_desc = $request->par;
        $Department->department_imgURL = $request->par;
        if ($Category->save())
            $result = 'Đăng bài thành công !';
        return redirect()->route('department-manage.index')->with('mess', 'Thành công');
    }
    public function edit($id)
    {
        // Show the form for creating a new blog.
        $Category = DB::select('select * from departments where department_ID  = ?',[$id]);
        return view('DepartmentManage.editDepartment',['department'=>$Department]);
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|min:10'
        ]);
        $result = 'Đăng bài thất bại !';
        $department_name = $request->title;
        $department_desc = $request->par;
        $department_imgURL = $request->par;
        $Category = DB::select('update departments set department_name  = ?, department_desc = ?, department_imgURL = ? where department_ID = ?',[$department_name,$department_desc,$department_imgURL,$id]);
        return redirect()->route('department-manage.index')->with('mess', 'Thành công');

    }
    public function delete(Request $request, $id)
    {
    
        $Category = DB::select('delete from departments where department_ID = ?',[$id]);
        return redirect()->route('department-manage.index')->with('mess', 'Thành công');

    }
}
