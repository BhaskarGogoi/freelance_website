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
                    <b>Booking ID: </b> {{$data['order_id']}} <br>
                    <b>Booking Date: </b> {{$data['date']}} <br>
                    <b>Invoice Date: </b> {{$data['invoice_date']}} <br>
                </p>
            </div>
            <div style="width: 50%; display: inline;">
                <p>
                    <b>Bill To</b><br>
                    <b>{{$data['bill_to']}}</b> <br>
                    {{$data['address']}}<br>
                    {{$data['city']}} - {{$data['pin']}}<br>
                    Assam<br>
                    Phone: {{$data['phone']}}<br>      
                </p>
            </div>
        </div>        
    </section>
    <section>
        <div>
            <table style="width:100%">
                <thead>
                    <tr>
                      <th>Service</th>
                      <th>Qty</th>
                      <th>Gross Amount</th>
                      <th>Discount</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>{{$data['product']}}</td>
                      <td>{{$data['qty']}}</td>
                      <td>{{$data['price']}}</td>
                      <td>-{{$data['offer_price']}}</td>
                      <td>{{$data['discounted_price']}}</td>
                    </tr>
                  </tbody>
            </table>
        </div>       
    </section>
    <section>
        <div class="grand-total" style="clear:both;">
            Grand Total: Rs. {{$data['discounted_price']}}
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
