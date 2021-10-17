<?php

namespace App\PaypalService;

require __DIR__ . './../../vendor/autoload.php';

use App\PaypalService\PayPalClient;
use PayPalHttp\HttpException;
use App\PaypalService\GetPayoutSample;
use App\PaypalService\CreatePayoutSample;
use PaypalPayoutsSDK\Payouts\PayoutsItemGetRequest;

class ItemGetSample
{

    /**
     * This function can be used to create payout.
     */
    public static function getPayoutItem($itemId, $debug = false)
    {
        try {
            $request = new PayoutsItemGetRequest($itemId);
            $client = PayPalClient::client();
            $response = $client->execute($request);
            if ($debug) {
                print "Status Code: {$response->statusCode}\n";
                print "Item status: {$response->result->transaction_status}\n";

                print "Links:\n";
                foreach ($response->result->links as $link) {
                    print "\t{$link->rel}: {$link->href}\tCall Type: {$link->method}\n";
                }
                // To toggle printing the whole response body comment/uncomment below line
                echo json_encode($response->result, JSON_PRETTY_PRINT), "\n";
            }
            return $response;
        } catch (HttpException $e) {
            //Parse failure response
            echo $e->getMessage() . "\n";
            $error = json_decode($e->getMessage());
            echo $error->message . "\n";
            echo $error->name . "\n";
            echo $error->debug_id . "\n";
        }
    }
}

if (!count(debug_backtrace())) {
    $payout =  CreatePayoutSample::createPayout(true);
    $response = GetPayoutSample::getPayout($payout->result->batch_header->payout_batch_id, true);
    ItemGetSample::getPayoutItem($response->result->items[0]->payout_item_id, true);
}
