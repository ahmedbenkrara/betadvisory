<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\Etude;

class EtudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudes = Etude::all();
        $categories = Category::all();
        return view('client.etudes', compact('categories', 'etudes'));
    }

    //admin
    public function list()
    {
        $etudes = Etude::all();
        return view('admin.etude.list', compact('etudes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.etude.create', compact('categories'));
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
            'file' => 'required|mimes:pdf',
            'demo' => 'mimes:pdf',
            'category_id' => 'required|exists:category,id',
        ], [
            'cover.required' => 'La couverture est obligatoire.',
            'cover.image' => 'La couverture doit être une image jpeg,png,jpg,gif.',
            'title.required' => 'Le titre est obligatoire.',
            'title.unique' => 'Nous avons déjà une étude avec le même titre.',
            'description.required' => 'La description est obligatoire.',
            'prix.required' => 'Le prix est obligatoire.',
            'prix.numeric' => 'le prix devrait être un nombre.',
            'file.required' => 'Le fichier du produit est obligatoire.',
            'file.mimes' => 'Le fichier du produit doit être un pdf.',
            'demo.mimes' => 'La démo devrait être un pdf.',
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

        $pdf = $request->file('file');
        $name = time() . '.' . $pdf->getClientOriginalExtension();
        $pdf->move('files/pdfs', $name);

        if($request->hasFile('demo')){
            $demo = $request->file('demo');
            $dname = time() . '.' . $demo->getClientOriginalExtension();
            $demo->move('files/demo', $dname);
        }else{
            $dname = null;
        }

        Etude::create([
            'cover' => 'files/images/'.$iname, 
            'title' => $request->title, 
            'description' => $request->description, 
            'prix' => $request->prix, 
            'file' => 'files/pdfs/'.$name, 
            'demo' => $dname != null ? 'files/demo/'.$dname : null,
            'category_id' => $request->category_id
        ]);

        return back()->with('success', 'Etude créée avec succès.');
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
            $etude = Etude::findOrFail($id);
            $cart = Etude::select('id', 'title', 'cover', 'prix')->findOrFail($id);
            return view('client.details', compact('etude', 'cart'));
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
            $etude = Etude::findOrFail($id);
            $categories = Category::all();
            return view('admin.etude.edit', compact('etude', 'categories'));
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
            $etude = Etude::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'title' => 'required|unique:etude,title,' . $etude->id . '|max:255',
                'description' => 'required',
                'prix' => 'required|numeric',
                'file' => 'nullable|mimes:pdf',
                'demo' => 'nullable|mimes:pdf',
                'category_id' => 'required|exists:category,id',
            ], [
                'cover.image' => 'La couverture doit être une image jpeg,png,jpg,gif.',
                'title.required' => 'Le titre est obligatoire.',
                'title.unique' => 'Nous avons déjà une étude avec le même titre.',
                'description.required' => 'La description est obligatoire.',
                'prix.required' => 'Le prix est obligatoire.',
                'prix.numeric' => 'le prix devrait être un nombre.',
                'file.mimes' => 'Le fichier doit être un pdf.',
                'demo.mimes' => 'La démo devrait être un pdf.',
                'category_id.required' => 'La catégorie est obligatoire.'
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            // Update the existing Etude
            $etude->title = $request->title;
            $etude->description = $request->description;
            $etude->prix = $request->prix;
            $etude->category_id = $request->category_id;

            // Handle cover image
            if ($request->hasFile('cover')) {
                $image = $request->file('cover');
                $iname = time() . '.' . $image->getClientOriginalExtension();
                $image->move('files/images', $iname);
                $etude->cover = 'files/images/' . $iname;
            }

            // Handle main file
            if ($request->hasFile('file')) {
                $pdf = $request->file('file');
                $name = time() . '.' . $pdf->getClientOriginalExtension();
                $pdf->move('files/pdfs', $name);
                $etude->file = 'files/pdfs/' . $name;
            }

            // Handle demo file
            if ($request->hasFile('demo')) {
                $demo = $request->file('demo');
                $dname = time() . '.' . $demo->getClientOriginalExtension();
                $demo->move('files/demo', $dname);
                $etude->demo = 'files/demo/' . $dname;
            } else {
                $etude->demo = null;
            }

            $etude->save();

            return back()->with('success', 'Etude mise à jour avec succès.');
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
            $etude = Etude::findOrFail($id);

            if ($etude->cover && file_exists(public_path($etude->cover))) {
                unlink(public_path($etude->cover));
            }
            
            if ($etude->file && file_exists(public_path($etude->file))) {
                unlink(public_path($etude->file));
            }
            
            if ($etude->demo && file_exists(public_path($etude->demo))) {
                unlink(public_path($etude->demo));
            }            

            $etude->delete();

            return back();
        }catch (ModelNotFoundException $e){
            abort(404);
        }
    }
}
