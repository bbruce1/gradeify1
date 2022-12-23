<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Session;
use Stripe;
use Auth;
use DB;
use App\models\stripecustomer;
use App\models\transaction;
use App\Models\User;

class LogCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        \Log::info("Cron is working fine!");

        /*
           Write your database logic we bellow:
           Item::create(['name'=>'hello new']);
        */
          
        //return 0;

        $stripe_customer = DB::table('stripe_customers')
                    ->join('users', 'stripe_customers.userid', '=', 'users.id')
                    ->select('stripe_customers.*', 'users.role')
                    ->get();

        if(count($stripe_customer) > 0)
        {
            foreach($stripe_customer as $customer)
            {
                $failedtransaction_data = transaction::where('userid',$customer->userid)->where('captured',0)->count();
                $transaction_data = transaction::where('userid',$customer->userid)->orderBy('id', 'DESC')->first();

                $deduction_date = date('Y-m-d', strtotime($transaction_data->created_at->addDays(30)));
                $current_date = date("Y-m-d");
                //$current_date = "2022-05-18";

                if($current_date == $deduction_date)
                {
                    if($customer->role == 'Premium')
                    {
                        if($failedtransaction_data != 0){
                            $amount = 12 + (12 * $failedtransaction_data);
                        }else{
                            $amount = 12;
                        } 
                    }
                    else if($customer->role == 'Basic')
                    {
                        if($failedtransaction_data != 0){
                            $amount = 4 + (4 * $failedtransaction_data);
                        }else{
                            $amount = 4;
                        }
                    }

                    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

                    $charge = \Stripe\Charge::create ([
                        "amount" => $amount * 100,
                        "currency" => "usd",
                        "customer" => $customer->stripe_customer_id,
                        "description" => "Testing Payment."
                    ]);

                    if($charge->status == "succeeded")
                    {
                        $failedtransaction_data = transaction::where('userid',$customer->userid)->where('captured',0)->get();
                        foreach($failedtransaction_data as $upddata){
                            $upddata->captured = 1;
                            $upddata->update();
                        }
                        $transaction = new transaction;

                        $transaction->userid = $customer->userid;
                        $transaction->charge_id = $charge->id;
                        $transaction->amount = $charge->amount;
                        $transaction->transaction_id = $charge->balance_transaction;
                        $transaction->captured = $charge->captured;
                        $transaction->currency = $charge->currency;
                        $transaction->customer_id = $charge->customer;
                        $transaction->card_id = $charge->payment_method;

                        if($transaction->save())
                        {
                            echo "transaction succeeded.";
                        }
                        else
                        {
                            echo "not Stored in database.";
                        }
                    }
                    else
                    {
                        //echo "transaction failed.";

                        $transaction = new transaction;

                        $transaction->userid = $customer->userid;
                        $transaction->charge_id = $charge->id;
                        $transaction->amount = $charge->amount;
                        $transaction->transaction_id = $charge->balance_transaction;
                        $transaction->captured = $charge->captured;
                        $transaction->currency = $charge->currency;
                        $transaction->customer_id = $charge->customer;
                        $transaction->card_id = $charge->payment_method;

                        if($transaction->save())
                        {
                            echo "transaction failed.";
                        }
                        else
                        {
                            echo "not Stored in database.";
                        }
                    }
                }
            }
        }
    }
}
