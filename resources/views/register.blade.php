<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Quiz | Register</title>
        
        <!-- Fonts -->
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/ecf7a94746.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    
        <!-- Style -->
        <style>
            body{
                background-color: #3865F6;
                font-family: 'Nunito', sans-serif;
            }
            .forma{
                background: #fff;
                width: 900px;
                height: 550px;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%,-50%);
            }
            .text{
                text-align: center;
                width: 500px;
                margin-left: 190px;
               
            }
            .text h2{
                color: #8c8989;
                font-weight: bolder;
            }
            .text p{
                margin-top: -10px;
                color: #2c3133;
                font-family: 'Nunito', sans-serif;
            }
            .login{
                background: #fff;
                width: 500px;
                height: 250px;
                margin-left: 190px;
                margin-top: 50px;
            }
            .box input[type="email"],.box input[type="password"],.box input[type="text"],.box input[type="number"]{
                border: 0;
                background: none;
                display: block;
                margin: 20px auto;
                text-align: center;
                border: 2px solid #c6c6e0;
                padding: 14px 10px;
                width: 250px;
                outline: none;
                border-radius: 24px;
                transition: 0.25s;
                color: #9fc8d6;
            }
            .box input[type="email"]:focus,.box input[type="password"]:focus,.box input[type="text"]:focus,.box input[type="number"]:focus{
                width: 280px;
                border-color: #3865F6;
            }
            .box button{
                border: 0;
                background: #3865F6;
                display: block;
                margin: 20px auto;
                padding: 14px 40px;
                outline: none;
                border-radius: 24px;
                transition: 0.25s;
                cursor: pointer;
                color: white;
                border: none;
                width: 270px;
                font-family: 'Nunito', sans-serif;
            }
           .login .box p{
                color: #2c3133;
                font-size: 14px;
                text-align: center;
                margin-top: 50px;
               transform: translateY(-190%);
            }
            .login .box a{
                text-decoration: none;
                color: #3865F6;
                text-align: center;
                margin-top: 50px;
                
            }
            .login .box a:hover{
               font-weight: bold;
            }
            .box .empty{
                 font-family: 'Nunito', sans-serif;
            }
            .text img{
                width: 100px;
                height: 60px;
                transform: translate(0,35%);
            }
            .login{
                transform: translateY(-10%);
            }
           
            .alert{
                margin-left: 100px;
                margin-top: 20px;
                color: red;
            }
            .success{
                margin-left: 60px;
                margin-top: 20px;
                color: greenyellow;
            }
        </style>
    </head>
    <body>
        <div class="forma">
            <div class="text">
                <img src="{{URL('/images/quiz.png')}}"/>
                <h2>Sign Up</h2>
            </div>
            <div class="login">
                <form class="box" method="post" action="{{ route('register.post') }}">
                    <input type="text" name="name"  pattern="[a-zA-Z]{1,}" placeholder="Name" required id="iconified1" class="empty">
                    <input type="email" name="email" placeholder="Email" required id="iconified1" class="empty">
                    <input type="number" name="phone" placeholder="Phone" required id="iconified1" class="empty">
                    <input type="password" name="password" placeholder="Password" required id="iconified2" class="empty">
                    <button type="submit" name="register">Sign Up</button>
                    <p>Have account?<a href="login">Sign In</a></p>
                </form>
               
            </div>
            @if(Session::has('error'))
                <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    <strong>Error! </strong>{{Session::get('error')}}
                </div>
            @endif

            @if(Session::has('success'))
                <div class="success">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    <strong>Success! </strong>{{Session::get('success')}}
                </div>
            @endif
        </div>
    </body>
</html>