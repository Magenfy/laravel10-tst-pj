<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Traits\HttpResponses;
use Illuminate\Support\Validator;
use App\Http\Resources\v1\ProductResource;

class ProductController extends Controller
{

    use HttpResponses;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProductResource::Collection(Product::all());
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
    public function store(Request $request)
    {
        //
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
    public function edit(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
