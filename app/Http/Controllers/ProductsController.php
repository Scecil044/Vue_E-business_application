<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Http\Requests\ProductsRequest;
use App\Http\Resources\ProductsListResource;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductsListResource::Collection(Products::query()->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsRequest $request)
    {
        return new ProductsResource(Products::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        return new ProductsResource($products);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductsRequest  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(ProductsRequest $request, Products $products)
    {
        $products->update($request->validated());
        return new ProductsResource($products);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        $products->delete();

        return response()->noContent();
    }
}
