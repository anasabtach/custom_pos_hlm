<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Receipt</title>
    <style>
        body {
            font-family: "Courier New", Courier, monospace;
            width: 300px;
            margin: 0 auto;
            text-align: center;
        }
        h2 {
            margin: 0;
        }
        .receipt {
            border-top: 2px solid #000;
            border-bottom: 2px solid #000;
            padding: 10px 0;
            margin-top: 10px;
        }
        .details, .items, .totals, .footer {
            margin-top: 10px;
        }
        .details, .footer {
            font-size: 14px;
        }
        .items, .totals {
            font-size: 12px;
            text-align: left;
        }
        .items table, .totals table {
            width: 100%;
            margin-top: 10px;
        }
        .items td, .totals td {
            padding: 5px 0;
        }
        .totals {
            border-top: 1px solid #000;
            padding-top: 10px;
        }
        .totals td {
            font-weight: bold;
        }
        .footer {
            margin-top: 20px;
            font-size: 10px;
        }
    </style>
</head>
{{-- onload="window.print()" --}}
<body onload="window.print()">
    <h2>HLM POS</h2>
    {{-- <div class="details">
        43 Manchester Road<br>
        12480 Brisbane<br>
        Australia<br>
        617-3236-6207
    </div> --}}

    <div class="receipt">
        Invoice: {{ $bill_data->sale_id }} &nbsp;&nbsp; Date: {{ getCustomDate($bill_data->created_at) }}<br>
        {{-- Table: 25 &nbsp;&nbsp; Time: 12:45 --}}
    </div>

    <div class="items">
        <table>
            @foreach($bill_data->saleItems AS $key=>$bill)
                <tr>
                    <td>{{ $bill->quantity }} {{ $bill->product->name }} {{ (!is_null($bill->product_variation_id)) ? "| {$bill->productVariation->unit->name}" : '' }}</td>
                    <td align="right">{{ number_format($bill->price,2) }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="totals">
        <table>
            <tr><td>Received</td><td align="right">{{ number_format($bill_data->received_amount, 2) }}</td></tr>
            <tr><td>Return</td><td align="right">{{ number_format($bill_data->return_amount, 2) }}</td></tr>
            <tr><td>Discount</td><td align="right">{{ number_format($bill_data->discount, 2) }}</td></tr>
            <tr><td>Total</td><td align="right">{{ number_format($bill_data->total, 2) }}</td></tr>
            {{-- <tr><td>Sales/Gov Tax - 5%</td><td align="right">16.36</td></tr>
            <tr><td>Service Charge - 10%</td><td align="right">32.73</td></tr> --}}
            {{-- <tr><td>GRAND TOTAL</td><td align="right">376.40</td></tr> --}}
        </table>
    </div>

    <div class="footer">
        Thank you and see you again!<br>
        {{-- Cash: 400.00 &nbsp;&nbsp; Change: 23.60<br>
        Bring this bill back within the next 10 days<br>
        and get 15% discount on that day's food bill... --}}
    </div>
</body>
</html>
