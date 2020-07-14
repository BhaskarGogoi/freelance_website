<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Serveanything</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="{{ URL::asset('css/mail.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
</head>
<body>
    <section style="background: #ddd;">
        <div class="container">
            <div class="row">
                <div class="header">
                    <img src="../images/logo.png">
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="content">
                    {{-- <h2>Hi! {{$user['name']}}</h2> --}}
                    <h2>Hi! {{$user['name']}}</h2>
                    You have successfully signed up in our website. We are excited to serve you.We serve the following services: Electrician, Plumber, Hair Dresser, Beautician, Carpenter, Painter, Car Wash, Electronic Appliance Repairer, Laundry Service, Photographer, Graphic Designer, Sketch Artist, Web Developer, Utility Vehicle, Passenger Vehicle, Mehendi Artist, Driver, House Cleaning, Event Manager, Veterinarian, Nutritionist and many more.<br><br><br>
                    <a href="https://serveanything.in/login"><button class="visitProfileButton">Visit Profile</button></a>
                </div>                              
            </div>
        </div>
    </section>
    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="socialLogo">
                    <a href="https://www.facebook.com/serveanything-105906114383917/" target="_blank"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/serveanything/" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
                <div class="copyRightText">
                    &copy; 2020 Serveanything
                </div>                                 
            </div>
        </div>
    </section>
</body>

</html>