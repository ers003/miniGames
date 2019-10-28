<!DOCTYPE html>
<html>
    <head>
        <title>My Dashboard</title>
        <script src="https://kit.fontawesome.com/ecf7a94746.js" crossorigin="anonymous"></script>
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
                height: 250px;
                border-radius: 5px;
                transform: translate(20%,-15%);
                -webkit-box-shadow: 10px 10px 19px -6px rgba(204,204,204,1);
                -moz-box-shadow: 10px 10px 19px -6px rgba(204,204,204,1);
                box-shadow: 10px 10px 19px -6px rgba(204,204,204,1);
            }
            .majtas{
                float: left;
                width: 30%;
            }
            .majtas i{
                font-size: 40px;
                margin-left: 50px;
                margin-top: 90px;
                color: #cbd1d8;
            }
            .majtas p{
                margin-left: 100px;
                margin-top: -36px;
                font-size: 25px;
                color: #495057;
            }
            .djathtas{
                float: right;
                width: 65%;
                background: #fff;
                height: 100%;
            }
            .djathtas h6{
                letter-spacing: 1px;
                color: #495057;
                font-size: 14px;
                margin-left: 210px;
                
            }
            .djathtas #majtas{
                color: #495057;
                padding-top: 3px;
                padding-bottom: 3px;
                margin-left: 70px;
                background: #eaf0f6;
                width: 150px;
                text-align: center;
                font-size: 14px;
            }
            .djathtas #djathtas1{
                color: #495057;
                background: #eaf0f6;
                width: 150px;
                padding-top: 3px;
                padding-bottom: 3px;
                text-align: center;
                margin-left: 350px;
                margin-top: -42px;
                font-size: 14px;
            }
            .djathtas #djathtas2{
                color: #495057;
                background: #eaf0f6;
                width: 150px;
                padding-top: 3px;
                padding-bottom: 3px;
                text-align: center;
                margin-left: 350px;
                margin-top: -41px;
                font-size: 14px;
            }
            .djathtas #mes{
                color: #495057;
                font-size: 14px;
                background: #eaf0f6;
                width: 150px;
                padding-top: 3px;
                padding-bottom: 3px;
                text-align: center;
                margin-left: 210px;
                margin-top: 30px;
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
            .questions{
                width: 70%;
                height: 250px;
                transform: translate(20%,-9%);
            }
            .questions table{
                border-collapse: collapse;
                transform: translate(23%,23%);
            }
            .questions td{
                padding: 30px 130px;
                font-size: 30px;
            }
            #c1{
                padding-right: 10px;
            }
             #c2{
                padding-left: 10px;
            }
            .djathtas table{
                transform: translate(55%,6%);
                border-collapse: collapse;
                color: #495057;
            }
            .djathtas th,td{
                padding: 5px 70px;
                text-align: center;
                border-bottom: 1px solid #eaf0f6;
                
            }
            .djathtas th{
                background-color:  #cbd1d8;;
                color: #fff;
                font-weight: 100;
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
                <div class="majtas">
                    <i class="fas fa-golf-ball"></i>
                    <p>{{$point[0]->total_points}} points</p>
                </div>
                <div class="djathtas">
                    <table>
                        <thead>
                            <th>Top 5 best players!!!</th>
                        </thead>
                       <tbody>
                            @foreach($rank as $el)
                                <tr><td>{{$el->name}}</td></tr>
                            @endforeach
                       </tbody>
                   </table>
                </div>
            </div>
            <div class="questions">
                <table>
                    <tr>
                        <td id="c1" style="color:greenyellow;"><i class="fas fa-check"></i></td>
                        <td id="c2" style="color: #495057;">{{ $data[0]->numero }}</td>
                        <td id="c1" style="color:red;"><i class="fas fa-times"></i></td>
                        <td id="c2" style="color: #495057;">{{ 10 - $data[0]->numero }}</td>
                    </tr>
                    <tr id="ic">
                        <td colspan="2" style="font-size: 16px;color: greenyellow;text-align: center;padding-top: 5px;">Correct</td>
                        <td colspan="2" style="font-size: 16px;color:red;text-align: center;padding-top: 5px;">Incorrect</td>
                    </tr>
                </table>   
            </div>
        </div>
    </body>
</html>