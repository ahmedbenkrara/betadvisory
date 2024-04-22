<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\Formation;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $formations = Formation::all();
        return view('client.formation', compact('categories', 'formations'));
    }

    //admin
    public function list()
    {
        $formations = Formation::all();
        return view('admin.formation.list', compact('formations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.formation.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|unique:etude,title|max:255',
            'description' => 'required',
            'prix' => 'required|numeric',
            'category_id' => 'required|exists:category,id',
        ], [
            'cover.required' => 'La couverture est obligatoire.',
            'cover.image' => 'La couverture doit être une image jpeg,png,jpg,gif.',
            'title.required' => 'Le titre est obligatoire.',
            'title.unique' => 'Nous avons déjà une étude avec le même titre.',
            'description.required' => 'La description est obligatoire.',
            'prix.required' => 'Le prix est obligatoire.',
            'prix.numeric' => 'le prix devrait être un nombre.',
            'category_id' => 'La catégorie est obligatoire.'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $image = $request->file('cover');
        $iname = time() . '.' . $image->getClientOriginalExtension();
        $image->move('files/images', $iname);

        Formation::create([
            'cover' => 'files/images/'.$iname, 
            'title' => $request->title, 
            'description' => $request->description, 
            'prix' => $request->prix,
            'category_id' => $request->category_id
        ]);

        return back()->with('success', 'Formation créée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $formation = Formation::findOrFail($id);
            return view('client.detailsformation', compact('formation'));
        }catch (ModelNotFoundException $e){
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $formation = Formation::findOrFail($id);
            $categories = Category::all();
            return view('admin.formation.edit', compact('formation', 'categories'));
        }catch (ModelNotFoundException $e){
            abort(404);
        }
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
        try{
            $formation = Formation::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'title' => 'required|unique:etude,title,' . $formation->id . '|max:255',
                'description' => 'required',
                'prix' => 'required|numeric',
                'category_id' => 'required|exists:category,id',
            ], [
                'cover.image' => 'La couverture doit être une image jpeg,png,jpg,gif.',
                'title.required' => 'Le titre est obligatoire.',
                'title.unique' => 'Nous avons déjà une étude avec le même titre.',
                'description.required' => 'La description est obligatoire.',
                'prix.required' => 'Le prix est obligatoire.',
                'prix.numeric' => 'le prix devrait être un nombre.',
                'category_id.required' => 'La catégorie est obligatoire.'
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            // Update the existing Etude
            $formation->title = $request->title;
            $formation->description = $request->description;
            $formation->prix = $request->prix;
            $formation->category_id = $request->category_id;

            // Handle cover image
            if ($request->hasFile('cover')) {
                $image = $request->file('cover');
                $iname = time() . '.' . $image->getClientOriginalExtension();
                $image->move('files/images', $iname);
                $formation->cover = 'files/images/' . $iname;
            }

            $formation->save();

            return back()->with('success', 'Formation mise à jour avec succès.');
        }catch (ModelNotFoundException $e){
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $formation = Formation::findOrFail($id);

            if ($formation->cover && file_exists(public_path($formation->cover))) {
                unlink(public_path($formation->cover));
            }           

            $formation->delete();
            return back();
        }catch (ModelNotFoundException $e){
            abort(404);
        }
    }
}
