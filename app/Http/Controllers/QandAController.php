<?php

namespace App\Http\Controllers;

use App\QandA;
use App\Customer;
use Illuminate\Http\Request;

class QandAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetching all the Question and Answers
        $questions = QandA::all();

        return view('QandA.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = new QandA();
        $topics = ['Laravel', 'Php', 'Mysql'];
        $qtype = ['Basic', 'Intermediate', 'Advanced'];
        return view('QandA.create', compact('questions', 'topics', 'qtype'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        // $input = $request->all();
        $data = $request->validate([
            'topic' => 'required',
            'qtype' => 'required',
            'question' => 'required',
            'answer' => 'required',
            'link' => '',
        ]);

        // Saving to Database In One Line
        QandA::create($data);

        return redirect('qanda');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QandA  $qandA
     * @return \Illuminate\Http\Response
     */
    public function show(QandA $qandA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QandA  $qandA
     * @return \Illuminate\Http\Response
     */
    public function edit(QandA $qandA)
    {
        return "I am in Edit Action....";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QandA  $qandA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QandA $qandA)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QandA  $qandA
     * @return \Illuminate\Http\Response
     */
    public function destroy(QandA $qandA, $id)
    {
        // DB::table('qand_a_s')->where('id', '=', $id)->delete();
        // QandA::where('id', '=', $id)->delete();
        QandA::findOrFail($id)->delete();

        return redirect('qanda');
    }
}
