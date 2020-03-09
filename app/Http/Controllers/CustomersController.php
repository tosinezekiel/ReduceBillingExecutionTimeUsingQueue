<?php

namespace App\Http\Controllers;
use App\Customer;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class CustomersController extends Controller
{
	
    public function update(){
    	$customers = Customer::where('billed',1)->get();

    	ProcessBilling::dispatch($customers);

        return view('customer.success');
    }
}
