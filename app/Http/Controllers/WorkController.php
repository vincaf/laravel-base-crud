<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WorkController extends Controller
{
    protected $validationRules = [ 
        'title' => 'required|min:3|max:255|unique:works',
        'description' => 'required|min:5',
        'thumb' => 'required|url',
        'price' => 'required|numeric',
        'series' => 'required|min:3|max:50',
        'sale_date' => 'required|date|after:1900/01/01',
        'type' => 'required|exists:works,type',
    ];

    protected $customValidationMessages = [
        'type.exists' => 'The selected type is not available',
    ];

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
        $work = new Work();
        return view('works.create', compact('work'));
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

        $validatedData = $request->validate(
            [ 
                'title' => 'required|min:3|max:255|unique:works',
                'description' => 'required|min:5',
                'thumb' => 'required|url',
                'price' => 'required|numeric',
                'series' => 'required|min:3|max:50',
                'sale_date' => 'required|date|after:1900/01/01',
                'type' => 'required|exists:works,type',
            ],
            [
                'type.exists' => 'The selected type is not available',
            ]
        );

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

        return redirect()->route('works.index', $work->slug)->with('created', $sentData['title']);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $work = Work::where('slug', $slug)->firstOrFail();
        return view('works.show', compact('work'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $work = Work::where('slug', $slug)->firstOrFail();
        return view('works.edit', compact('work'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $sentData = $request->all();

        $validatedData = $request->validate($this->validationRules, $this->customValidationMessages);

        $work = Work::where('slug', $slug)->firstOrFail();
        $sentData['slug'] = Str::slug($sentData['title'], '-');
        $work->slug;

        $work->update($sentData);
        
        return redirect()->route('works.show', $work->slug)->with('edited', $sentData['title']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $work = Work::findOrFail($id);
        $work->delete();

        // Work::destroy($id);

        return redirect()->route('works.index')->with('delete', $work->title);
    }
}
