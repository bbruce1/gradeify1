<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use Session;
use Stripe;
use Auth;
use DB;
use App\models\stripecustomer;
use App\models\transaction;
use App\Models\User;
    
class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }
   
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        if($request->plantype == 'Premium')
        {
            $amount = 12;
        }
        else if($request->plantype == 'Basic')
        {
            $amount = 4;   
        }

        $user = Auth::user();

        $check = stripecustomer::where('userid',$user->id)->first();

        if($check)
        {
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            $charge = \Stripe\Charge::create ([
                "amount" => $amount * 100,
                "currency" => "usd",
                "customer" => $check->stripe_customer_id,
                "description" => "Testing Payment."
            ]);

            if($charge->status == "succeeded")
            {
                $transaction = new transaction;

                $transaction->userid = $user->id;
                $transaction->charge_id = $charge->id;
                $transaction->amount = $charge->amount;
                $transaction->transaction_id  = $charge->balance_transaction;
                $transaction->captured = $charge->captured;
                $transaction->currency  = $charge->currency;
                $transaction->customer_id  = $charge->customer;
                $transaction->card_id  = $charge->payment_method;

                if($transaction->save())
                {
                    Session::flash('success', 'Payment successful!');
                    return back();   
                }
                else
                {
                    Session::flash('error', 'not Stored in database!');
                    return back();   
                }
            }
            else
            {
                Session::flash('error', 'Payment fail!');
                return back();
            }
        }
        else
        {
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            $customer = \Stripe\Customer::create([
                "email" => $user->email,
                "source" => $request->stripeToken,
                "description" => "Testing Customer."
            ]);

            $stripe_customer = new stripecustomer;

            $stripe_customer->userid = $user->id;
            $stripe_customer->payment_method = "stripe";
            $stripe_customer->stripe_customer_id = $customer->id;
            $stripe_customer->stripe_card = $customer->default_source;
            $stripe_customer->payer_email = $customer->email;

            if($stripe_customer->save())
            {
                \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

                $charge = \Stripe\Charge::create ([
                    "amount" => $amount * 100,
                    "currency" => "usd",
                    "customer" => $stripe_customer->stripe_customer_id,
                    "description" => "Testing Payment."
                ]);

                if($charge->status == "succeeded")
                {
                    $transaction = new transaction;

                    $transaction->userid = $user->id;
                    $transaction->charge_id = $charge->id;
                    $transaction->amount = $charge->amount;
                    $transaction->transaction_id  = $charge->balance_transaction;
                    $transaction->captured = $charge->captured;
                    $transaction->currency = $charge->currency;
                    $transaction->customer_id = $charge->customer;
                    $transaction->card_id = $charge->payment_method;

                    if($transaction->save())
                    {
                        $user_update = User::where('id',$user->id)->first();
                        $user_update->role = $request->plantype;

                        if($user_update->update())
                        {
                            Session::flash('success', 'Payment successful!');
                            return back();
                        }
                    }
                    else
                    {
                        Session::flash('error', 'not Stored in database!');
                        return back();
                    }
                }
                else
                {
                    Session::flash('error', 'Payment fail!');
                    return back();
                }
            }
        }
    }

    public function cron()
    { 
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