<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Http\Resources\v1\ProductResource;

class ProductAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbsItems = [
            [
                'name' => 'Lista de Produtos',
                'url' => '/',
                'active' => true
            ],
        ];

        $product = Product::orderBy('id', 'asc')->latest()->get();

        return view('product.index', [
            'product' => $product,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Lista de Produtos'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbsItems = [
            [
                'name' => 'Criar Produto',
                'url' => '/',
                'active' => true
            ],
        ];


        return view('product.create', [
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Criar Produto'
        ]);        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->validated());

        return new ProductResource($product);

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $breadcrumbsItems = [
            [
                'name' => 'Editar Produto',
                'url' => '/',
                'active' => true
            ],
        ];

        $product = Product::find($id);
        
        return view('product.edit', [
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Editar Produto',
            'product' => $product,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */

    public function update(ProductRequest $request, Product $product)
        {
            $product->update($request->validated());

            return new ProductResource($product);
        }


    /**
     * Remove the specified resource from storage.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        // return response()->json(null, 204);
        return to_route('products.index')->with('message', 'Product deleted successfully');
    }
}
