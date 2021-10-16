<?php

namespace App\Http\Controllers;

use App\Models\tbl_subjects;
use App\Models\tbl_teachers;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * teachersView
     *
     * @return void
     */
    public function teachersView()
    {
        // $teachers = tbl_teachers::orderBy('id', 'desc')->paginate(10);
        $teachers = tbl_teachers::join("tbl_subjects", "tbl_subjects.id", "=", "tbl_teachers.subject")
            ->select("tbl_teachers.id", "cc_teacher", "tbl_teachers.nombre as teacher", "tbl_subjects.nombre", "subject")
            ->paginate(5);


        $subjects = tbl_subjects::all();
        return view('teacher/teacher', compact('teachers', 'subjects'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create(Request $request, tbl_teachers $teacher)
    {

        $request->validate([
            'cc_teacher' => 'required|max:11',
            'nombre' => 'required',
            'subject' => 'required'
        ]);
        $teacher->cc_teacher = $request->cc_teacher;
        $teacher->nombre = $request->nombre;
        $teacher->subject = $request->subject;

        if ($teacher->save()) {
            return redirect()->back()->with('message', 'Teacher has been registered successfully!');
        } else {
            return redirect()->back()->with('message', 'Teacher can"t not be registered');
        }
    }

    public function editView(Request $request, tbl_teachers $teachers)
    {
        $subjects = tbl_subjects::all();

        $idSubject = $teachers->subject;
        $subjectTeacher = tbl_subjects::Where('id', $idSubject)->first();

        return view('teacher.editteachers', compact('teachers', 'subjects', 'subjectTeacher'));
    }

    public function update(Request $request, tbl_teachers $teachers)
    {
        $request->validate([
            'cc_teacher' => 'required|max:11',
            'nombre' => 'required',
            'subject' => 'required'
        ]);
        $teachers->cc_teacher = $request->cc_teacher;
        $teachers->nombre = $request->nombre;
        $teachers->subject = $request->subject;

        if ($teachers->update()) {
            return redirect()->to('teacher')->with('message', 'Teacher has been update successfully!');
        } else {
            return redirect()->back()->with('message', 'Teacher can"t not be update');
        }
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $teachers = tbl_teachers::join("tbl_subjects", "tbl_subjects.id", "=", "tbl_teachers.subject")
            ->select("tbl_teachers.id", "cc_teacher", "tbl_teachers.nombre as teacher", "tbl_subjects.nombre", "subject")
            ->Where('tbl_teachers.nombre', 'LIKE', '%' . $search . '%')
            ->orWhere('tbl_subjects.nombre', 'LIKE', '%' . $search . '%')->paginate(5);

        return view('teacher.searchteacher', compact('teachers'));
    }
}
