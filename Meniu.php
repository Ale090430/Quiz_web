<?php
session_start();
  $_SESSION;
  include("connection.php");
  include("functions.php");
  
  $user_data= check_login($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz Navigation Menu</title>
  <link rel="stylesheet" href="meniu.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>

<div class="topnav">
  <div class="dropdown">
    <button class="dropbtn">Selectează quizul</button>
    <div class="dropdown-content">
      <a href="quiz1.html">Intrebari stiintifice</a>
      <a href="quiz2.html">Intrebari despre muzica</a>
      <a href="quiz3.html">Capitalele Europei</a>
    </div>
  </div>
  <button id="signinbtn" class="dropbtn">
    <a href="sign_in.php" style="text-decoration: none; color: white;">Register</a>
</button>
</div>

<h1 style="font-size:5vw">Be curious, ask questions!</h1>
<h5 style="font-size:2vw">Răspunde la aceste întrebări pentru a afla lucruri noi. Fiecare greșeală te ajută să gasesști răspunsul corect.</h5></br>
<button class="my_button"><a href="quiz1.html">Incepe primul quiz</a></button>
<div id="player"></div>
<div id="button-container">
  <button type="button" id="up">Up</button>
  <button type="button" id="down">Down</button>
  <button type="button" id="left">Left</button>
  <button type="button" id="right">Right</button>
</div>
<script>
  $(document).ready(function(){
      function move_right(){
          let current_pos =$("#player").css('left');
          current_pos = Number(current_pos.split('p')[0]);
          $("#player").animate({left: current_pos + 200 + 'px'});
      }
      function move_left() {
          let current_pos = $("#player").css('left');
          current_pos = Number(current_pos.split('p')[0]);
          $("#player").animate({left: current_pos - 200 + 'px'});
      }

      function move_up() {
          let current_pos = $("#player").css('top');
          current_pos = Number(current_pos.split('p')[0]);
          $("#player").animate({top: current_pos - 200 + 'px'});
      }

      function move_down() {
          let current_pos = $("#player").css('top');
          current_pos = Number(current_pos.split('p')[0]);
          $("#player").animate({top: current_pos + 200 + 'px'});
      }


      $("#up").click(move_up);

      $("#down").click(move_down);

      $("#left").click(move_left);

      $("#right").click(move_right);
      
    });
</script>
</body>
</html>




