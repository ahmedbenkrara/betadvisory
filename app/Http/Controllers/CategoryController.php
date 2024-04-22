<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderby('id')->get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'name' => 'required|unique:category,name',
        ],[
            'name.required' => 'Le nom de la catégorie est obligatoire.',
            'name.unique' => 'Nous avons déjà une catégorie du même nom.'
        ]);
        
        if ($validator->fails()){
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        Category::create([
            'name' => $request->name
        ]);

        return back()->with('success', 'Catégorie créée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            $category = Category::findOrFail($id);
            return view('admin.category.edit', compact('category'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:category,name,'.$id,
        ],[
            'name.required' => 'Le nom de la catégorie est obligatoire.',
            'name.unique' => 'Nous avons déjà une catégorie du même nom.'
        ]);
        
        if ($validator->fails()){
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $category = Category::find($id);

        $category->update([
            'name' => $request->name
        ]);

        return back()->with('success', 'Catégorie mise à jour avec succès.');
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
            $category = Category::findOrFail($id);
            $category->delete();
            return back();
        }catch (ModelNotFoundException $e){
            abort(404);
        }
    }
}
