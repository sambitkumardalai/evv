<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function getEmployees()
    {
        $employees = DB::table("employee")->where("deletedFlag", 0)->get();

        return response()->json([
            "success" => "true",
            "employees" => $employees
        ]);
    }
    public function getEmployeeById($id)
    {
        $employee = DB::table("employee")->selectRaw("name,salary,email")->where("recNo", $id)->where("deletedFlag", 0)->first();
        if ($employee) {
            return response()->json([
                "employee" => $employee
            ]);
        } else {
            return response()->json([
                "success" => "true",
                "message" => "Employee not found"
            ]);
        }
    }
    public function addEmployee(Request $request)
    {
        $query = DB::table("employee")->insert([
            "name" => $request->input("name"),
            "email" => $request->input("email"),
            "salary" => $request->input("salary"),
        ]);

        if ($query) {
            return response()->json([
                "success" => "true",
                "message" => "Employee created successfully"
            ], 201);
        } else {
            return response()->json([
                "success" => "false",
                "message" => "Employee creation unsuccessfull"
            ], 401);
        }
    }
    public function updateEmployee($id, Request $request)
    {
        $query = DB::table("employee")
            ->where("recNo", $id)
            ->where("deletedFlag", 0)
            ->update([
                "name" => $request->input("name"),
                "email" => $request->input("email"),
                "salary" => $request->input("salary"),
            ]);
        if ($query) {
            return response()->json([
                "success" => "true",
                "message" => "Employee updated successfully"
            ], 200);
        } else {
            return response()->json([
                "success" => "false",
                "message" => "Employee updation unsuccessfull"
            ], 401);
        }
    }
    public function deleteEmployee($id)
    {
        $query = DB::table("employee")
            ->where("recNo", $id)
            ->update([
                "deletedFlag" => 1,
            ]);
        if ($query) {
            return response()->json([
                "success" => "true",
                "message" => "Employee deleted successfully"
            ], 200);
        } else {
            return response()->json([
                "success" => "false",
                "message" => "Employee deeletion unsuccessfull"
            ], 401);
        }
    }
}
