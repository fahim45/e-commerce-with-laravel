<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Shipping;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index(){
        return view('front.checkout.checkout');
    }

    public function saveCustomerInfo(Request $request){
        $this->validate($request,[
            'first_name'=>'required|regex:/^[\pL\s\-]+$/u|max:30',
            'last_name'=>'required|regex:/^[\pL\s\-]+$/u|max:30',
            'email'=>'required|email|unique:customers,email',
            'password'=>'required|alpha_num|min:6',
            'phone_no'=>'required|size:11|regex:/(01)[5-9][0-9]{8}/',
            'address'=>'required',
        ]);
        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->phone_no = $request->phone_no;
        $customer->address = $request->address;
        $customer->save();

        Session::put('customerId', $customer->id);
        Session::put('customerName', $customer->first_name.' '.$customer->last_name);

        $data = $customer->toArray();
        Mail::send('front.mail.congratulation-mail', $data, function ($message) use ($data){
            $message->to($data['email']);
            $message->subject('Congratulation Mail');
        });
        return redirect('/shipping-info');
    }

    /*public function signUpConfirmation($token){
        $customer = Customer::find($token);
        $customer->status = 1;
        $customer->token = '';
        $customer->save();
    }*/

    public function customerLogout(){
        Session::forget('customerId');
        Session::forget('customerName');

        return redirect('/');
    }

    public function customerLoginCheck(Request $request){
        $customer = Customer::where('email', $request->email)->first();

        if ($customer){
            if (password_verify($request->password, $customer->password)){
                Session::put('customerId', $customer->id);
                Session::put('customerName', $customer->first_name.' '.$customer->last_name);
                return redirect('/shipping-info');
            } else{
                return redirect('/checkout')->with('message', 'Your Password Is Invalid.');
            }
        } else{
            return redirect('/checkout')->with('message', 'Your Email Is Invalid.');
        }

    }

    public function showShippingInfo(){
        $customer = Customer::find(Session::get('customerId'));
        return view('front.checkout.shipping-info',['customer'=>$customer]);
    }

    public function saveShippingInfo(Request $request){
        $shipping = new Shipping();
        $shipping->full_name = $request->full_name;
        $shipping->email = $request->email;
        $shipping->phone_no = $request->phone_no;
        $shipping->address = $request->address;
        $shipping->save();

        Session::put('shippingId', $shipping->id);

        return redirect('/payment-info');
    }

    public function showPaymentForm(){
        return view('front.checkout.payment-form');
    }

    public function saveOrderInfo(Request $request){
        $paymentType = $request->payment_type;
        if ($paymentType == 'Cash On Delivery'){
            $order = new Order();
            $order->customer_id = Session::get('customerId');
            $order->shipping_id = Session::get('shippingId');
            $order->order_total = Session::get('grandTotal');
            $order->save();

            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->payment_type = $paymentType;
            $payment->save();

            $cartProducts = Cart::content();
            foreach ($cartProducts as $cartProduct){
                $orderDetails = new OrderDetail();
                $orderDetails->order_id = $order->id;
                $orderDetails->product_id = $cartProduct->id;
                $orderDetails->product_name = $cartProduct->name;
                $orderDetails->product_price = $cartProduct->price;
                $orderDetails->product_quantity = $cartProduct->qty;
                $orderDetails->save();
            }

            Cart::destroy();

            return redirect('/')->with('message', 'Thanks for your valuable order. We will contact with you soon.');
        } else if ($paymentType == 'bKash'){

        } else if($paymentType == 'Paypal'){

        }
    }

}
