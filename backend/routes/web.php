<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get("/employees", "EmployeeController@getEmployees"); // all employee
$router->get("/employees/{id}", "EmployeeController@getEmployeeById"); // single employee
$router->post("/addEmployee", "EmployeeController@addEmployee"); // single employee
$router->put("/updateEmployee/{id}", "EmployeeController@updateEmployee"); // single employee
$router->delete("/deleteEmployee/{id}", "EmployeeController@deleteEmployee"); // single employee
