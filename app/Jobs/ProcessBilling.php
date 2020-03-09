<?php

namespace App\Jobs;
use App\Customer
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Guzzle\Http\Exception\ClientErrorResponseException;
use GuzzleHttp\Client;
class ProcessBilling implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $tries = 10;
    protected $client;
    protected $customers;
    public function __construct($customers)
    {
        $this->customers = $customers;
        $this->client = new Client(["base_uri" => "https://telco.com"]);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach($this->customers as $customer){
            try{
                $request = $client->post('/bank', [
                    'form_params' => [
                        'username' => $customer->username,
                        'amount_to_bill' => $customer->amount_to_bill
                    ]
                ]);
                $response = $request->send();
                if($response){
                    $billedCustomer = Customer::where('id',$customer->id)->first()->update(['status',0]);
                }
            }catch(ClientErrorResponseException $e){
                return $e->getResponse()->getBody(true);
            }
        }
    }

}
