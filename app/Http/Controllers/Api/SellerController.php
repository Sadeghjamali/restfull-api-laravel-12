<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\Seller;

class SellerController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sellers = Seller::has('products')->get();
        return $this->showAll($sellers);
    }


    /**
     * Display the specified resource.
     */
    public function show(Seller $seller)
    {
        if($seller->has('products')){
            return $this->showOne($seller);
        }
    }
}
