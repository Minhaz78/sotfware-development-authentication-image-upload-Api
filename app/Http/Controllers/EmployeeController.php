<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use DB;
class EmployeeController extends Controller
{    public function all(){
    #$employees =Employee::all();
    // DB to get---its a join query;
    $employees=DB::table('employees as e')
        ->leftJoin('departments as d','e.department_id','d.id')
        ->select('e.id','e.name','e.email','e.gender','e.birth_date','e.salary','e.address','d.name as dept_name')
        ->get();
    return view('employee.all',compact('employees'));
}
    public function create(){
        $departments=DB::table('departments')
                       ->select('id','name')
                       ->get();
                       
        return view('employee.create',compact ('departments'));
    }
    public function store(Request $r){
        $validated = $r->validate([
            'name' => 'required',
            'email_address' => 'required|email|unique:employees,email',
            'department' => 'exists:departments,id',
             'salary' => 'required|integer|between:1000,20000',
             'gender' => 'in:(male,female,other)',
             #'birth_date' =>'date_format:1995,2018'

        ]);

     $obj = new Employee();
     $obj->name =$r->name; 
     $obj->email=$r->email_address;
     $obj->department_id=$r->department;
     $obj->birth_date=$r->birth_date;
     $obj->salary= $r->salary;
     $obj->address= $r->address;
     $obj->gender= $r->gender;
     $obj->save();//ORM=>>>>>object relatonal maping(this call eloquent orm.)
        
    }
    public function edit($id){
        $employee=Employee::find($id);
        return view('employee.edit',compact('employee'));

    }
    public function update(Request $r,$id){
        $obj = Employee::find($id);
        $obj->name =$r->name; 
        $obj->email=$r->email;
        $obj->birth_date=$r->birth_date;
        $obj->salary= $r->salary;
        $obj->address= $r->address;
        $obj->gender= $r->gender;
        $obj->save();//ORM=>>>>>object relatonal maping(this call eloquent orm.)
           
        if($obj->update()){
           
            return redirect()->to('employees')->with('msg','Updated successfully!');
            }
            
       }
       public function delete($id){
        $employee=Employee::find($id);
        if($employee->delete()){
           
        return redirect()->to('employees')->with('msg','Employee Deleted successfully!');
        }
        

    }

}
