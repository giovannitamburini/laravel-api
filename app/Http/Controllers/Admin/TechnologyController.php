<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Str;



class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies = Technology::all();

        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData = $request->all();

        // dd($formData);

        $technology = new Technology();

        $technology->fill($formData);

        $technology->slug = Str::slug($technology->name, '-');

        $technology->save();

        return redirect()->route('admin.technologies.index', $technology);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technology $technology)
    {
        $formData = $request->all();

        // $this->validation($formData);

        // utilizzo uno dei due metodi mostrati
        $formData['slug'] = Str::slug($formData['name'], '-');

        $technology->update($formData);

        return redirect()->route('admin.technologies.index', $technology);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $technology)
    {
        // dd($type);

        $technology->delete();

        return redirect()->route('admin.technologies.index');
    }
}
