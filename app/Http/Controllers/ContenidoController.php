<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Season;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ContenidoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');        
        $this->middleware('isadmin', ['except' => ['show', 'showSeason']]);
    }

    public function index()
    {        
        $contents = Content::all();
        //$contents = Content::where('year', 'like','199%')->get();
        //Se pueden hacer consultas condicionales
        return view('content.content-index', compact('contents'));
    }


    public function create()
    {        
        return view('content.content-form');
    }


    public function store(Request $request)
    {      
        // Validación de datos    

        if($request->duration == null) $request->merge(['duration' => 0,]);
        if($request->year == null) $request->merge(['year' => '2000',]);        
                
        if($request->hasFile('image_temp')){
            $image_path = $request->file('image_temp')->store('images');
            $request->merge(['image_path' => $image_path,]);        
        }                
       
        $request->validate([
            'name' => 'required|string|min:1|max:255',
            'description' => 'required|string|max:2048',
            'duration' => 'required',
            'year' => 'required|digits:4',
            'image_path' => 'required',
        ]);

        // Inserción en la tabla
        Content::create($request->all());

        return redirect()->route('content.index')->with('message', 'Contenido creado exitosamente');
    }

    public function show(Content $content)
    {        
        $categories = Category::get();       
        
        // Eager Loading 
        $contentCategories = $content->categories()->with('contents')->get();
        
        return view('content.content-show', compact('content', 'categories', 'contentCategories'));
    }

    public function edit(Content $content)
    {      
        return view('content.content-form', compact('content'));
    }

    public function update(Request $request, Content $content)
    {   
      
        if($request->duration == null) $request->merge(['duration' => 0,]);
        if($request->year == null) $request->merge(['year' => '2000',]);        
        
        $request->validate([
            'name' => 'required|string|min:1|max:255',
            'description' => 'required|string|max:2048',
            'duration' => 'required',   
            'year' => 'required|digits:4',         
        ]);    
        
        Content::where('id', $content->id)->update($request->except('_token', '_method'));
        return redirect()->route('content.show', $content)->with('message', 'Contenido actualizado exitosamente');
    }

    public function destroy(Content $content)
    {        
        $content->delete();
        return redirect()->route('content.index')->with('message', 'Contenido eliminado exitosamente');
    }

    
    public function addCategory(Request $request, Content $content)
    {                
        foreach($content->categories as $category){
            if($category->id == $request->category_id){
                return redirect()->route('content.show', $content)->with('message', 'Ya existe esta categoría en este contenido');        
            }
        }

        $content->categories()->attach($request->category_id);      
        return redirect()->route('content.show', $content)->with('message', 'Categoria agregada');
    }

    static public function addCategorySeeder($content_id, $category_id)
    {
        $content = Content::where('id', $content_id)->first();
        $content->categories()->attach($category_id);
    }


    public function deleteCategory(Request $request, Content $content)
    {         
        $content->categories()->detach($request->category_id);
        return redirect()->route('content.show', $content)->with('message', 'Categoria eliminada');
    }
}

?>
