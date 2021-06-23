<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //request variables
        $emailAdd = 'frits@test.qlsnet.nl';
        $password = '4QJW9yh94PbTcpJGdKz6egwH';
        $companyId = '9e606e6b-44a4-4a4e-a309-cc70ddd3a103';
        //request variables

        $response = Http::withBasicAuth($emailAdd, $password)
                        ->withHeaders([
                            "Content-Type" => "application/json",
                            "Access-Control-Allow-Origin" => "*"
                        ])
                        ->withOptions(["base_uri" => env("API_URL")])
                        ->get("/company/" . $companyId . "/product");


        if ($response->successful()) {
            return view('product.index')->with('products', $response->collect());
        } else if ($response->failed()) {
            //return Failled Message
        } else if ($response->serverError()) {
            //return Server Error Message
        } else if ($response->clientError()) {
            //return Client Error Message
        }
        //return Error Unknown Error
    }

    public function chooseProductCombination($productId) {
        //request variables
        $emailAdd = 'frits@test.qlsnet.nl';
        $password = '4QJW9yh94PbTcpJGdKz6egwH';
        $companyId = '9e606e6b-44a4-4a4e-a309-cc70ddd3a103';
        //request variables

        $response = Http::withBasicAuth($emailAdd, $password)
                        ->withHeaders([
                            "Content-Type" => "application/json",
                            "Access-Control-Allow-Origin" => "*"
                        ])
                        ->withOptions(["base_uri" => env("API_URL")])
                        ->get("/company/" . $companyId . "/product");


        if ($response->successful()) {
            $response = $response->collect();
            $products = collect($response->only('data')->first());
            $product = $products->firstWhere('id', $productId);

            return view('product.chooseCombination')->with('product', $product);
        } else if ($response->failed()) {
            //return Failled Message
        } else if ($response->serverError()) {
            //return Server Error Message
        } else if ($response->clientError()) {
            //return Client Error Message
        }
        //return Error Unknown Error
    }
}
