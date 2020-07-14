<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   
    <title>Invoice</title>
    <style type="text/css">
        .head-title{
            font-weight: bold;
            text-align:center;
        }
        .brand{
            display: block;
        }
        .logo img{
            width: 50px;
            height: 50px;
        }
        .row{
            width: 100%;
            clear: both;
        }
        p {
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 13px;
        }
        
        table, thead {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th {
            text-align: left;
        }
        th, td {
            padding: 5px;
            font-size: 13px;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .grand-total{
            text-align: right;
            margin-top: 30px; 
            font-weight: bold;
            margin-bottom: 30px;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
</head>
<body>
    <section class="head-title">
       INVOICE
    </section>
    <section>
        <div class="brand">
            <div class="logo"><img src="{{ public_path('images/logo-for-pdf.jpg')}}"></div>
        </div>
    </section>
    <section>
        <hr>
        <div class="row">
            <div style="width: 50%; display: inline; float:left; height: 150px;">
                <p>
                    <b>Booking ID: </b> {{$bookings->booking_id}} <br>
                    <b>Booking Date: </b> {{$bookings->date}} <br>
                    <b>Invoice Date: </b> {{$current_date}} <br>
                </p>
            </div>
            <div style="width: 50%; display: inline;">
                <p>
                    <b>Bill To</b><br>
                    <b>{{$bookings->name}}</b> <br>
                    {{$bookings->address}}<br>
                    {{$city->city_name}} - {{$bookings->pin}}<br>
                    Assam<br>
                    Phone: {{$bookings->phone}}<br>      
                </p>
            </div>
        </div>        
    </section>
    <section>
        <div>
            <table style="width:100%">
                <thead>
                    <tr>
                      <th>Sl. No.</th>
                      <th>Service</th>
                      <th>Qty</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $count = 1;
                    ?>
                    @foreach($package as $data)
                    <tr>                    
                      <td>{{$count}}</td>
                      <td>{{$data->package_item_name}}</td>
                      <td>{{$data->package_item_qty}}</td>
                      <td>{{$data->price}}</td>
                    </tr>
                    <?php
                        $count = $count + 1;
                    ?>
                    @endforeach
                  </tbody>
            </table>
        </div>     
    </section>
    <section>
        <div class="grand-total" style="clear:both;">
            {{-- Grand Total: Rs. {{$total}} --}}
            @if($discount_price)
                <b>Subtotal  &nbsp;  {{$total}}</b><br>
                <b style="color: #009578;">Discount   &nbsp;  -{{$discounted_price}}</b><br>
                <b>Total   &nbsp;  {{$discount_price}}</b>
            @else
                <b>Total: {{$total}}</b><br>
            @endif
        </div>
    </section>
    <section>
        <div style="float:right; text-align:center;">
            <img src="{{ public_path('images/signature.jpg') }}" style="width: 70px;"><br>
            Authorized Signatory
        </div>
    </section>
</body>
</html>
