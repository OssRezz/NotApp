<?php

namespace App\Http\Controllers;

use App\Models\tbl_scores;
use App\Models\tbl_students;
use App\Models\tbl_subjects;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function scoreView()
    {
        $students = tbl_students::All();
        $subjects = tbl_subjects::All();


        $score = tbl_scores::join("tbl_subjects", "tbl_subjects.id", "=", "tbl_scores.id_subject")
            ->join("tbl_students", "tbl_students.id", "=", "tbl_scores.id_student")
            ->select("tbl_scores.id", "tbl_subjects.nombre as subject", "tbl_students.nombre as student", "score")
            ->orderBy('id', 'desc')->paginate(5);


        return view('score.score', compact('score', 'students', 'subjects'));
    }

    public function create(Request $request, tbl_scores $score)
    {
        $request->validate([
            'student' => 'required',
            'subject' => 'required',
            'score' => 'required'
        ]);

        $cc_student = $request->student;
        $studentId = tbl_students::Where('cc_student', $cc_student)->first();


        $score->id_student = $studentId->id;
        $score->id_subject = $request->subject;
        $score->score = $request->score;

        if ($score->save()) {
            return redirect()->back()->with('message', 'Score  has been registered successfully!');
        } else {
            return redirect()->back()->with('message', 'Score  can"t not be registered');
        }
    }

    public function editView(tbl_scores $score)
    {
        $students = tbl_students::All();
        $subjects = tbl_subjects::All();


        return view('score.scoreedit', compact('score', 'students', 'subjects'));
    }

    public function update(Request $request, tbl_scores $score)
    {
        $request->validate([
            'student' => 'required',
            'subject' => 'required',
            'score' => 'required'
        ]);

        $cc_student = $request->student;
        $studentId = tbl_students::Where('cc_student', $cc_student)->first();


        $score->id_student = $studentId->id;
        $score->id_subject = $request->subject;
        $score->score = $request->score;

        if ($score->update()) {
            return redirect()->to('score')->with('message', 'Score  has been update successfully!');
        } else {
            return redirect()->back()->with('message', 'Score  can"t not be update');
        }
    }


    public function search(Request $request)
    {
        $search = $request->search;

        $score = tbl_scores::join("tbl_subjects", "tbl_subjects.id", "=", "tbl_scores.id_subject")
            ->join("tbl_students", "tbl_students.id", "=", "tbl_scores.id_student")
            ->select("tbl_scores.id", "tbl_subjects.nombre as subject", "tbl_students.nombre as student", "score")
            ->where('tbl_subjects.nombre', 'LIKE', '%' . $search . '%')
            ->orwhere('tbl_students.nombre', 'LIKE', '%' . $search . '%')
            ->paginate(10);

        return view('score.searchscore', compact('score'));
    }
}
