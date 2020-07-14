
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Login Screen">
  <meta name="author" content="Bhaskarjyoti Gogoi">
  <link rel="icon" type="image/png" href="../images/favicon.png">
  <title>Comming Soon</title>
  <!-- Favicon -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/style.v3.0.css">
  
  <style type="text/css">      
    .commingsoon-card{
        width: 400px;
        margin: 0 auto;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }
    .commingsoon-card-header{
        margin-bottom: -10px;
    }
    .commingsoon-card-header h3{
        color: #fff;
        font-weight: bold;
    }
    .commingsoon-card-body{
        margin-top: -20px;
        text-align: center;
    }
    .commingsoon-card-body h5{
        line-height: 1.5em;
        margin-bottom: 30px;
        color: #fff;
        text-shadow: 1px 2px 2px #444;
    }
    .commingsoon-card-body input{
        position: relative;
        display: inline-block;
        font-size: 15px;
        box-sizing: border-box;
        transition: .5s;
    }
    .commingsoon-card-body input[type="text"]
    {
        background: #fff;
        width: 200px;
        height: 40px;
        border: none;
        outline: none;
        padding: 0 25px;
        border-radius: 15px 0 0 15px;

    }
    .commingsoon-card-body input[type="submit"] {
        position: relative;
        border-radius: 0 15px 15px 0;
        width: 100px;
        height: 40px;
        border: none;
        outline: none;
        cursor: pointer;
        background: #ffc107;
        color: #fff;
        left: -5px;
        font-weight: bold;
    }
    .commingsoon-card-body input[type="submit"]:hover{
        background: #ff5722;
    }
   
    .commingsoon-card button{
        width: 140px;
        margin-top: 10px;
        border: none;
        height: 40px;
        transition: 0.3s all ease-in-out;
        background-image: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    .commingsoon-card button:hover{
        background: #000;
        color: #fff;
    }
    @media (max-width: 768px) {
        .commingsoon-card{
            width: 340px;
            margin: 0 auto;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            margin-bottom: 20px;
        }
    }
  
  </style>
</head>

<body style="background-image: linear-gradient(-225deg, #FFE29F 0%, #FFA99F 48%, #FF719A 100%);">
  <div class="container">
    <div class="commingsoon-card">
      <div class="commingsoon-card-header mb-5 text-center">
        <a href="/"><img src="../images/logo.png" style="width: 100px; height: 100px;"></a><br><br>
        <h3>Coming Soon</h3>
      </div>
      <div class="commingsoon-card-body">
        <h5>Our services will soon be at your doorstep. For instant updates and hundreds of benefits click on "Notify Me ". Hurry up !!!!</h5>
        <form action="/notify/{{$category}}" method="POST">
          @csrf
          <input type="text" name="phone"  pattern="[0-9]*" inputmode="numeric"  placeholder="Mobile No." required>
          <input type="submit" name="submit" value="Notify Me">
        </form><br><br>
        <button class="btn btn-primary"
            action="action"
            onclick="window.history.go(-1); return false;"
            type="submit"><i class="fas fa-chevron-circle-left"></i> Go Back
        </button
      </div>      
    </div>
  </div>
</body>

</html>