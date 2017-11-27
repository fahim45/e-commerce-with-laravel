<?php
/**
 * Created by PhpStorm.
 * User: fahim foysal kamal
 * Date: 17-Nov-17
 * Time: 3:50 PM
 */
?>

<div class="invoice-box" style="background-color: #efefef">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="2">
                <table border="1">
                    <tr>
                        <td style="text-align: left">
                            <img src="#" alt="Invoice"
                                 style="width:100%; max-width:300px;">
                        </td>

                        <td style="text-align: right">
                            <h3><u>Order Info:</u></h3>
                            Invoice #: {{  $order->id }}<br>
                            Created: {{ date('F d Y', strtotime( $order->created_at )) }}<br>
                            Due: {{ date('F d Y') }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="2">
                <table border="1">
                    <tr>
                        <td>
                            <h3><u>Billing Info:</u></h3>
                            {{ $customer->first_name.' '.$customer->last_name }}<br>
                            {{ $customer->email }}<br>
                            {{ $customer->phone_no }}<br>
                            {{ $customer->address }}
                        </td>

                        <td>
                            <h3><u>Shipping Info:</u></h3>
                            {{ $shipping->full_name }}<br>
                            {{ $shipping->email }}<br>
                            {{ $shipping->phone_no }}<br>
                            {{ $shipping->address }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td> <h3><u>Payment Method:</u></h3></td>
        </tr>
        <tr class="details">
            @foreach($payments as $payment)
                <td> {{ $payment->payment_type }}</td>
            @endforeach
        </tr>

        <tr class="heading">
            <td colspan="2"> <h3><u>Product Information:</u></h3></td>
        </tr>
    </table>
    <table>
        <tr>
            <th> Product Name</th>
            <th> Product Price</th>
            <th> Quantity</th>
        </tr>
        @php($sum=0)
        @foreach($products as $product)
            <tr>
                <td> {{ $product->product_name }}</td>
                <td> {{ $product->product_price }}</td>
                <td> {{ $product->product_quantity }}</td>
            </tr>
            <tr>
                <td></td>
                @php( $total = $product->product_price*$product->product_quantity )
                @php( $sum = $sum+$total )
                @endforeach
                <td rowspan="3"><b>Total Price TK. {{ $grandTotal = $sum }}</b></td>
                <td></td>
            </tr>
    </table>
</div>
