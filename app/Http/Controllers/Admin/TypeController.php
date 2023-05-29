<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();

        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.create');
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

        // richiamo la funzione di validazione
        $this->validation($formData);

        $type = new Type();

        $type->fill($formData);

        $type->slug = Str::slug($type->name, '-');

        $type->save();

        return redirect()->route('admin.types.show', $type);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        //controllo se sto ricevendo la modifica nel modo corretto
        // dd($request);

        $formData = $request->all();

        $this->validation($formData);

        // utilizzo uno dei due metodi mostrati
        $formData['slug'] = Str::slug($formData['name'], '-');

        $type->update($formData);

        return redirect()->route('admin.types.show', $type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        // dd($type);

        $type->delete();

        return redirect()->route('admin.types.index');
    }

    private function validation($formData)
    {


        $validator = Validator::make($formData, [

            'name' => 'required|max:255|min:2|unique:App\Models\Type,name',
            'description' => 'required'

        ], [

            'name.required' => 'Devi inserire il nome',
            'name.max' => 'Il nome non deve essere più lungo di 100 caratteri',
            'name.min' => 'Il nome deve avere minimo 2 caratteri',
            'name.unique' => 'é già presente una tipologia con questo nome',
            'description.required' => 'Devi inserire una descrizione',

        ])->validate();

        return $validator;
    }
}
