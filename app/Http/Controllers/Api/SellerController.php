<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seller;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sellers = Seller::has('products')->get();
        return response()->json(['data'=> $sellers],200);
    }


    /**
     * Display the specified resource.
     */
    public function show(Seller $seller)
    {
        if($seller->has('products')){
            return response()->json(['data'=>$seller],200);
        }
    }
}
