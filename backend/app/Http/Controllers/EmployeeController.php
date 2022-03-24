<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function getEmployees()
    {
        $employees = DB::table("employee")->get();

        return response()->json([
            "success" => "true",
            "employees" => $employees
        ]);
    }
}
