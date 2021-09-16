<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Requests\Product\Upsert;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $data = $this->productService->collection($request->all());
        // return new productcollection
        return response()->json($data);
    }

    public function show($id){
        $data = $this->productService->resource($id);
        return response()->json($data);
    }

    public function store(Upsert $request){
        $data = $this->productService->store($request->all());
        return response()->json($data);
    }

    public function update($id ,Upsert $request){
        $data = $this->productService->update($id, $request->all());
        return response()->json($data);
    }

    public function destroy($id, Request $request){
        $data = $this->productService->delete($id);
        return response()->json($data);
    }
}
