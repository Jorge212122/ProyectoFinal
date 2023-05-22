<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
    }

   
    public function index()
    {        
        $categories = Category::all();
        return view('category.category-index', compact('categories'));
    }

    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        $request->validate([
            'name' => 'required|string|min:1|max:255'
        ]);
        Category::create($request->all());
        return redirect()->route('category.index')->with('message', 'Categoria creada exitosamente');
    }

    public function show(Category $category)
    {
        
    }
    public function edit(Category $category)
    { 
        return view('category.category-index', compact('category'));
    }

    public function update(Request $request, Category $category)
    {     
        $request->validate([
            'name' => 'required|string|min:1|max:255'
        ]);   
        Category::where('id', $category->id)->update($request->except('_token', '_method'));
        return redirect()->route('category.index')->with('message', 'Categoria actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {        
        $category->delete();
        return redirect()->route('category.index')->with('message', 'Categoria eliminada exitosamente');
    }
}
