<div class="container" style="width: 95%">
<div class="row">
  <h1 class="text-warning col-sm-12">Clientes Form</h1>
 <form action="#" method="post" class="col-sm-12">
    <input type="hidden" name="add-client">
    <button type="submit" class="btn btn-info">Add Client</button>
 </form>

<?php
  try {
    // $pdo = new PDO('mysql:host=localhost;dbname=db_abc_bolinhas', 'root', '', []);
    $status = $pdo->getAttribute(PDO::ATTR_CONNECTION_STATUS);
    // echo " pdo status -> $status";
  } catch (PDOException $e) {
    echo '<br><br><br>Erro ao conectar com o MySQL!!!<br><br>' . $e->getMessage();
    exit();
  }
?>

 <form action="#" method="post" style="width: 100%">
  
 <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nome</th>
      <th scope="col">Endereço</th>
      <th scope="col">Número</th>
      <th scope="col">Obs</th>
      <th scope="col">Cep</th>
      <th scope="col">Bairro</th>
      <th scope="col">Cidade</th>
      <th scope="col">Estado</th>
      <th scope="col">Telefone</th>
      <th scope="col">Email</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
  <?php

    
    $sql = "SELECT * FROM tb_clientes";
    $clients = $pdo->query($sql);

    while ($row = $clients->fetch(PDO::FETCH_OBJ)) {

      echo "<tr>";
      echo "<th scope='row'>{$row->id_cliente}</td>";
      echo "<td>{$row->nome}</td>";
      echo "<td>{$row->endereco}</td>";
      echo "<td>{$row->numero}</td>";
      echo "<td>{$row->observacao}</td>";
      echo "<td>{$row->cep}</td>";
      echo "<td>{$row->bairro}</td>";
      echo "<td>{$row->cidade}</td>";
      echo "<td>{$row->estado}</td>";
      echo "<td>{$row->telefone}</td>";
      echo "<td>{$row->email}</td>";
      
      echo "<td><form action='' method='POST' name='editClient{$row->id_cliente}'>
      <input type='hidden' name='idClient' value='{$row->id_cliente}'>
      <button class='btn' type='submit' name='editClient'><i class='fas fa-edit'></i>edit</button>
      </form>
      <form action='' method='POST' name='deleteClient{$row->id_cliente}'>
      <input type='hidden' name='idClient' value='{$row->id_cliente}'>
      <button class='btn' type='submit' name='deleteClient'><i class='fas fa-user-minus'></i>delete</button>
      </form></td>";
      echo "</tr>";
    }
   
    ?>
   
  </tbody>
  
</table>
</form>
</div>
</div>