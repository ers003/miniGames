<!DOCTYPE html>
<html>
    <head>
        <title>My Profile</title>
        <script src="https://kit.fontawesome.com/ecf7a94746.js" crossorigin="anonymous"></script>
         <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <style>
            @import url('https://fonts.googleapis.com/css?family=Poppins&display=swap');
            body{
                margin: 0;
                padding: 0;
                font-family: 'Poppins', sans-serif;
            }
            .header{
                background: rgb(56,101,246);
                background: linear-gradient(278deg, rgba(56,101,246,1) 0%, rgba(2,184,221,1) 100%);
                width: 100%;
                height: 170px;
            }
            .left{
                float: left;
                color: #fff;
            }
            .left h2{
                font-size: 26px;
                letter-spacing: 2px;
                margin-left: 200px;
                padding-top: 10px;
            }
            .left p{
                font-size: 12px;
                letter-spacing: 2px;
                margin-left: 200px;
                margin-top: -20px;
            }
            .right{
                float: right;
            }
            .right a{
                margin-top: 20px;
                text-decoration: none;
                color: #fff;
                font-size: 15px;
                margin-right: 150px;
            }
            .container{
                background: #f0f1f2;
                width: 100%;
                height: 485px;
            }
            .con{
                background: #fff;
                width: 70%;
                height: 500px;
                border-radius: 5px;
                transform: translate(20%,-10%);
                -webkit-box-shadow: 10px 10px 19px -6px rgba(204,204,204,1);
                -moz-box-shadow: 10px 10px 19px -6px rgba(204,204,204,1);
                box-shadow: 10px 10px 19px -6px rgba(204,204,204,1);
            } 
            .profile{
                transform: translate(-30%, 200%);
            }
            #out{
                margin-left: -120px;
            }
            #user i{
                padding-right: 5px;
            }
            #out i{
                padding-left: 10px;
            }
            #user:hover{
                color: #eaf0f6;
            }
             #out:hover{
                color: #eaf0f6;
            }
            .text{
                width: 10%;
                height: 480px;
                float: left;
                background: #fff;
            }
            .forma{
                width: 50%;
                height: 60%;
                float: right;
                background: #fff;
                transform: translate(-53%,25%);
                
            }
            .text p{
                margin-left: 70px;
                margin-top: 40px;
                letter-spacing: 2px;
                color:  #495057;
                font-weight: bold;
                font-size: 18px;
            }
            .box input[type="text"],input[type="email"],input[type="password"]{
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
                font-family: 'Nunito', sans-serif;
            }
            .box input[type="text"]:focus, .box input[type="email"]:focus,.box input[type="password"]:focus{
                width: 280px;
                border-color: #3865F6;
                font-family: 'Nunito', sans-serif;
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
            .forma p{
                font-size: 20px;
                margin-top: -10px;
                margin-left: 198px;
                margin-bottom: 50px;
            }
            
        </style>
    </head>
    <body>
        <div class="header">
            <div class="left">
                <h2>My Dashboard</h2>
                <p>Welcome to your Quiz Management System</p>
            </div>
            <div class="right">
                <div class="profile">
                    <a href="profile" id="user"><i class="fas fa-portrait"></i>My Profile</a>
                    <a href="{{ route('logout.post') }}" id="out">Log out<i class="fas fa-sign-out-alt"></i></a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="con">
               <div class="text">
                </div>
                <div class="forma">
                    <p>Settings</p>
                   <form class="box" method="post" action="{{ action('ApiController@update') }}">
                       {{csrf_field()}}
                        <input type="text" name="name" placeholder="Change name" required class="empty">
                        <input type="email" name="email" placeholder="Change email" required class="empty">
                        <input type="password" name="password" placeholder="Change password" required class="empty">
                        <button type="submit" name="submit">Save Changes</button>
                   </form>
                </div>
            </div>
        </div>
    </body>
</html>