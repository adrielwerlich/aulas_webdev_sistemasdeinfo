<?php

	// echo " post array " .  serialize($_POST);
	if (isset($_POST['editProduct']) && isset($_POST['idProduct'] )) {
		$id = $_POST['idProduct'];
		$sql = "SELECT * FROM tb_produtos WHERE id_produto = $id";
		$dao = $pdo->query($sql);
		$product = $dao->fetch(PDO::FETCH_OBJ);
	}

?>

<div class="container">
    <div class="row">
        <h1 class="text-warning"><?= isset($product) ? "Product id ([$product->id_produto]) detail" : 'Product Detail Add'; ?> </h1>
        <form action="" method="post" enctype="multipart/form-data">
        <div class="row">

        <?php
	 
	if (!isset($_POST['editProduct']) && !isset($_POST['idProduct'] )) {
		
		echo " <h4 style='color:tomato' class='col-12'> Adding product </h4>
            <div class='form-group col-sm-8'>
            <input type='hidden' name='addProduct' value='' >

                <label class='col-sm-4 control-label'>Descrição</label>
                <div class=''>
                    <div class='input-group'>
                        <span  class='input-group-addon'><i class='fab fa-product-hunt'></i></span>
                        <input id='prod-desc' name='prod-desc' placeholder='Descrição do Produto' class='form-control'
                            required='true' value='' type='text'>
                    </div>
                </div>
            </div>
            <div class='form-group col-sm-6'>
                <label class='col-sm-4 control-label'>Preço</label>
                <div class=''>
                    <div class='input-group'><span  class='input-group-addon'><i class='fas fa-tags'></i></span>
                        <input id='price' name='price' placeholder='Preço' class='form-control' required='true'
                            value='' type='text'>
                    </div>
    
                </div>
            </div>
            <div class='form-group col-sm-6'>
                <label class='col-sm-4 control-label'>Foto do produto</label>
                <div class=''>
                    <div class='input-group'><span  class='input-group-addon'><i class='fas fa-camera-retro'></i></span>
                        <input id='image' name='image' class='form-control' 
                            accept='image/*' value='' type='file' >
                    </div>
                </div>
            </div>";
} else {

    echo " 
    <div class='form-group col-sm-3'>
        <label class='col-sm-4 control-label'>Código:</label>
        <div class=''>
            <div class='input-group'>
                <span class='input-group-addon' style='width: 30%;'><i class='fas fa-barcode'></i></span>
                <input id='prodId' name='prodId' placeholder='Cod' class='form-control' required='true'
                    value='{$product->id_produto}' type='text' readonly>
                    <input type='hidden' name='makeEditProduct' value='{$product->id_produto}' >
            </div>
        </div>
    </div>
    <div class='form-group col-sm-8'>
        <label class='col-sm-4 control-label'>Descrição</label>
        <div class=''>
            <div class='input-group'>
                <span  class='input-group-addon'><i class='fab fa-product-hunt'></i></span>
                <input id='prod-desc' name='prod-desc' placeholder='Descrição do Produto' class='form-control'
                    required='true' value='{$product->descricao}' type='text'></div>
        </div>
    </div>
    <div class='form-group col-sm-6'>
        <label class='col-sm-4 control-label'>Preço</label>
        <div class=''>
            <div class='input-group'><span  class='input-group-addon'><i class='fas fa-tags'></i></span>
                <input id='price' name='price' placeholder='Preço' class='form-control' required='true'
                    value='{$product->valor}' type='number' ></div>
        </div>
    </div>
    <div class='form-group col-sm-12'>
        <label class='col-xs-4 control-label'>Foto do produto</label>
        <div style='display:flex'>
            <div class='input-group col-5'><span style='max-height: 22%;'  
                class='input-group-addon'><i class='fas fa-camera-retro'></i></span>

                <input id='image' name='image' class='form-control col-6'
                    accept='image/*' value='' type='file' >
            </div>
            <img src='{$product->imagem}' style='width:10%;height:10%' alt='product image'>
        </div>
    </div>";

}
// $_POST = [];
// echo " post array after reinitialization " .  serialize($_POST);		
?>

  
</div>
<div class='row'>
    <div class='form-group col-sm-12 mt-4'>
        <button type='submit' class='btn btn-secondary'>Gravar Produto</button>
    </div>
</div>
</form>

</div>
</div>