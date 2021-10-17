<?php

namespace App\Http\Controllers;

use App\Exports\StudentsExport;
use App\Models\tbl_students;
use App\Models\tbl_users;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function studentsView()
    {
        $students = tbl_students::orderBy('id', 'desc')->paginate(5);
        return view('student/student', compact('students'));
    }

    public function export()
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }

    public function create(Request $request, tbl_students $student)
    {

        $request->validate([
            'cc_student' => 'required|max:11',
            'nombre' => 'required',
            'email' => ['required', 'email']
        ]);

        $student->cc_student = $request->cc_student;
        $student->nombre = $request->nombre;
        $student->email = $request->email;

        if ($student->save()) {
            return redirect()->back()->with('message', 'Student has been registered successfully!');
        } else {
            return redirect()->back()->with('message', 'Student can"t not be registered');
        }
    }


    public function editView(Request $request, tbl_students $students)
    {
        return view('student.editstudent', compact('students'));
    }

    public function update(Request $request, tbl_students $students)
    {
        $request->validate([
            'cc_student' => 'required|max:11',
            'nombre' => 'required',
            'email' => ['required', 'email']
        ]);

        $students->cc_student = $request->cc_student;
        $students->nombre = $request->nombre;
        $students->email = $request->email;

        if ($students->update()) {
            return redirect()->to('students')->with('message', 'Student has been update successfully!');
        } else {
            return redirect()->back()->with('message', 'Student can"t not be update');
        }
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $students = tbl_students::where('nombre', 'LIKE', '%' . $search . '%')->paginate(10);

        return view('student.searchstudent', compact('students'));
    }
}
