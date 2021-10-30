<?php

namespace App\Http\Controllers;
use Auth;

use App\Question;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Session;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $qes=Question::all();
        return view('admin.questions.index',compact('qes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.questions.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'question-text' => 'required',
            'question-type' => 'required',
            'option1' => 'required_if:question-type,mcq',
            'option2' => 'required_if:question-type,mcq',
            'option3' => 'required_if:question-type,mcq',
            'option4' => 'required_if:question-type,mcq',
        ]);
        $question = new Question;
        $question->admin_id = Auth::guard('admin')->user()->id;
        $question->question = $request->get('question-text');
        $question->question_type = $request->get('question-type');
        switch($request->get('question-type')) {
            case 'mcq':
                $question->option_1 = $request->get('option1');
                $question->option_2 = $request->get('option2');
                $question->option_3 = $request->get('option3');
                $question->option_4 = $request->get('option4');
                break;
            case 'fib':
                $question->option_1 = null;
                $question->option_2 = null;
                $question->option_3 = null;
                $question->option_4 = null;
                break;
            case 'tf':
                $question->option_1 = null;
                $question->option_2 = null;
                $question->option_3 = null;
                $question->option_4 = null;
                break;
        }
        // $question;
        $question->save();
        Session::flash('success', 'Question created successfully');
        return redirect()->back();



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $qu= Question::find($id);
        $qu->delete();

        Session::flash('success', 'Question deleted successfully');
        return redirect()->back();
    }
}
