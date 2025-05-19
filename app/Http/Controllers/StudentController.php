<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    function index()
    {
        $student = Student:: all();

        return response()->json([
        'success' => true,
        'message' => 'Student Data',
        'data' => $student
        ], 200);
    }

    function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'npm' => 'required',
            'nama' => 'required',
            'angkatan' => 'required',
            'ipk' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please fill out required fields',
                'data' => $validator->errors()
            ], 400);
        } else {
            $student = Student::create([
                'npm' => $request->input('npm'),
                'nama' => $request->input('nama'),
                'angkatan' => $request->input('angkatan'),
                'ipk' => $request->input('ipk'),
            ]);

            if ($student) {
                return response()->json([
                    'success' => true,
                    'message' => 'Student data created',
                    'data' => $student
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Error!',
                    'data' => 'Student data failed to create'
                ], 500);
            }
        }
    }

    function read($id)
    {
        $student = Student::find($id);

        if($student){
            return response()->json([
                'success' => true,
                'message' => 'Student data',
                'data' => $student
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Student data not found',
                'data' => null
            ], 404);
        }
    }

    function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'npm' => 'required',
            'nama' => 'required',
            'angkatan' => 'required',
            'ipk' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please fill out required fields',
                'data' => $validator->errors()
            ], 400);
        } else {
            $student = Student::whereId($id)->update([
                'npm' => $request->input('npm'),
                'nama' => $request->input('nama'),
                'angkatan' => $request->input('angkatan'),
                'ipk' => $request->input('ipk'),
            ]);

            if ($student) {
                return response()->json([
                    'success' => true,
                    'message' => 'Student data updated',
                    'data' => $student
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Error!',
                    'data' => 'Student data failed to update'
                ], 400);
            }
        }
    }

    function delete($id) {
        $student = Student::whereId($id)->first();
        $student->delete();

        if ($student) {
            return response()->json([
                'success' => true,
                'message' => 'Student data deleted',
                'data' => null
            ], 200);
        }
        // else {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Error!',
        //         'data' => 'Student data failed to delete'
        //     ], 400);
        // }
    }
}