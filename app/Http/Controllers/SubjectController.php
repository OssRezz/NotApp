<?php

namespace App\Http\Controllers;

use App\Models\tbl_subjects;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function subjectsView()
    {
        $subjects = tbl_subjects::orderBy('id', 'desc')->paginate(10);
        return view('subject/subjects', compact('subjects'));
    }

    public function create(Request $request, tbl_subjects $subjects)
    {
        $request->validate([
            'nombre' => 'required|max:60'
        ]);

        $subjects->nombre = $request->nombre;

        if ($subjects->save()) {
            return redirect()->back()->with('message', 'Subject has been registered successfully!');
        } else {
            return redirect()->back()->with('message', 'Subject can"t not be registered');
        }
    }

    public function editView(tbl_subjects $subjects)
    {
        return view('subject.editsubject', compact('subjects'));
    }

    public function update(Request $request, tbl_subjects $subjects)
    {
        $request->validate([
            'nombre' => 'required|max:60'
        ]);

        $subjects->nombre = $request->nombre;

        if ($subjects->update()) {
            return redirect()->to('subjects')->with('message', 'Subject has been update successfully!');
        } else {
            return redirect()->back()->with('message', 'Subject can"t not be update');
        }
    }
}
