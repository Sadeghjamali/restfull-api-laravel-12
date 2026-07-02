<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Models\Buyer;
use Illuminate\Http\Request;

class BuyerController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buyers = Buyer::has('transactions')->get();
        return $this->showAll($buyers);
    }

    /**
     * Display the specified resource.
     */
    public function show(Buyer $buyer)
    {
        if($buyer->has('transactions')){
            return $this->showOne($buyer);
        }  
    }
}
