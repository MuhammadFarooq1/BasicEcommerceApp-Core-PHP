<?php   ?>
<!DOCTYPE html>

<html>
<body>

<h1 style="text-align: center">What Can JavaScript Do?</h1>

<div class="container" style="text-align: center ; padding-top: 50px">

<h3> User can turn on or turn off the lights  </h3>

<button onclick="document.getElementById('myImage').src='image/pic_bulbon.gif'">Turn on the light</button>

<img id="myImage" src="image/pic_bulboff.gif" style="width:100px">

<button onclick="document.getElementById('myImage').src='image/pic_bulboff.gif'">Turn off the light</button>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>
</html>
