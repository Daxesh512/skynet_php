<?php

namespace App\Http\Controllers\Payment\Product;



use App\Helpers\Helper;

use App\Models\Shipping;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


use App\Models\Order;
use App\Models\Currency;
use App\Models\PaymentGatewey;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade as PDF;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;



use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use PayPal\Api\Item;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Payment;
use PayPal\Api\ItemList;
use PayPal\Rest\ApiContext;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Auth\OAuthTokenCredential;
use App\Models\Emailsetting;
use App\Models\Product;

class PaypalController extends Controller
{

    private $_api_context;
    public function __construct()
    {
        $data = PaymentGatewey::whereKeyword('paypal')->first();
        $paydata = $data->convertAutoData();
        $paypal_conf = Config::get('paypal');
        $paypal_conf['client_id'] = $paydata['client_id'];
        $paypal_conf['secret'] = $paydata['client_secret'];
        $paypal_conf['settings']['mode'] = $paydata['sandbox_check'] == 1 ? 'sandbox' : 'live';

        $this->_api_context = new ApiContext(
            new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret']
            )
        );

        $this->_api_context->setConfig($paypal_conf['settings']);
    }




    public function store(Request $request)
    {

        if (Session::has('currency')) {
            $curr = Currency::find(Session::get('currency'));
        } else {
            $curr = Currency::where('is_default', '=', 1)->first();
        }

        $available_currency = array(
            'AUD',
            'BRL',
            'CAD',
            'CNY',
            'CZK',
            'DKK',
            'EUR',
            'HKD',
            'HUF',
            'ILS',
            'JPY',
            'MYR',
            'MXN',
            'TWD',
            'NZD',
            'NOK',
            'PHP',
            'PLN',
            'GBP',
            'RUB',
            'SGD',
            'SEK',
            'CHF',
            'THB',
            'USD'
        );
        if (!in_array($curr->name, $available_currency)) {
            return redirect()->back()->with('warning', 'Invalid Currency For PayPal.');
        }



        if (!Session::has('cart')) {
            return view('errors.404');
        }

        $cart = Session::get('cart');

       
        $total = 0;
        foreach ($cart as $id => $item) {
            
            $product = Product::findOrFail($id);
            if ($product->stock < $item['qty']) {

                $notification = array(
                    'messege' =>  $product->title . ' stock not available',
                    'alert' => 'error'
                );
                return redirect()->back()->with('notification', $notification);
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

            ]);
        } else {
            $request->validate([
                'billing_name' => 'required',
                'billing_email' => 'required',
                'billing_number' => 'required',
                'billing_address' => 'required',
                'billing_country' => 'required',
                'billing_state' => 'required',

            ]);
        }

        $input = $request->all();

        
        $charge = Shipping::findOrFail($request->shipping_charge);

        $charge->cost = Helper::showPrice($charge->cost);

        $input['shipping_charge'] = json_encode($charge, true);

        $new_shipping_charge = json_decode($input['shipping_charge'], true);
        
        $final_shipping_charge = $new_shipping_charge['cost'];

     
        $title = 'Product Order';

        $cancel_url = action('Payment\Product\PaypalController@paycancle');
        $notify_url = route('product.payment.notify');

        $total  = Helper::Total($final_shipping_charge);


      

        $payer = new Payer();

        

        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName($title)
            /** item name **/
            ->setCurrency($request->currency_code)
            ->setQuantity(1)
            ->setPrice($total);
        /** unit price **/

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency($request->currency_code)
            ->setTotal($total);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription($title . ' Via Paypal');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl($notify_url)
            /** Specify return URL **/
            ->setCancelUrl($cancel_url);

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
            
        try {
            
            $payment->create($this->_api_context);
           
        } catch (PayPal\Exception\PPConnectionException $ex) {
            
            return redirect()->back()->with('unsuccess', $ex->getMessage());
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        
        /** add payment ID to session **/
        Session::put('paypal_data', $input);
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        return redirect()->back()->with('error', 'Unknown error occurred');

        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        return redirect()->back()->with('error', 'Unknown error occurred');
    }

    public function paycancle()
    {
        return redirect()->back()->with('error', 'Payment Cancelled.');
    }

    public function payreturn()
    {
        return view('front.success.product');
    }


    public function notify(Request $request)
    {

        $success_url = action('Payment\Product\PaypalController@payreturn');
        $cancel_url = route('product.payment.cancle');


        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            return redirect($cancel_url);
        }


        $input = Session::get('paypal_data');
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        if (empty($request['PayerID']) || empty($request['token'])) {
            return redirect($cancel_url);
        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request['PayerID']);
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {

            $new_shipping_charge = json_decode($input['shipping_charge'], true);
            $final_shipping_charge = $new_shipping_charge['cost'];

            $resp = json_decode($payment, true);
           
            $order = new Order();
            
            $order['txn_id'] = $resp['transactions'][0]['related_resources'][0]['sale']['id'];
            $order['cart'] = json_encode($cart, true);
            $user = Auth::user();
            $order['user_info'] = json_encode($user, true);
            $order['user_id'] = $user->id;
            $order['method'] = 'Paypal';
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




            Session::forget('paypal_data');
            Session::forget('order_data');
            Session::forget('paypal_payment_id');
            Session::forget('cart');

            return redirect($success_url);
        }

        return redirect($cancel_url);
    }
}
