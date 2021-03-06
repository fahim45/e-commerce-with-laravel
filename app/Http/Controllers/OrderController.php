<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Product;
use App\Shipping;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function manageOrderInfo(){
        $orders = DB::table('orders')
                        ->join('customers', 'orders.customer_id', '=', 'customers.id')
                        ->join('payments', 'orders.id', '=', 'payments.order_id')
                        ->select('orders.*', 'customers.first_name', 'customers.last_name', 'payments.payment_type', 'payments.payment_status')
                        ->orderBy('orders.id', 'DESC')
                        ->get();
        return view('admin.order.manage-order',['orders'=>$orders]);
    }

    public function viewOrderInfo($id){
        $order = Order::find($id);
        $customer = Customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);
        $products = OrderDetail::where('order_id',$order->id)->get();
        return view('admin.order.view-order',[
            'customer'=>$customer,
            'shipping'=>$shipping,
            'products'=>$products
        ]);
    }

    public function viewOrderInvoice($id){
        $order = Order::find($id);
        $customer = Customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);
        $products = OrderDetail::where('order_id',$order->id)->get();
        $payment = DB::table('orders')
            ->join('payments', 'orders.id', '=', 'payments.order_id')
            ->select('orders.id', 'payments.payment_type')
            ->where('order_id',$order->id)
            ->get();
       // return $payment;
//        return $products;
        return view('admin.order.view-invoice',[
            'order'=>$order,
            'payments'=>$payment,
            'customer'=>$customer,
            'shipping'=>$shipping,
            'products'=>$products
        ]);
    }
    public function invoicePdf($id){
        $order = Order::find($id);
        $customer = Customer::find($order->customer_id);
        //return $customer;
        $shipping = Shipping::find($order->shipping_id);
        $products = OrderDetail::where('order_id',$order->id)->get();
        $payment = DB::table('orders')
            ->join('payments', 'orders.id', '=', 'payments.order_id')
            ->select('orders.id', 'payments.payment_type')
            ->where('order_id',$order->id)
            ->get();

        $pdf = PDF::loadView('admin.order.invoice',[
            'order'=>$order,
            'payments'=>$payment,
            'customer'=>$customer,
            'shipping'=>$shipping,
            'products'=>$products
        ]);
        $invoiceName = $customer->first_name.' '.$customer->last_name;
        //return $invoiceName;
        return $pdf->stream($invoiceName.'.pdf');
        /*return $pdf->download('invoice.pdf');*/ /*For Directly Download*/
    }

    public function editOrderInfo($id){
        $order = Order::find($id);
        return view('admin.order.edit-order',[
            'order'=>$order
        ]);
    }

    public function updateOrderInfo(Request $request){
        $id = $request->id;

        $order = Order::find($id);
        $order->order_status = 'Successfully';
        $order->save();

        $payment = Payment::where('order_id', $id)->first();
        $payment->payment_status = 'Successfully';
        $payment->save();

        $orderDetails = OrderDetail::where('order_id', $id)->get();
        foreach ($orderDetails as $orderDetail){
            $product = Product::find($orderDetail->product_id);
            $product->product_quantity = $product->product_quantity - $orderDetail->product_quantity;
            $product->save();
        }

        return redirect('/manage-order')->with('message', 'Order Info Updated Successfully.');
    }
}
