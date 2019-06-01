<div class="container">
<div class="row">
    <h1 class="text-warning">Produtos Form</h1>
 
 <form action="#" method="post" class="col-sm-12">
    <input type="hidden" name="add-product">
    <button type="submit" class="btn btn-info">Add Produtos</button>
</form>

<form action="#" class="col-sm-12">
 
 <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Picture</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

  <?php
  
  $sql = "SELECT * FROM tb_produtos";
  $products = $pdo->query($sql);

  while ($row = $products->fetch(PDO::FETCH_OBJ)) {

    echo "<tr>";
    echo "<th scope='row'>{$row->id_produto}</td>";
    echo "<td>{$row->descricao}</td>";
    echo "<td>{$row->valor}</td>";
    echo "<td> <img src={$row->imagem} style='max-width:30%' alt='product photo'> </td>";
    
    echo "<td><form action='' method='POST' name='editProduct{$row->id_produto}'>
    <input type='hidden' name='idProduct' value='{$row->id_produto}'>
    <button class='btn' type='submit' name='editProduct'><i class='fas fa-edit'></i>edit</button>
    </form>
    <form action='' method='POST' name='deleteProduct{$row->id_produto}'>
    <input type='hidden' name='idProduct' value='{$row->id_produto}'>
    <button class='btn' type='submit' name='deleteProduct'><i class='fas fa-user-minus'></i>delete</button>
    </form></td>";
    echo "</tr>";
  }
 
  ?>
  </tbody>
</table>

</form>
</div>
</div>