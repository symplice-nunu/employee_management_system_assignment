<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EmployeeController extends Controller
{
    public function index()
    {
        return Employee::all();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees',
            'employeeIdentifier' => 'required|string|max:255|unique:employees',
            'phoneNumber' => 'required|string|max:255',
        ], [
            'email.unique' => 'The email address is already registered.',
            'employeeIdentifier.unique' => 'The employee identifier is already in use.',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $employee = Employee::create($request->all());

        return response()->json(['message' => 'Employee created successfully', 'employee' => $employee]);
    }

    public function show(Employee $employee)
    {
        if ($employee) {
            return response()->json(['employee' => $employee]);
        } else {
            return response()->json(['message' => 'Employee not found'], 404);
        }
    }


    public function update(Request $request, Employee $employee)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees,email,' . $employee->id,
            'employeeIdentifier' => 'required|string|max:255|unique:employees,employeeIdentifier,' . $employee->id,
            'phoneNumber' => 'required|string|max:255',
        ], [
            'email.unique' => 'The email address is already registered.',
            'employeeIdentifier.unique' => 'The employee identifier is already in use.',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $employee->update($request->all());
    
        return response()->json(['message' => 'Employee updated successfully', 'employee' => $employee]);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return response()->json(['message' => 'Employee deleted successfully']);
    }
}
