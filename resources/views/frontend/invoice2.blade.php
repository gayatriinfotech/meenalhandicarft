<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Example 1</title>
</head>
<style>
    .clearfix:after {
        content: "";
        display: table;
        clear: both;
    }

    a {
        color: #5D6975;
        text-decoration: underline;
    }

    body {
        position: relative;
        width: 19cm;
        height: 29.7cm;
        margin: 0 auto;
        color: #001028;
        background: #FFFFFF;
        font-family: Arial, sans-serif;
        font-size: 12px;
        font-family: Arial;
    }

    header {
        padding: 10px 0px;
        margin-bottom: 30px;
    }

    #logo {
        text-align: center;
        margin-bottom: 10px;
    }

    #logo img {
        width: 200px;
    }

    h1 {
        border-top: 1px solid #5D6975;
        border-bottom: 1px solid #5D6975;
        color: #5D6975;
        font-size: 2.4em;
        line-height: 1.4em;
        font-weight: normal;
        text-align: center;
        margin: 0 0 20px 0;
        background: url(https://s3-eu-west-1.amazonaws.com/htmlpdfapi.production/free_html5_invoice_templates/example1/dimension.png);
    }

    #project {
        float: left;
    }

    #project span {
        color: #5D6975;
        text-align: right;
        width: 52px;
        margin-right: 10px;
        display: inline-block;
        font-size: 0.8em;
    }

    #company {
        float: right;
        text-align: right;
    }

    #project div,
    #company div {
        white-space: nowrap;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px;
    }



    table th,
    table td {
        text-align: center;
    }

    table th {
        padding: 5px 20px;
        color: #5D6975;
        border-bottom: 1px solid #C1CED9;
        white-space: nowrap;
        font-weight: normal;
    }

    table .service,
    table .desc {
        text-align: left;
    }

    table td {
        padding: 20px;
        text-align: right;
    }

    table td.service,
    table td.desc {
        vertical-align: top;
    }

    table td.unit,
    table td.qty,
    table td.total {
        font-size: 1.2em;
        text-align: center;
    }

    table td.grand {
        border-top: 1px solid #5D6975;
        
    }

    #notices .notice {
        color: #5D6975;
        font-size: 1.2em;
    }

    footer {
        color: #5D6975;
        width: 100%;
        height: 30px;
        position: absolute;
        /* bottom: 0; */
        border-top: 1px solid #C1CED9;
        padding: 8px 0;
        text-align: center;
    }
</style>

<body>
    <header class="clearfix">
        <h1>INVOICE</h1>
        <div id="company" class="clearfix">
            <div><b>Sold By,</b></div>
            <div>Meenal Handcraft</div>
            <div>Solapur,<br />Maharashtra</div>
            <div>(602) 519-0450</div>
            <div><a href="mailto:company@example.com">meenalhandcraft@gmail.com</a></div>
        </div>
        <div id="project">
            <div><b>Ship To,</b></div>
            @php
            $count = 1;
            $total = 0;
            @endphp
            @foreach($data as $order_id => $cart)
            @if($count == 1)
            <div>{{$cart['name']}}</div>
            <div>{{$cart['address']}}</div>
            <div>{{$cart['landmark']}}</div>
            <div>{{$cart['city']}} {{$cart['pincode']}}</div>
            <div>{{$cart['state']}}</div>
            <div>{{$cart['number']}}</div>
            <div>PAYMENT MODE : CASH</div>
            @endif

            @php
            $count++;
            $shipping = $cart['shipping'];
            $total = $total + $cart['total'];
            @endphp
            @endforeach

        </div>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th class="service">PRODUCT</th>
                    <th class="desc">ORDER ID</th>
                    <th>PRICE</th>
                    <th>QTY</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $order_id => $cart)
                <tr>
                    @foreach($product as $p)
                    @if($cart['product_id'] == $p->id)
                    <td class="service">{{$p->product_name}}</td>
                    @endif
                    @endforeach
                    <td class="desc">{{$cart['order_id']}}</td>
                    <td class="unit">Rs. {{$cart['price']}}</td>
                    <td class="qty">{{$cart['quantity']}}</td>
                    <td class="total">Rs. {{$cart['total']}}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="4">SUBTOTAL</td>
                    <td class="total">Rs. {{$total}}</td>
                </tr>
                <tr>
                    <td colspan="4">SHIPPING</td>
                    <td class="total">Rs. {{$shipping}}</td>
                </tr>
                <tr>
                    <td colspan="4" class="grand total">GRAND TOTAL</td>
                    <td class="grand total">Rs. {{$shipping + $total}}</td>
                </tr>
            </tbody>
        </table>
        <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">Write note here.</div>
        </div>
    </main>
    <footer>
        Invoice was created on a computer and is valid without the signature and seal.
    </footer>
</body>

</html>