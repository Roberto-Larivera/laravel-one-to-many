<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

// Requests
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;

// Helpers
use Illuminate\Support\Str;

// Models
use App\Models\Type;

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
     * @param  \App\Http\Requests\StoreTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeRequest $request)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['name']);
        
        // Validazione slug
        $existSlug = Type::where('slug', $data['slug'])->first();

        $counter = 1;
        $dataSlug = $data['slug'];

        // questa funzione controlla se lo slag esiste già nel database, e in caso esista con questo ciclo while li viene inserito un numero di continuazione 
        while ($existSlug) {
            if (strlen($data['slug']) >= 95) {
                substr($data['slug'], 0, strlen($data['slug']) - 3);
            }
            $data['slug'] = $dataSlug . '-' . $counter;
            $counter++;
            $existSlug = Type::where('slug', $data['slug'])->first();
        }
        $newType = Type::create($data);
        return redirect()->route('admin.types.show', $newType)->with('success', 'Tipologia aggiunta con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        $projects = $type->projects;
        return view('admin.types.show', compact('type','projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit',compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeRequest  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $nameOld = $type->name;

        $data = $request->validated();

        if($nameOld == $data['name']){
            return redirect()->route('admin.types.edit', $type->id)->with('warning', 'Non hai modificato nessun dato');
        }else{

            $data['slug'] = Str::slug($data['name']);
        
            // Validazione slug
            $existSlug = Type::where('slug', $data['slug'])->first();
    
            $counter = 1;
            $dataSlug = $data['slug'];
    
            // questa funzione controlla se lo slag esiste già nel database, e in caso esista con questo ciclo while li viene inserito un numero di continuazione 
            while ($existSlug) {
                if (strlen($data['slug']) >= 95) {
                    substr($data['slug'], 0, strlen($data['slug']) - 3);
                }
                $data['slug'] = $dataSlug . '-' . $counter;
                $counter++;
                $existSlug = Type::where('slug', $data['slug'])->first();
            }
            $type->update($data);
            return redirect()->route('admin.types.show', $type)->with('success', 'Tipologia aggiornata con successo');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete($type);
        return redirect()->route('admin.types.index')->with('success', 'La tipologia è stata eliminata con successo');
    }
}
