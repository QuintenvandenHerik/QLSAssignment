<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ShipmentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($productId, $productCombinationId)
    {
        //request variables
        $emailAdd = 'frits@test.qlsnet.nl';
        $password = '4QJW9yh94PbTcpJGdKz6egwH';
        $companyId = '9e606e6b-44a4-4a4e-a309-cc70ddd3a103';
        $brandId = 'e41c8d26-bdfd-4999-9086-e5939d67ae28';


        $order = [
           'number' => '#958201',
           'billing_address' => [
              'companyname' => 'My Great Company B.V.',
              'name' => '',
              'street' => 'Bamendawg',
              'housenumber' => '18',
              'address_line_2' => '',
              'zipcode' => '3319GS',
              'city' => 'Dordrecht',
              'country' => 'NL',
              'email' => 'emailaddress@example.org',
              'phone' => '0101234567',
           ],
           'delivery_address' => [
              'companyname' => '',
              'name' => 'John Doe',
              'street' => 'Bamendawg',
              'housenumber' => '18',
              'address_line_2' => '',
              'zipcode' => '3319GS',
              'city' => 'Dordrecht',
              'country' => 'NL',
           ],
           'order_lines' => [
              [
                 'amount_ordered' => 2,
                 'name' => 'Jeans - Black - 36',
                 'sku' => 69205,
                 'barcode' =>  'JB36',
              ],
              [
                 'amount_ordered' => 1,
                 'name' => 'Sjaal - Rood Oranje',
                 'sku' => 25920,
                 'barcode' =>  'SJA2940291',
              ]
           ]
        ];
        //request variables

        $response = Http::withBasicAuth($emailAdd, $password)
                        ->withHeaders(["Content-Type" => "application/json", "Access-Control-Allow-Origin" => "*"])
                        ->withOptions(["base_uri" => env("API_URL")])
                        ->post("/company/" . $companyId . "/shipment/create", [
                            'brand_id' => $brandId,
                            'reference' => $order['number'],
                            'weight' => 1000,
                            'product_id' => $productId,
                            'product_combination_id' => $productCombinationId,
                            'cod_amount' => 0,
                            'piece_total' => 1,
                            'receiver_contact' => [
                                'companyname' => $order['delivery_address']['companyname'],
                                'name' => $order['delivery_address']['name'],
                                'street' => $order['delivery_address']['street'],
                                'housenumber' => $order['delivery_address']['housenumber'],
                              'postalcode' => $order['delivery_address']['zipcode'],
                                'locality' => $order['delivery_address']['city'],
                                'country' => $order['delivery_address']['country'],
                                'email' => $order['billing_address']['email'],
                            ]
                        ]);

        if ($response->successful()) {
            return view('shipment.show')->with('shipment', $response->collect());
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
