<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $works = Work::all();
        return view('works.index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('works.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sentData = $request->all();

        $work = new Work();
        $work->title = $sentData['title'];
        $work->description = $sentData['description'];
        $work->thumb = $sentData['thumb'];
        $work->price = $sentData['price'];
        $work->series = $sentData['series'];
        $work->sale_date = $sentData['sale_date'];
        $work->type = $sentData['type'];
        $work->slug= Str::slug($work->title, '-');

        $work->save();

        return redirect()->route('works.show', $work->slug);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $work = Work::where('slug', $slug)->first();
        return view('works.show', compact('work'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $work = Work::where('slug', $slug)->first();
        return view('works.edit', compact('work'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
