<?php
namespace App\Services;

use App\Models\Product;

class ProductService
{
    private $productObj;

    public function __construct(Product $productObj)
    {
        $this->productObj = $productObj;
    }

    public function collection($inputs = null)
    {
        $with = [];
        if(isset($inputs['include']) && !empty($inputs['include'])){
            $with = explode(',', $inputs['include']);
        }
        return $this->productObj->with($with)->get();
    }

    public function resource($id){
        $product = $this->productObj->find($id);
        // $product->orders;
        if (!empty($product)) {
            return $product;
        } else {
            return ['error' => ['Product is not found.']];
        }
    }

    public function store($inputs){
        $product = $this->productObj->create($inputs);
        return $product;
    }

    public function update($id, $inputs){
        $product = $this->resource($id);
        if(isset($product['error'])){
            return $product;
        }
        $product->update($inputs);
        return $product;
    }

    public function delete($id){
        $product = $this->resource($id);
        if(isset($product['error'])){
            return $product;
        }
        $product = $product->delete();
        return ['success' => $product];
    }
}