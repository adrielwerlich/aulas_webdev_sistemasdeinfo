<?php

$result = null;

if ($_GET['type'] === 'prod') {

    $pdo = new PDO('mysql:host=localhost;dbname=db_abc_bolinhas', 'root', '', []);
    $sql = "SELECT * FROM tb_produtos WHERE id_produto=".$_GET['id'];
    $prod = $pdo->query($sql);
    
    $result = $prod->fetch(PDO::FETCH_OBJ);
} elseif($_GET['type'] === 'searchByClientName') {

    $pdo = new PDO('mysql:host=localhost;dbname=db_abc_bolinhas', 'root', '', []);
    $name = $_GET['name'];
    $sql = "SELECT nome FROM tb_clientes WHERE LOCATE('$name',nome) > 0";
    $name = $pdo->query($sql);
    
    // $result = $name->fetch(PDO::FETCH_BOTH);//$sql;
    $result = [];
    while ($row = $name->fetch(PDO::FETCH_OBJ)) {
        array_push($result, $row);
    }

    // $result = $_GET['name'];

} else {
    $pdo = new PDO('mysql:host=localhost;dbname=db_abc_bolinhas', 'root', '', []);
    $sql = "SELECT * FROM tb_clientes WHERE id_cliente=".$_GET['id'];
    $prod = $pdo->query($sql);
    
    $result = $prod->fetch(PDO::FETCH_OBJ);
}


// print "<p>Hello World</p>";

$a = json_encode($result);
echo $a;

?>