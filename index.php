<html lang="en">
<head>
 <!-- <meta charset="UTF-8"> -->
 <meta charset="iso-8859-1">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel="icon" href="./assets/images/skeleton.jpg">
 <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <title>Skeleton</title>
 <style>
/* some change */
    /* .input-group-addon:first-child {
        border-right: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    } */

    .go-right{
        margin-left: 7%;
    }

    #alerts li {
        cursor: pointer;
    }

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

    #controls {
        margin: 0% 1% 0% 1%;
    }

    #email {
        margin: 1.69% 1% 0% 1%;
    }

    #tel {
        margin: 1% 1% 0% 0%;
    }

    #logo {
        margin: 1%;
    }
 
 </style>
</head>
<body>
    <!-- <div class="container">
        <?php
            // $cache_limiter = session_cache_limiter();
            // $cache_expire = session_cache_expire();
            // echo "O limitador de cache está definido agora como $cache_limiter<br />"; 
            // echo "As sessões em cache irão expirar depois de $cache_expire minutos";
        ?>
   
<script>
    // var cache_time = <?php echo $cache_expire ?>; 
    // // console.log('cache time', cache_time)

    // var count_down = new Date();
    // count_down.setMinutes(count_down.getMinutes() + cache_time); 
    // count_down = new Date(count_down);

    //  // Update the count down every 1 second
    // var x = setInterval(function() {

    //     // Get todays date and time
    //     var now = new Date().getTime();


    //     // Find the distance between now and the count down date
    //     var distance = count_down - now;

    //     // Time calculations for days, hours, minutes and seconds
    //     var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    //     var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    //     var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    //     var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    //     // Display the result in the element with id="demo"

    //     document.getElementById("timer").innerHTML = "Tempo para expirar sessão: " + 
    //         days + "d " + hours + "h " +
    //         minutes + "m " + seconds + "s ";

    //     // If the count down is finished, write some text 
    //     if (distance < 0) {
    //         clearInterval(x);
    //         document.getElementById("timer").innerHTML = "OPENNED";
    //     }
    // }, 1000);
</script>
<br><br>
    !-- <div id="timer"></div> --
    </div>     -->

    <div id="header">
    
   
        <?php
            $serializedPost = serialize($_POST);
            echo "first echo serializing post array -> " . $serializedPost;

            if ( (isset($_POST['login']) && $_POST['login'] == 'login') &&  
            (isset($_POST['password']) && $_POST['password'] == 'pass') ||
            isset($_POST['clientes']) || isset($_POST['produtos']) ||
            isset($_POST['pedidos']) ||  isset($_POST['add-client']) ||
            (isset($_POST['controls']) && $_POST['controls'] == 'set_controls') ||
            isset($_POST['add-product']) || isset($_POST['add-request']) || 
            (isset($_POST['editClient']) && isset($_POST['idClient'])) 
            ) 
            {
                // echo "<nav class='navbar navbar-light nav nav-tabs' style='background-color: #e3f2fd;'>
                // <div class='row' style='width: 100%'>
                //     <a id='logo' class='navbar-brand' href='#'>
                //         <img src='./assets/images/brand-bootstrap-solid.svg' width='30' height='30' alt=''>
                //         Company Name
                //     </a>";
                echo "<div class='row'>
                    <div class='container'>";
                        require('includes/controls-form.php');
                echo "</div>
                </div>";

            }
        ?>

    </div>

<div id="middle-content">
<?php
    $pdo = new PDO('mysql:host=localhost;dbname=db_abc_bolinhas', 'root', '', []);
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
    elseif ( (isset($_POST['login']) && $_POST['login'] == 'login') &&  
    (isset($_POST['password']) && $_POST['password'] == 'pass') ||
    isset($_POST['clientes']) || isset($_POST['produtos']) ||
    isset($_POST['pedidos']) ||  isset($_POST['add-client']) ||
    (isset($_POST['controls']) && $_POST['controls'] == 'set_controls') ||
    isset($_POST['add-product']) || isset($_POST['add-request']) || 
    (isset($_POST['editClient']) && isset($_POST['idClient'])) 
    ) 
    {
        // echo "<div class='row'>
        //     <div id='news' class='col-xs-12 col-sm-8'>";
        //         require('partials/news.php');    
        // echo "</div>";
        // echo  "<div id='alerts' class='col-xs-12 col-sm-3 go-right'>";
        //         require('partials/alerts.php');    
        // echo "</div>
        // </div>";
        
    }
