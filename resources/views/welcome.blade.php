<!DOCTYPE html>
<html>
    <head>
        <title>Quiz | Welcome</title>
        <meta name="_token" content="{{ csrf_token() }}">
        <script src="https://kit.fontawesome.com/ecf7a94746.js" crossorigin="anonymous"></script>
        <script src="{{ asset('/js/app.js') }}"></script>
        
        <style>
            @import url('https://fonts.googleapis.com/css?family=Poppins&display=swap');
            body{
                background: #3865f6;
                font-family: 'Poppins', sans-serif;
            }
            .body{
                background: #fff;
                border-radius: 8px;
                width: 80%;
                height: 600px;
                transform: translate(12%,3%);
                
            }
            .num span{
                float:left;
                color: #3865f6;
                margin-top: 20px;
                margin-left: 490px;
            }
            .score span{
                float:right;
                color: #3865f6;
                margin-top: 20px;
                margin-right: 50px;
            }
            .question{
                width: 50%;
                height: 100px;
                transform: translate(50%,45%);
                background: #fff;
            }
            .pyetja p{
                padding: 20px 20px;
                text-align: center;
                color: #3865f6;
            }
            .answers{
                width: 50%;
                height: 300px;
                transform: translate(50%,25%);
                background: #fff;
            }
            .lista{
                width:80%;
                margin-left: 40px;
                
            }
            .lista li{
                color: #3865f6;
                padding: 20px 10px;
                background: #eaf0f6;
                border-radius: 8px;
                margin-top: 3px;
            }
            .lista li:hover{
                box-shadow: 0px 6px 20px 0px rgba(204,204,204,1);
            }
            .next{
                background: #fff;
                width: 20%;
                height: 50px;
                transform: translate(160%,150%);
            }
            .next button{
                transform: translate(135%,0%);
                margin-top: 10px;
                outline: none;
                background: greenyellow;
                color: white;
                border:none;
                border-radius: 50%;
                padding: 20px 25px;
            }
            #next{
                margin-left: 80px;
                padding: 21px 30px;
                background: #3865f6;
            }
            .bg:before{
                background: #fff;
                color: #3865f6;
                padding: 10px 15px;
                border-radius: 50%;
            }
            
            ol{
                counter-reset: myOrderedListItemsCounter;
              }
            ol li {
                list-style-type: none;
                position: relative;
            }
           ol li:before {
                counter-increment: myOrderedListItemsCounter;
                content: counter(myOrderedListItemsCounter)".";
                margin-right: 0.5em;
            }
        </style>
    </head>
    <body>
        <div class="body">
            <div class="con">
                <div class="num">
                    <span>Total questions 10</span>
                </div>
                <div class="score">
                    <span class="time"></span>
                </div>
                <div class="question">
                    <div class="pyetja">
                        <p>If you could switch two movie characters, what switch would lead to the most inappropriate movies?</p>
                    </div>
                </div>
                <div class="answers">
                    <div class="lista">
                        <ol id="question-answers">
                            <li class="bg">Pergjigjia 1</li>
                            <li class="bg">Pergjigjia 2</li>
                            <li class="bg">Pergjigjia 3</li>
                            <li class="bg">Pergjigjia 4</li>
                        </ol>
                    </div>
                </div>
                <div class="next">
                    <button name="next" onclick="saveAnswer()"><i class="fas fa-check"></i></button>
                    <button id="next" onclick="window.location='{{ route('run.command') }}'"><i class="fas fa-angle-right"></i></button>
                </div>
            </div>
        </div>
    </body>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>

        var time = 1;
        var correctAnswers = [];
        var currentQuestion = {};

        
        function timeInit(){
            var i=1;
            $('.time').html('Time: ' +time);
            setInterval(function(){
                time++;
                $('.time').html('Time: ' +time);
            }, 1000);
        }

        timeInit();

        Echo.channel('send.user_question.1')
            .listen('SendUserQuestion', (e) => {
                var question = e.question;

                $('.pyetja p').html(question.question);

                $('#question-answers').html('');

                question.incorrect_4 = question.correct_answer;

                for(var i=1; i<=4; i++){
                    var incorect = question['incorrect_'+i];
                    $('#question-answers').append('<li class="bg question-span" data-answer="'+incorect+'">'+incorect+'</li>')
                }

                currentQuestion = question;
                
                time = 1;

                console.log('channel listening');
            });

            $(document).on("click",".question-span",function() {
                $('.question-span').removeClass('active');
                $(this).addClass('active');
                currentQuestion.choosen_answer = $(this).data('answer');
                correctAnswers.push(currentQuestion);
                
            });

        function saveAnswer(){
            $.ajax({
              type: "POST",
              url: '/questions/store',
              data: {
                user_id: 1,
                correct_answer: correctAnswers,
              },
              headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
              success: function(res){
                $('#scores').html(res.total_points)
              },
              error: function(err){
                console.log(err);
              }
            });
        }
    </script>
</html>