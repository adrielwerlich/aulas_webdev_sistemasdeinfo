<?php

	echo " post array " .  serialize($_POST);
	if (isset($_POST['editClient']) && isset($_POST['idClient'] )) {
		$id = $_POST['idClient'];
		$sql = "SELECT * FROM tb_clientes WHERE id_cliente = $id";
		$dao = $pdo->query($sql);
		$client = $dao->fetch(PDO::FETCH_OBJ);
	}

?>

<div class="container">
<div class="row">
<h1 class="text-warning"><?= isset($client) ? "Client [$client->nome] detail" : 'Client Detail Add'; ?>  </h1>
<form action="" method="post">
<div class="row">

	<?php
	 
	if (!isset($_POST['editClient']) && !isset($_POST['idClient'] )) {
		
		echo " 
		<div class='form-group col-sm-3'>
				<input type='hidden' name='addClient' value='saveNewClient'>
				<label class='col-sm-4 control-label'>Código:</label>
				<div class=''>
						<div class='input-group'>
								<span class='input-group-addon' style='width: 30%;'><i class='fas fa-barcode'></i></span>
								<input id='cod' name='cod' placeholder='Cod' class='form-control' required='true'
										value='' type='text'>
						</div>
				</div>
		</div>
		<div class='form-group col-sm-8'>
				<label class='col-sm-4 control-label'>Nome do cliente</label>
				<div class=''>
						<div class='input-group'>
								<span  class='input-group-addon'><i class='fas fa-signature'></i></span>
								<input id='fullName' name='clientName' placeholder='Nome do cliente' class='form-control'
										required='true' value='' type='text'></div>
				</div>
		</div>
		<div class='form-group col-sm-6'>
				<label class='col-sm-4 control-label'>Endereço</label>
				<div class=''>
						<div class='input-group'><span  class='input-group-addon'><i
												class='fas fa-map-marker-alt'></i></span>
								<input id='address' name='address' placeholder='Endereço' class='form-control' required='true'
										value='' type='text'></div>
				</div>
		</div>
		<div class='form-group col-sm-6'>
				<label class='col-sm-4 control-label'>Número</label>
				<div class=''>
						<div class='input-group'><span  class='input-group-addon'><i
												class='fas fa-sort-numeric-up'></i></span>
								<input id='number' name='number' placeholder='Número' class='form-control' required='true'
										value='' type='number' style='max-width: 120px;'>
						</div>
				</div>
		</div>
		<div class='form-group col-sm-6'>
				<label class='col-sm-4 control-label'>Observação</label>
				<div class=''>
						<div class='input-group'><span  class='input-group-addon'><i class='fas fa-object-group'></i></span>
								<input id='obs' name='obs' placeholder='Obs.' class='form-control' required='true' value=''
										type='text'>
						</div>
				</div>
		</div>
		<div class='form-group col-sm-6'>
				<label class='col-sm-4 control-label'>Cep</label>
				<div class=''>
						<div class='input-group'><span  class='input-group-addon'><i class='fas fa-mail-bulk'></i></span>
								<input id='postcode' name='postcode' placeholder='Postal Code/ZIP' class='form-control'
										required='true' value='' type='text'></div>
				</div>
		</div>
		<div class='form-group col-sm-3'>
				<label class='col-sm-4 control-label'>Bairro</label>
				<div class=''>
						<div class='input-group'><span style='width: 27%;' class='input-group-addon'><i class='fas fa-door-open'></i></span>
								<input id='neighborhood' name='neighborhood' placeholder='Bairro' class='form-control'
										required='true' value='' type='text'>
						</div>
				</div>
		</div>
		<div class='form-group col-sm-3'>
				<label class='col-sm-4 control-label'>City</label>
				<div class=''>
						<div class='input-group'><span style='width: 27%;' class='input-group-addon'><i class='fas fa-city'></i></span>
								<input id='city' name='city' placeholder='City' class='form-control' required='true' value=''
										type='text'>
						</div>
				</div>
		</div>
		<div class='form-group col-sm-5'>
				<label class='col-sm-4 control-label'>State/Province/Region</label>
				<div class=''>
						<div class='input-group'><span style='width: 18%;' class='input-group-addon'>
							<i class='fas fa-sign'></i></span>
								<select class='selectpicker form-control' name='province' placeholder='State/Province/Region'>
										<option>Selecione um Estado</option>
										<option value='AC'>Acre</option>
										<option value='AL'>Alagoas</option>
										<option value='AP'>Amapá</option>
										<option value='AM'>Amazonas</option>
										<option value='BA'>Bahia</option>
										<option value='CE'>Ceará</option>
										<option value='DF'>Distrito Federal</option>
										<option value='ES'>Espírito Santo</option>
										<option value='GO'>Goiás</option>
										<option value='MA'>Maranhão</option>
										<option value='MT'>Mato Grosso</option>
										<option value='MS'>Mato Grosso do Sul</option>
										<option value='MG'>Minas Gerais</option>
										<option value='PA'>Pará</option>
										<option value='PB'>Paraíba</option>
										<option value='PR'>Paraná</option>
										<option value='PE'>Pernambuco</option>
										<option value='PI'>Piauí</option>
										<option value='RJ'>Rio de Janeiro</option>
										<option value='RN'>Rio Grande do Norte</option>
										<option value='RS'>Rio Grande do Sul</option>
										<option value='RO'>Rondônia</option>
										<option value='RR'>Roraima</option>
										<option value='SC'>Santa Catarina</option>
										<option value='SP'>São Paulo</option>
										<option value='SE'>Sergipe</option>
										<option value='TO'>Tocantins</option>
										<option value='ES'>Estrangeiro</option>
								</select>
						</div>
				</div>
		</div>
		<div class='form-group col-sm-3'>
				<label class='col-sm-4 control-label'>Telefone</label>
				<div class=''>
						<div class='input-group'><span style='width: 27%;' class='input-group-addon'><i class='fas fa-mobile-alt'></i></span>
								<input id='phoneNumber' name='phoneNumber' placeholder='Número tel' class='form-control'
										required='true' value='' type='number'></div>
				</div>
		</div>
		<div class='form-group col-sm-5'>
				<label class='col-sm-4 control-label'>Email</label>
				<div class=''>
						<div class='input-group'><span style='width: 27%;' class='input-group-addon'><i
												class='fas fa-envelope-square'></i></span>
								<input id='email' name='email' placeholder='Email' class='form-control' required='true' value=''
										type='text'></div>
				</div>
		</div>";
	} else {

		// echo " EDITING CLIENT WITH VALUES post array serialized values " . serialize($_POST);
		// echo " client data -> " . serialize($client);
		echo "<div class='form-group col-sm-3'>
		<label class='col-sm-4 control-label'>Código:</label>
		<div class=''>
				<div class='input-group'>
						<span class='input-group-addon' style='width: 30%;'><i class='fas fa-barcode'></i></span>
						<input id='cod' name='cod' placeholder='Cod' class='form-control' required='true'
								value='{$client->id_cliente}' type='text'>
						<input type='hidden' name='idClient' value='{$client->id_cliente}' >
						<input type='hidden' name='makeEditClient' value='editClient-id-{$client->id_cliente}'>
				</div>
		</div>
</div>
<div class='form-group col-sm-8'>
		<label class='col-sm-4 control-label'>Nome do cliente</label>
		<div class=''>
				<div class='input-group'>
						<span  class='input-group-addon'><i class='fas fa-signature'></i></span>
						<input id='fullName' name='clientName' placeholder='Nome do cliente' class='form-control'
								required='true' value='{$client->nome}' type='text'></div>
		</div>
</div>
<div class='form-group col-sm-6'>
		<label class='col-sm-4 control-label'>Endereço</label>
		<div class=''>
				<div class='input-group'><span  class='input-group-addon'><i
										class='fas fa-map-marker-alt'></i></span>
						<input id='address' name='address' placeholder='Endereço' class='form-control' required='true'
								value='{$client->endereco}' type='text'></div>
		</div>
</div>
<div class='form-group col-sm-6'>
		<label class='col-sm-4 control-label'>Número</label>
		<div class=''>
				<div class='input-group'><span  class='input-group-addon'><i
										class='fas fa-sort-numeric-up'></i></span>
						<input id='number' name='number' placeholder='Número' class='form-control' required='true'
								value='{$client->numero}' type='number' style='max-width: 120px;'>
				</div>
		</div>
</div>
<div class='form-group col-sm-6'>
		<label class='col-sm-4 control-label'>Observação</label>
		<div class=''>
				<div class='input-group'><span  class='input-group-addon'><i class='fas fa-object-group'></i></span>
						<input id='obs' name='obs' placeholder='Obs.' class='form-control' required='true' 
						value='{$client->observacao}' type='text'>
				</div>
		</div>
</div>
<div class='form-group col-sm-6'>
		<label class='col-sm-4 control-label'>Cep</label>
		<div class=''>
				<div class='input-group'><span  class='input-group-addon'><i class='fas fa-mail-bulk'></i></span>
						<input id='postcode' name='postcode' placeholder='Postal Code/ZIP' class='form-control'
								required='true' value='{$client->cep}' type='text'></div>
		</div>
</div>
<div class='form-group col-sm-3'>
		<label class='col-sm-4 control-label'>Bairro</label>
		<div class=''>
				<div class='input-group'><span style='width: 27%;' class='input-group-addon'><i class='fas fa-door-open'></i></span>
						<input id='neighborhood' name='neighborhood' placeholder='Bairro' class='form-control'
								required='true' value='{$client->bairro}' type='text'>
				</div>
		</div>
</div>
<div class='form-group col-sm-3'>
		<label class='col-sm-4 control-label'>City</label>
		<div class=''>
				<div class='input-group'><span style='width: 27%;' class='input-group-addon'><i class='fas fa-city'></i></span>
						<input id='city' name='city' placeholder='City' class='form-control' 
						required='true' value='{$client->cidade}' type='text'>
				</div>
		</div>
</div>
<div class='form-group col-sm-5'>
		<label class='col-sm-4 control-label'>State/Province/Region</label>
		<div class=''>
				<div class='input-group'><span style='width: 18%;' class='input-group-addon'>
					<i class='fas fa-sign'></i></span>
						<select class='selectpicker form-control' name='province' 
							value='{$client->estado}' placeholder='State/Province/Region'>
								<option>Selecione um Estado</option>"; ?>
								<option <?= ( strcasecmp($client->estado, 'AC')  == 0) ? 'selected' : ''; ?> value='AC'>Acre</option>
								<option <?= ( strcasecmp($client->estado, 'AL')  == 0) ? 'selected' : ''; ?> value='AL'>Alagoas</option>
								<option <?= ( strcasecmp($client->estado, 'AP')  == 0) ? 'selected' : ''; ?> value='AP'>Amapá</option>
								<option <?= ( strcasecmp($client->estado, 'AM')  == 0) ? 'selected' : ''; ?> value='AM'>Amazonas</option>
								<option <?= ( strcasecmp($client->estado, 'BA')  == 0) ? 'selected' : ''; ?> value='BA'>Bahia</option>
								<option <?= ( strcasecmp($client->estado, 'CE')  == 0) ? 'selected' : ''; ?> value='CE'>Ceará</option>
								<option <?= ( strcasecmp($client->estado, 'DF')  == 0) ? 'selected' : ''; ?> value='DF'>Distrito Federal</option>
								<option <?= ( strcasecmp($client->estado, 'ES')  == 0) ? 'selected' : ''; ?> value='ES'>Espírito Santo</option>
								<option <?= ( strcasecmp($client->estado, 'GO')  == 0) ? 'selected' : ''; ?> value='GO'>Goiás</option>
								<option <?= ( strcasecmp($client->estado, 'MA')  == 0) ? 'selected' : ''; ?> value='MA'>Maranhão</option>
								<option <?= ( strcasecmp($client->estado, 'MT')  == 0) ? 'selected' : ''; ?> value='MT'>Mato Grosso</option>
								<option <?= ( strcasecmp($client->estado, 'MS')  == 0) ? 'selected' : ''; ?> value='MS'>Mato Grosso do Sul</option>
								<option <?= ( strcasecmp($client->estado, 'MG')  == 0) ? 'selected' : ''; ?> value='MG'>Minas Gerais</option>
								<option <?= ( strcasecmp($client->estado, 'PA')  == 0) ? 'selected' : ''; ?> value='PA'>Pará</option>
								<option <?= ( strcasecmp($client->estado, 'PB')  == 0) ? 'selected' : ''; ?> value='PB'>Paraíba</option>
								<option <?= ( strcasecmp($client->estado, 'PR')  == 0) ? 'selected' : ''; ?> value='PR'>Paraná</option>
								<option <?= ( strcasecmp($client->estado, 'PE')  == 0) ? 'selected' : ''; ?> value='PE'>Pernambuco</option>
								<option <?= ( strcasecmp($client->estado, 'PI')  == 0) ? 'selected' : ''; ?> value='PI'>Piauí</option>
								<option <?= ( strcasecmp($client->estado, 'RJ')  == 0) ? 'selected' : ''; ?> value='RJ'>Rio de Janeiro</option>
								<option <?= ( strcasecmp($client->estado, 'RN')  == 0) ? 'selected' : ''; ?> value='RN'>Rio Grande do Norte</option>
								<option <?= ( strcasecmp($client->estado, 'RS')  == 0) ? 'selected' : ''; ?> value='RS'>Rio Grande do Sul</option>
								<option <?= ( strcasecmp($client->estado, 'RO')  == 0) ? 'selected' : ''; ?> value='RO'>Rondônia</option>
								<option <?= ( strcasecmp($client->estado, 'RR')  == 0) ? 'selected' : ''; ?> value='RR'>Roraima</option>
								<option <?= ( strcasecmp($client->estado, 'SC')  == 0) ? 'selected' : ''; ?> value='SC'>Santa Catarina</option>
								<option <?= ( strcasecmp($client->estado, 'SP')  == 0) ? 'selected' : ''; ?> value='SP'>São Paulo</option>
								<option <?= ( strcasecmp($client->estado, 'SE')  == 0) ? 'selected' : ''; ?> value='SE'>Sergipe</option>
								<option <?= ( strcasecmp($client->estado, 'TO')  == 0) ? 'selected' : ''; ?> value='TO'>Tocantins</option>
								<option <?= ( strcasecmp($client->estado, 'EST')  == 0) ? 'selected' : ''; ?> value='EST'>Estrangeiro</option>
			<?php echo "</select>
				</div>
		</div>
</div>
<div class='form-group col-sm-3'>
		<label class='col-sm-4 control-label'>Telefone</label>
		<div class=''>
				<div class='input-group'><span style='width: 27%;' class='input-group-addon'><i class='fas fa-mobile-alt'></i></span>
						<input id='phoneNumber' name='phoneNumber' placeholder='Número tel' class='form-control'
								required='true' value='{$client->telefone}' type='number'></div>
		</div>
</div>
<div class='form-group col-sm-5'>
		<label class='col-sm-4 control-label'>Email</label>
		<div class=''>
				<div class='input-group'><span style='width: 27%;' class='input-group-addon'><i
										class='fas fa-envelope-square'></i></span>
						<input id='email' name='email' placeholder='Email' 
						class='form-control' required='true' value='{$client->email}'
								type='text'></div>
		</div>
</div>";
	}
	$_POST = [];
	echo " post array after reinitialization " .  serialize($_POST);		
	?>
</div>
<div class="row">
	<div class="form-group col-sm-4 mt-4">
			<button type="submit" name="saveClient" class="btn btn-secondary">Gravar Cliente</button>
	</div>
</div>
</form>

</div>
</div>
<div class="row">
<div class="col-xs-12">

</div>
</div>