<div class="container">
<div class="row">
    <h1 class="text-warning">Pedidos Form</h1>

<form action="#" method="post" class="col-sm-12">
    <input type="hidden" name="add-request">
    <button type="submit" class="btn btn-info">Add Pedidos</button>
</form>

 <!-- <form action="#" class="col-sm-12"> -->
     
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id Req</th>
      <th scope="col">Prod Desc</th>
      <th scope="col">Vl Unit</th>
      <th scope="col">Qtt</th>
      <th scope="col">Tot</th>
      <th scope="col">Obs</th>
      <th scope="col">Img</th>
      <th scope="col">Del</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    

  <?php
  
  
  $sql = "SELECT * FROM tb_pedidos";
  $req = $pdo->query($sql);

  while ($row = $req->fetch(PDO::FETCH_OBJ)) {

    $sql = "SELECT * FROM tb_pedido_produtos WHERE id_pedido = $row->id_pedido";
    
    $req_prod_query = $pdo->query($sql);
    $req_prod = $req_prod_query->fetch(PDO::FETCH_OBJ);
    // echo "is null? -> " . !empty($req_prod) ;
    if ( !empty($req_prod) ){
      $sql = "SELECT * FROM tb_produtos WHERE id_produto = $req_prod->id_produto";
      $prod_query = $pdo->query($sql);
      $prod = $prod_query->fetch(PDO::FETCH_OBJ);
  
      echo "<tr>";
      echo "<th scope='row'>{$row->id_pedido}</td>";
      echo "<td>{$prod->descricao}</td>";
      echo "<td>{$prod->valor}</td>";
      echo "<td>{$req_prod->quantidade}</td>";
      echo "<td>{$req_prod->valor}</td>";
      echo "<td>{$req_prod->observacao}</td>";
      echo "<td> <img src={$prod->imagem} style='max-width:30%' alt='product photo'> </td>";
      
      echo "<td>
      
      <form method='POST' name='deleteRequest'>
      <input type='hidden' name='requestId' value='{$row->id_pedido}'>
      <button class='btn' type='submit' name='deleteRequest'><i class='fas fa-user-minus'></i>delete</button>
      </form> 
      </td>
      <td>  
      <form method='POST' name='editRequest'> 
      <input type='hidden' name='requestId' value='{$row->id_pedido}'>
      <button class='btn' type='submit' name='editRequest'><i class='fas fa-edit'></i>edit</button>
      </form>
      
      </td>";
      echo "</tr>";
    }
   
  }
 
  ?>


  </tbody>
    </table>

<!-- </form> -->
</div>
</div>