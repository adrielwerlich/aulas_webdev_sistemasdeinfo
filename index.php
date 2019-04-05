<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <title>Skeleton</title>
 <style>

    /* .input-group-addon:first-child {
        border-right: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    } */

    .input-group-addon{
        max-width: 74px;
    }

    .input-group-addon {
        width: 14%;
        white-space: nowrap;
        vertical-align: middle;
        display: table-cell;
        box-sizing: border-box;
        padding: 12px 12px;
        font-size: 14px;
        font-weight: 400;
        line-height: 1;
        color: #555;
        text-align: center;
        background-color: #eee;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    #middle-content {
        align-items: center;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
    }

    #login-form {
        border: 4px solid green;
        padding: 30px;
    }
 
 </style>
</head>
<body>
    <div class="container">
        <?php
            $cache_limiter = session_cache_limiter();
            $cache_expire = session_cache_expire();
            echo "O limitador de cache está definido agora como $cache_limiter<br />"; 
            echo "As sessões em cache irão expirar depois de $cache_expire minutos";
        ?>
   
<script>
    var cache_time = <?php echo $cache_expire ?>; 
    // console.log('cache time', cache_time)

    var count_down = new Date();
    count_down.setMinutes(count_down.getMinutes() + cache_time); 
    count_down = new Date(count_down);

     // Update the count down every 1 second
    var x = setInterval(function() {

        // Get todays date and time
        var now = new Date().getTime();


        // Find the distance between now and the count down date
        var distance = count_down - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"

        document.getElementById("timer").innerHTML = "Tempo para expirar sessão: " + 
            days + "d " + hours + "h " +
            minutes + "m " + seconds + "s ";

        // If the count down is finished, write some text 
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("timer").innerHTML = "OPENNED";
        }
    }, 1000);
</script>
<br><br>
    <div id="timer"></div>
</div>    

<div id="middle-content">
<?php

// foreach ($_POST as $key => $value) {
//     echo '<p>'.$key.'</p>';
//     echo '<p>'.$value.'</p>';
// }
//     echo empty($_POST['controls']);

    if ( ( isset($_POST['controls']) && $_POST['controls'] !== 'set_controls') || 
         ( isset($_POST['sair']) && $_POST['sair'] !== 'get_out') || empty($_POST)) 
    {
        $_POST = array();
        require('includes/login-form.php');
    }

if ( (isset($_POST['login']) && $_POST['login'] == 'login') &&  
        (isset($_POST['password']) && $_POST['password'] == 'pass') ) 
{
    // echo 'login done';
    $_POST = array();
    $_POST['controls'] = 'set_controls';
    require('includes/controls-form.php');

    
} elseif (isset($_POST['clientes'])){
  #echo 'clientes  ==>>  ' . $_POST['clientes'] . '<br><br><br>';
  require('includes/controls-form.php');
  require("includes/clientes-form.php");
 } elseif (isset($_POST['produtos'])){
  #echo 'produtos  ==>>  ' . $_POST['produtos'] . '<br><br><br>';
  require('includes/controls-form.php');
  require("includes/produtos-form.php");
 
 } elseif (isset($_POST['pedidos'])){
  #echo 'pedidos  ==>>  ' . $_POST['pedidos'] . '<br><br><br>';
  require('includes/controls-form.php');
  require("includes/pedidos-form.php");

 } elseif (isset($_POST['sair'])){
  #echo 'sair  ==>>  ' . $_POST['sair'] . '<br><br><br>';
  $_POST = array();
  $_POST['sair'] = 'get_out';
  $_SESSION = array();
  session_unset();
  session_destroy();
  require('includes/login-form.php');

 } elseif (isset($_POST['controls']) && $_POST['controls'] == 'set_controls' ) {
     
    require('includes/controls-form.php');

} elseif ( isset($_POST['sair']) && $_POST['sair'] != 'get_out') {
     echo 'post empty';
     require('includes/login-form.php');
} elseif ( isset($_POST['client-detail']) && $_POST['client-detail'] != 'show-detail')  {

} elseif ( isset($_POST['add-client']) ) {
    require('includes/controls-form.php');
    require("includes/client-detail-form.php");
} elseif ( isset($_POST['add-product']) ) {
    require('includes/controls-form.php');
    require("includes/product-detail-form.php");
} elseif ( isset($_POST['add-request']) ) {
    require('includes/controls-form.php');
    require("includes/request-detail-form.php");
}
?>

 </div>

 <div id="footer">
 </div>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>