if (isset($_POST['clientes'])){
  require("includes/clientes-form.php");
 } elseif (isset($_POST['produtos'])){
  require("includes/produtos-form.php");
 
 } elseif (isset($_POST['pedidos'])){
  require("includes/pedidos-form.php");

 } elseif (isset($_POST['sair'])){
  $_POST = array();
  $_POST['sair'] = 'get_out';
  $_SESSION = array();
  session_unset();
  session_destroy();
  require('includes/login-form.php');

 } elseif (isset($_POST['controls']) && $_POST['controls'] == 'set_controls' ) {
     
    // require('includes/controls-form.php');

} elseif ( isset($_POST['sair']) && $_POST['sair'] != 'get_out') {
     echo 'post empty';
     require('includes/login-form.php');
} elseif ( isset($_POST['client-detail']) && $_POST['client-detail'] != 'show-detail')  {

} elseif ( isset($_POST['add-client']) ) {
    // require('includes/controls-form.php');
    require("includes/client-detail-form.php");
} elseif ( isset($_POST['add-product']) ) {
    // require('includes/controls-form.php');
    require("includes/product-detail-form.php");
} elseif ( isset($_POST['add-request']) ) {
    // require('includes/controls-form.php');
    require("includes/request-detail-form.php");
} elseif ( isset($_POST['addClient']) && $_POST['addClient'] === 'saveNewClient' ) {
    // echo " post array " .  serialize($_POST);
	try {
		
		$status = $pdo->getAttribute(PDO::ATTR_CONNECTION_STATUS);
		// echo " pdo status -> $status";
	} catch (PDOException $e) {
		echo '<br><br><br>Erro ao conectar com o MySQL!!!<br><br>' . $e->getMessage();
		exit();
	}

	if ( isset($_POST['addClient']) ) {

			$novo_cliente = array('nome' => $_POST['clientName'], 'endereco' => $_POST['address'],
				'numero' => $_POST['number'], 'observacao' => $_POST['obs'], 'cep' => $_POST['postcode'],
				'bairro' => $_POST['neighborhood'], 'cidade' => $_POST['city'], 'estado' => $_POST['province'], 
				'telefone' => $_POST['phoneNumber'], 'email' => $_POST['email']);
			
			$stmt = $pdo->prepare("INSERT INTO tb_clientes (nome,endereco,numero,observacao,cep,
				bairro,cidade,estado,telefone,email) VALUES (:nome,:endereco,:numero,:observacao,
				:cep,:bairro,:cidade,:estado,:telefone,:email)");
			
			$stmt->execute($novo_cliente);
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			// echo " statement result -->> " . $result;

			if ($stmt->rowCount() > 0) {
				require('includes/controls-form.php');
				require("includes/clientes-form.php");
			} else {
				echo "<br><br><br>ERRO novo!!!!!";
			}

	}
} elseif ( isset($_POST['editClient']) && isset($_POST['idClient'])  ) {

	// require('includes/controls-form.php');
	require("includes/client-detail-form.php");
	
} elseif (isset($_POST['makeEditClient']) && $_POST['idClient'] > 0) {
	// execute actual client update
	$edit_cliente = array('id' => $_POST['idClient'], 'nome' => $_POST['clientName'],
	'endereco' => $_POST['address'], 'numero' => $_POST['number'], 'observacao' => $_POST['obs'], 
	'cep' => $_POST['postcode'], 'bairro' => $_POST['neighborhood'], 'cidade' => $_POST['city'],
	'estado' => $_POST['province'], 'telefone' => $_POST['phoneNumber'], 'email' => $_POST['email']);
	 
	 
 
 $stmt = $pdo->prepare("UPDATE tb_clientes SET nome = :nome,endereco = :endereco,numero = :numero,
	 observacao = :observacao,cep = :cep,bairro = :bairro,cidade = :cidade,estado = :estado,
	 telefone = :telefone,email = :email WHERE id_cliente = :id");

 $stmt->execute($edit_cliente);

 $result = $stmt->fetch(PDO::FETCH_ASSOC);
 

 if ($stmt->rowCount() > 0) {
     echo " updating client " ;
	//  require('includes/controls-form.php');
     require("includes/clientes-form.php");
     $_POST = [];
 } else {
     $_POST = [];
	 echo "<br><br><br>ERRO novo!!!!!";
 }
} elseif (isset($_POST['deleteClient']) && $_POST['idClient'] > 0) {

    $del_client = array('id' => $_POST['idClient']);

    $stmt = $pdo->prepare("DELETE FROM tb_clientes WHERE id_cliente = :id");

    $stmt->execute($del_client);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
   

    if ($stmt->rowCount() > 0) {
        require('includes/controls-form.php');
        echo " statement delete result -->> " . $result;
        require("includes/clientes-form.php");
        $_POST = [];
    } else {
        echo "<br><br><br>ERRO novo!!!!!";
    }
} elseif (isset($_POST['addProduct']) ) {
    
    echo "serializing files array -> " . serialize($_FILES);
    $enc_img = 'data:' . $_FILES['image']['type'] . ';base64,' .
    base64_encode(file_get_contents($_FILES['image']['tmp_name']));

    // $image = addslashes($_FILES['image']['tmp_name']);
    // $image = file_get_contents(addslashes($_FILES['image']['tmp_name']));
	// $image = base64_encode($image);
    $new_product = array('descr' => $_POST['prod-desc'],
                         'value_' => $_POST['price'],
                         'img' => $enc_img);
			
        $stmt = $pdo->prepare("INSERT INTO tb_produtos ( descricao, valor, imagem )
            VALUES (:descr , :value_ , :img )");
			
        $stmt->execute($new_product);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() > 0) {
            require('includes/controls-form.php');
            require("includes/produtos-form.php");
        } else {
            echo "<br><br><br>ERRO novo!!!!!";
        }
} elseif (isset($_POST['editProduct']) ) {
    require("includes/product-detail-form.php");
} elseif (isset($_POST['makeEditProduct']) ) {

    // echo "is empty files array? -> " . isset_file($_FILES['image']['error']);
    // echo "serializing files array -> " . serialize($_FILES['image']);
    echo "serializing post array -> " . serialize($_POST['prod-desc']);
    // echo "serializing files error -> " . ( !empty($_FILES['image']['tmp_name'])  );

    $id = $_POST['prodId'];

    $enc_img = 'data:' . $_FILES['image']['type'] . ';base64,' .
    base64_encode(file_get_contents($_FILES['image']['tmp_name']));

    if ( !empty($_FILES['image']['tmp_name']) ) {
        echo " files array is not empty ";
        $image = file_get_contents(addslashes($_FILES['image']['tmp_name']));
        
        $edit_product = array('id' => $id, 
                        'desc_' => $_POST['prod-desc'],
                        'val' => $_POST['price'], 
                        'img' => $enc_img);

                         
        $stmt = $pdo->prepare("UPDATE tb_produtos SET descricao = :desc_, valor = :val , imagem = :img
            WHERE id_produto = :id ");
        
        $stmt->execute($edit_product);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo " statement edit result with img -->> " . $result;

    } else {
        $edit_product = array('id' => $id, 
                        'desc_' => $_POST['prod-desc'],
                        'val' => $_POST['price']);

        echo " serializing edit product array " . serialize($edit_product);

        $stmt = $pdo->prepare("UPDATE tb_produtos SET descricao = :desc_, valor = :val WHERE id_produto = :id ");

        echo " <br> dumping stmt obj -->> " ;
        $stmt->debugDumpParams();

        $stmt->execute($edit_product);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo " statement row count edit result withouth img -->> " . $stmt->rowCount();
    }

 
    if ($stmt->rowCount() > 0) {
        echo "updated product id $id";
        require('includes/controls-form.php');
        require("includes/produtos-form.php");
        $_POST = [];
    } else {
        echo "<br><br><br>ERRO novo!!!!!";
        $_POST = [];
    }
} elseif (isset($_POST['deleteProduct']) && $_POST['idProduct'] > 0) {


    $id = $_POST['idProduct'];

    $del_prod = array('id' => $id);

    $stmt = $pdo->prepare("DELETE FROM tb_produtos WHERE id_produto = :id");

    $stmt->execute($del_prod);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
   

    if ($stmt->rowCount() > 0) {
        echo " statement delete product -->> " . $id;
        require('includes/controls-form.php');
        require("includes/produtos-form.php");
        $_POST = [];
    } else {
        echo "<br><br><br>ERRO novo!!!!!";
        $_POST = [];
    }
} elseif (isset($_POST['addRequest']) ) {
    
    
            
		try {
			$new_req = array(
				'idCli' => $_POST['cod-cli'],
				'timeNow' => date("Y-m-d H:i:s"),
				'obs' => $_POST['obs']
			);
			$stmt = $pdo->prepare("INSERT INTO tb_pedidos ( data_hora,	id_cliente, observacao )
				VALUES (:timeNow , :idCli , :obs )");		

        $stmt->execute($new_req);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $request_id = $pdo->lastInsertId();
        
        if ($stmt->rowCount() > 0) {

            $productsCounter = $_POST["products-counter"];
            
            // echo 'products counter -> ' . $productsCounter;

            for ($i = 1; $i <= $productsCounter; $i++) {

                $prodIdIndex = strpos($serializedPost, "prod-id-$i");
                $serializedPost = substr($serializedPost, $prodIdIndex);
                $indexOfComma = strpos($serializedPost, ";");
                $size = 10;
                if ($i > 9){
                    $size = 11;
                } elseif ($i > 99) {
                    $size = 12;
                }
                $prodId = substr($serializedPost, $size, $indexOfComma );

                echo 'serialized post after ' . substr($serializedPost, $prodIdIndex);    

                // echo ' <br >$prodIdIndex ' . $prodIdIndex . ' finish <br>';
                // echo ' <br >index of comma ' . $indexOfComma . ' finish <br>';

                //
                $prodIdIndex = strpos($serializedPost, "prod-qtt-");
                $serializedPost = substr($serializedPost, $prodIdIndex);
                $indexOfComma = strpos($serializedPost, ";");
                $prodQtt = substr($serializedPost, 9, $indexOfComma - 1);

                // //
                $prodIdIndex = strpos($serializedPost, "prod-total-");
                $serializedPost = substr($serializedPost, $prodIdIndex);
                $indexOfComma = strpos($serializedPost, ";");
                $prodTt = substr($serializedPost, 11, $indexOfComma - 1);

                // //
                $prodIdIndex = strpos($serializedPost, "prod-obs-");
                $serializedPost = substr($serializedPost, $prodIdIndex);
                $indexOfComma = strpos($serializedPost, ";");
                $prodObs = substr($serializedPost, 9, $indexOfComma );
                $indexOfComma = strpos($prodObs, ";");
                $prodObs = substr($prodObs, 0, $indexOfComma - 1);

                echo '<br> is empty ? ==>  ' . $prodObs . '<br>' . '. Index of comma ' . $indexOfComma;   


                $newReqProd = array(
                    'idReq' => $request_id,
                    'idProd' => $prodId,
                    'prodQtt' => $prodQtt,
                    'prodTt' => $prodTt,
                    'prodObs' => $prodObs,
                );

                echo 'inserting array ' . serialize($newReqProd);

                $stmt = $pdo->prepare("INSERT INTO tb_pedido_produtos 
                ( id_pedido, id_produto, quantidade, valor, observacao )
                VALUES (:idReq , :idProd , :prodQtt , :prodTt , :prodObs  )");

                $stmt->execute($newReqProd);
            }

            echo 'row count -> ' . $stmt->rowCount();

            require('includes/controls-form.php');
            require("includes/pedidos-form.php");
        } else {
            echo "<br><br><br>ERRO novo!!!!!";
        }
				
		} catch(Exception $e) {
			echo 'Exception -> ';
			var_dump($e->getMessage());
		}
} elseif (isset($_POST['editProduct']) ) {
    require("includes/product-detail-form.php");
} elseif (isset($_POST['makeEditProduct']) ) {

    // echo "is empty files array? -> " . isset_file($_FILES['image']['error']);
    // echo "serializing files array -> " . serialize($_FILES['image']);
    echo "serializing post array -> " . serialize($_POST['prod-desc']);
    // echo "serializing files error -> " . ( !empty($_FILES['image']['tmp_name'])  );

    $id = $_POST['prodId'];

    if ( !empty($_FILES['image']['tmp_name']) ) {
        echo " files array is not empty ";
        $image = file_get_contents(addslashes($_FILES['image']['tmp_name']));
        
        $edit_product = array('id' => $id, 
                        'desc_' => $_POST['prod-desc'],
                        'val' => $_POST['price'], 
                        'img' => $image);

                         
        $stmt = $pdo->prepare("UPDATE tb_produtos SET descricao = :desc_, valor = :val , imagem = :img
            WHERE id_produto = :id ");
        
        $stmt->execute($edit_product);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo " statement edit result with img -->> " . $result;

    } else {
        $edit_product = array('id' => $id, 
                        'desc_' => $_POST['prod-desc'],
                        'val' => $_POST['price']);

        echo " serializing edit product array " . serialize($edit_product);

        $stmt = $pdo->prepare("UPDATE tb_produtos SET descricao = :desc_, valor = :val WHERE id_produto = :id ");

        echo " <br> dumping stmt obj -->> " ;
        $stmt->debugDumpParams();

        $stmt->execute($edit_product);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo " statement row count edit result withouth img -->> " . $stmt->rowCount();
    }

 
    if ($stmt->rowCount() > 0) {
        echo "updated product id $id";
        require('includes/controls-form.php');
        require("includes/produtos-form.php");
        $_POST = [];
    } else {
        echo "<br><br><br>ERRO novo!!!!!";
        $_POST = [];
    }
} elseif (isset($_POST['deleteProduct']) && $_POST['idProduct'] > 0) {


    $id = $_POST['idProduct'];

    $del_prod = array('id' => $id);

    $stmt = $pdo->prepare("DELETE FROM tb_produtos WHERE id_produto = :id");

    $stmt->execute($del_prod);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
   

    if ($stmt->rowCount() > 0) {
        echo " statement delete product -->> " . $id;
        require('includes/controls-form.php');
        require("includes/produtos-form.php");
        $_POST = [];
    } else {
        echo "<br><br><br>ERRO novo!!!!!";
        $_POST = [];
    }
} elseif (isset($_POST['editRequest']) && $_POST['requestId'] > 0) {
    require("includes/request-detail-form.php");
} elseif (isset($_POST['deleteRequest']) && $_POST['requestId'] > 0) {
    
    $id = $_POST['requestId'];

    $del_req = array('id' => $id);

    $stmt = $pdo->prepare("DELETE FROM tb_pedidos WHERE id_pedido = :id");

    $stmt->execute($del_req);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
   

    if ($stmt->rowCount() > 0) {
        echo " statement delete req -->> " . $id;
        require('includes/controls-form.php');
        require("includes/pedidos-form.php");
        $_POST = [];
    } else {
        echo "<br><br><br>ERRO novo!!!!!";
        $_POST = [];
    }
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