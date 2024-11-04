<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreateCategoryRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbsItems = [
            [
                'name' => 'Categorias',
                'url' => '/',
                'active' => true
            ],
        ];

        $category = Category::orderBy('id', 'asc')->latest()->get();

        return view('category.index', [
            'category' => $category,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Categorias'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbsItems = [
            [
                'name' => 'Criar',
                'url' => '/',
                'active' => true
            ],
        ];


        return view('category.create', [
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Criar'
        ]);
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
            'name'    => 'required|max:255',
            'slug'    => 'nullable',
        ]);   

        $category = new Category;

        $category['name'] = $request->name;
        $category['slug'] = Str::slug( $request->name);

        $category->save();

        return redirect()->route('category.index')->with(['message' => 'Categoria criado com sucesso!.', 'type' => 'success']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $breadcrumbsItems = [
            [
                'name' => 'Editar Categoria',
                'url' => '/',
                'active' => true
            ],
        ];

        $category = Category::find($id);
        
        return view('category.edit', [
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Editar Categoria',
            'category' => $category,
        ]);         

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'               => 'required|max:255',
            'slug'               => 'nullable',
        ]);   

        $category = Category::find( $id );

        $category['name'] = $request->name;
        $category['slug'] = Str::slug( $request->name);

        $category->save();

        return redirect()->route('category.index')->with(['message' => 'Categoria criado com sucesso!.', 'type' => 'success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return to_route('category.index')->with('message', 'Category deleted successfully');
    }
}
