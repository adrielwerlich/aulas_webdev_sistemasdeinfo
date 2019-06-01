<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <title>Document</title>
</head>
<body>
 
 <div id="header">
 <div class="container">
 <div class="row">
 <form action="#" method="post" class="mt-5">
  <button class="btn btn-success" name="clientes" type="submit">CLIENTES</button>
  <button class="btn btn-success" name="produtos" type="submit">PRODUTOS</button>
  <button class="btn btn-success" name="pedidos" type="submit">PEDIDOS</button>
  <button class="btn btn-success" name="sair" type="submit">SAIR</button>
  <?php

      if (isset($_POST['clientes'])){
       echo 'login  ==>>  ' . $_POST['clientes'] . '<br><br><br>';

      } elseif (isset($_POST['clientes'])){
       echo 'passw  ==>>  ' . $_POST['produtos'] . '<br><br><br>';
      
      } elseif (isset($_POST['clientes'])){
       echo 'passw  ==>>  ' . $_POST['pedidos'] . '<br><br><br>';

      } elseif (isset($_POST['clientes'])){
       echo 'passw  ==>>  ' . $_POST['sair'] . '<br><br><br>';
      }


  ?>
 </form> 
 </div>
 </div>
 </div>

 <div id="middle-content">
 </div>

 <div id="footer">
 </div>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>