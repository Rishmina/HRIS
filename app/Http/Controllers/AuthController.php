<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'password' => 'required|min:6',
        ]);
        $employee = Employee::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $request->input('phone'),
            'department' => $request->input('department'),
            'role' => $request->input('role', 'employee'),
            'salary' => $request->input('salary', 0),
        ]);
        $token = $employee->createToken('api')->plainTextToken;
        return response()->json(['token' => $token], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $employee = Employee::where('email', $request->email)->first();
        if (! $employee || ! Hash::check($request->password, $employee->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        $token = $employee->createToken('api')->plainTextToken;
        return response()->json(['token' => $token]);
    }
}
