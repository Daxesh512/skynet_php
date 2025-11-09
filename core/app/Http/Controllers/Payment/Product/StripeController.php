<?php

namespace App\Http\Controllers\Payment\Product;

use Carbon\Carbon;
use App\Models\Order;
use App\Helpers\Helper;
use App\Models\Product;
use App\Models\Currency;
use App\Models\Shipping;
use Illuminate\Support\Str;
use App\Models\Emailsetting;
use Illuminate\Http\Request;
use App\Models\PaymentGatewey;
use Barryvdh\DomPDF\Facade as PDF;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

class StripeController extends Controller
{

    public function __construct()
    {
        $data = PaymentGatewey::whereKeyword('stripe')->first();
        $paydata = $data->convertAutoData();
        Config::set('services.stripe.key',  $paydata['key']);
        Config::set('services.stripe.secret', $paydata['secret']);
    }


    public function store(Request $request)
    {
        

        if (Session::has('currency')) {
            $curr = Currency::find(Session::get('currency'));
        } else {
            $curr = Currency::where('is_default', '=', 1)->first();
        }
        
        $available_currency = array(
            'USD',
            'AED',
            'AFN',
            'ALL',
            'AMD',
            'ANG',
            'AOA',
            'ARS',
            'AUD',
            'AWG',
            'AZN',
            'BAM',
            'BBD',
            'BDT',
            'BGN',
            'BIF',
            'BMD',
            'BND',
            'BOB',
            'BRL',
            'BSD',
            'BWP',
            'BZD',
            'CDF',
            'CAD',
            'CHF',
            'CLP',
            'CNY',
            'COP',
            'CRC',
            'CVE',
            'CZK',
            'DJF',
            'DKK',
            'DOP',
            'DZD',
            'EGP',
            'ETB',
            'EUR',
            'FJD',
            'FKP',
            'GBP',
            'GEL',
            'GIP',
            'GMD',
            'GNF',
            'GTQ',
            'GYD',
            'HKD',
            'HNL',
            'HRK',
            'HTG',
            'HUF',
            'IDR',
            'ILS',
            'INR',
            'ISK',
            'JMD',
            'JPY',
            'KES',
            'KGS',
            'KHR',
            'KMF',
            'KRW',
            'KYD',
            'KZT',
            'LAK',
            'LBP',
            'LKR',
            'LRD',
            'LSL',
            'MAD',
            'MDL',
            'MGA',
            'MKD',
            'MMK',
            'MNT',
            'MOP',
            'MRO',
            'MUR',
            'MVR',
            'MWK',
            'MXN',
            'MYR',
            'MZN',
            'NAD',
            'NGN',
            'NIO',
            'NOK',
            'NPR',
            'NZD',
            'PAB',
            'PEN',
            'PGK',
            'PHP',
            'PKR',
            'PLN',
            'PYG',
            'QAR',
            'RON',
            'RSD',
            'RUB',
            'RWF',
            'SAR',
            'SBD',
            'SCR',
            'SEK',
            'SGD',
            'SHP',
            'SLL',
            'SOS',
            'SRD',
            'STD',
            'SZL',
            'THB',
            'TJS',
            'TOP',
            'TRY',
            'TTD',
            'TWD',
            'TZS',
            'UAH',
            'UGX',
            'UYU',
            'UZS',
            'VND',
            'VUV',
            'WST',
            'XAF',
            'XCD',
            'XOF',
            'XPF',
            'YER',
            'ZAR',
            'ZMW'
        );
        if (!in_array($curr->name, $available_currency)) {
            return redirect()->back()->with('warning', 'Invalid Currency For Stripe.');
        }
        
        

        $success_url = action('Payment\Product\PaypalController@payreturn');
        $cancel_url = route('product.payment.cancle');

        if (!Session::has('cart')) {
            return view('errors.404');
        }

        $cart = Session::get('cart');

       
        $total = 0;
        foreach ($cart as $id => $item) {

            
            $product = Product::findOrFail($id);

            

            if ($product->stock < $item['qty']) {
                return redirect()->back()->with('warning', 'Title : '.$product->title.'. Stock Not Available',);
            }
           
        }

      

        if (isset($request->is_ship)) {
            $request->validate([
                'shipping_name' => 'required',
                'shipping_email' => 'required',
                'shipping_number' => 'required',
                'shipping_address' => 'required',
                'shipping_country' => 'required',
                'shipping_state' => 'required',
                'shipping_zip_code' => 'required',
                'billing_name' => 'required',
                'billing_email' => 'required',
                'billing_number' => 'required',
                'billing_address' => 'required',
                'billing_country' => 'required',
                'billing_state' => 'required',

                'card_number' => 'required',
                'cvc' => 'required',
                'month' => 'required',
                'year' => 'required',
            ]);
        } else {

            $request->validate([
                'billing_name' => 'required',
                'billing_email' => 'required',
                'billing_number' => 'required',
                'billing_address' => 'required',
                'billing_country' => 'required',
                'billing_state' => 'required',

                'card_number' => 'required',
                'cvc' => 'required',
                'month' => 'required',
                'year' => 'required',
            ]);
        }

        $stripe = Stripe::make(Config::get('services.stripe.secret'));

        try {
            $token = $stripe->tokens()->create([
                'card' => [
                    'number' => $request->card_number,
                    'exp_month' => $request->month,
                    'exp_year' => $request->year,
                    'cvc' => $request->cvc,
                ],
            ]);

            if (!isset($token['id'])) {
                return back()->with('error', 'Token Problem With Your Token.');
            }

            $cart = Session::get('cart');



            $input = $request->all();

            $chargess = Shipping::findOrFail($request->shipping_charge);

            $chargess->cost = Helper::showPrice($chargess->cost);

            $input['shipping_charge'] = json_encode($chargess, true);

            $new_shipping_charge = json_decode($input['shipping_charge'], true);

            $final_shipping_charge = $new_shipping_charge['cost'];


            

            $charge = $stripe->charges()->create([
                'card' => $token['id'],
                'currency' => Helper::showCurrencyCode(),
                'amount' =>  Helper::Total($final_shipping_charge),
                'description' => 'Product Order',
            ]);

          

            if ($charge['status'] == 'succeeded') {

                $order = new Order();
                $order['txn_id'] = $charge['balance_transaction'];
                $order['cart'] = json_encode($cart, true);
                $user = Auth::user();
                $order['user_info'] = json_encode($user, true);
                $order['user_id'] = $user->id;
                $order['method'] = 'Stripe';
                $order['order_number'] = Str::random(8);
                $order['payment_status'] = 1;
                $order['order_status'] = 0;
                $order['shipping_charge_info'] = $input['shipping_charge'];
                $order['total'] = Helper::Total($final_shipping_charge);
                $order['qty'] = count($cart);

                $order['currency_name'] = $input['currency_code'];
                $order['currency_sign'] =  $input['currency_sign'];
                $order['currency_value'] =  $input['currency_value'];

                $order['shipping_name'] =  $input['shipping_name'];
                $order['shipping_email'] =  $input['shipping_email'];
                $order['shipping_address'] =  $input['shipping_address'];
                $order['shipping_number'] =  $input['shipping_number'];
                $order['shipping_country'] =  $input['shipping_country'];
                $order['shipping_state'] =  $input['shipping_state'];
                $order['shipping_zip'] =  $input['shipping_zip_code'];
                $order['shipping_state'] =  $input['shipping_state'];

                $order['billing_name'] =  $input['billing_name'];
                $order['billing_email'] =  $input['billing_email'];
                $order['billing_number'] =  $input['billing_number'];
                $order['billing_address'] =  $input['billing_address'];
                $order['billing_country'] =  $input['billing_country'];
                $order['billing_state'] =  $input['billing_state'];
                $order['billing_zip'] =  $input['billing_zip_code'];
                $order['billing_state'] =  $input['billing_state'];
                $order['created_at'] =  Carbon::now();

                $order->save();
                $order_id = $order->id;


                foreach ($cart as $id => $item) {
                    $product = Product::findOrFail($id);
                    $stock = $product->stock - $item['qty'];
                    Product::where('id', $id)->update([
                        'stock' => $stock
                    ]);
                }

                $fileName = Str::random(4) . time() . '.pdf';
                $path = 'assets/front/invoices/product/' . $fileName;
                $data['order']  = $order;
                $pdf = PDF::loadView('pdf.product', $data)->save($path);


                Order::where('id', $order_id)->update([
                    'invoice_number' => $fileName
                ]);

                // Send Mail to Buyer
                $mail = new PHPMailer(true);
                $user = Auth::user();

                $em = Emailsetting::first();

                if ($em->is_smtp == 1) {
                    try {

                        $mail->isSMTP();
                        $mail->Host       = $em->smtp_host;
                        $mail->SMTPAuth   = true;
                        $mail->Username   = $em->smtp_user;
                        $mail->Password   = $em->smtp_pass;
                        $mail->SMTPSecure = $em->email_encryption;
                        $mail->Port       = $em->smtp_port;

                        //Recipients
                        $mail->setFrom($em->from_email, $em->from_name);
                        $mail->addAddress($user->email, $user->name);

                        // Attachments
                        $mail->addAttachment('assets/front/invoices/product/' . $fileName);

                        // Content
                        $mail->isHTML(true);
                        $mail->Subject = "Order placed for Product";
                        $mail->Body    = 'Hello <strong>' . $user->name . '</strong>,<br/>Your order has been placed successfully. We have attached an invoice in this mail.<br/>Thank you.';

                        $mail->send();
                    } catch (Exception $e) {
                        // die($e->getMessage());
                    }
                } else {
                    try {

                        //Recipients
                        $mail->setFrom($em->from_mail, $em->from_name);
                        $mail->addAddress($user->email, $user->name);

                        // Attachments
                        $mail->addAttachment('assets/front/invoices/product/' . $fileName);

                        // Content
                        $mail->isHTML(true);
                        $mail->Subject = "Order placed for Product";
                        $mail->Body    = 'Hello <strong>' . $user->name . '</strong>,<br/>Your order has been placed successfully. We have attached an invoice in this mail.<br/>Thank you.';

                        $mail->send();
                    } catch (Exception $e) {
                        // die($e->getMessage());
                    }
                }


                Session::forget('cart');

                return redirect($success_url);
            }
        } catch (Exception $e) {
            return back()->with('warning', $e->getMessage());
        } catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
            return back()->with('warning', $e->getMessage());
        } catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
            return back()->with('warning', $e->getMessage());
        }

        return back()->with('warning', 'Please Enter Valid Credit Card Informations.');
    }
}
