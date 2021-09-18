<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Requests\Product\Upsert;
use App\Http\Resources\Product\Collection as ProductCollection;
use App\Http\Resources\Product\Resource as ProductResource;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $products = $this->productService->collection($request->all());
        return new ProductCollection($products);
    }

    public function show($id){
        $product = $this->productService->resource($id);
        return new ProductResource($product);
    }

    public function store(Upsert $request){
        $product = $this->productService->store($request->all());
        return new ProductResource($product);
    }

    public function update($id ,Upsert $request){
        $product = $this->productService->update($id, $request->all());
        return new ProductResource($product);
    }

    public function destroy($id, Request $request){
        $product = $this->productService->delete($id);
        return response()->json($product);
    }
}
