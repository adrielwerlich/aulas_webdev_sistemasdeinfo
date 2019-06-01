<style>
	.autocomplete {
		/*the container must be positioned relative:*/
		position: relative;
		display: inline-block;
	}

	.autocomplete-items {
		position: absolute;
		border: 1px solid #d4d4d4;
		border-bottom: none;
		border-top: none;
		z-index: 99;
		/*position the autocomplete items to be the same width as the container:*/
		top: 100%;
		left: 5rem;
		right: 0;
	}

	.autocomplete-items div {
		padding: 10px;
		cursor: pointer;
		background-color: #fff;
		border-bottom: 1px solid #d4d4d4;
	}

	.autocomplete-items div:hover {
		/*when hovering an item:*/
		background-color: #e9e9e9;
	}

	.autocomplete-active {
		/*when navigating through the items using the arrow keys:*/
		background-color: DodgerBlue !important;
		color: #ffffff;
	}
</style>
<?php

	// echo " post array " .  serialize($_POST);
	if (isset($_POST['editRequest']) && isset($_POST['requestId']) && $_POST['requestId'] > 0 ) {
		$id = $_POST['requestId'];
		$sql = "SELECT * FROM tb_pedidos WHERE id_pedido = $id";
		$dao = $pdo->query($sql);
		$req = $dao->fetch(PDO::FETCH_OBJ);

		$sql = "SELECT * FROM tb_clientes WHERE id_cliente = $req->id_cliente";
		$dao = $pdo->query($sql);
		$cli = $dao->fetch(PDO::FETCH_OBJ);
		
		$sql = "SELECT * FROM tb_pedido_produtos WHERE id_pedido = $id";
		$dao = $pdo->query($sql);
		$req_prods = [];
		$prods = [];
		while ($prods = $dao->fetch(PDO::FETCH_OBJ)) {
			array_push($req_prods , $prods);
			echo ' prods->id_produto ->' . $prods->id_produto;
			$sql = "SELECT * FROM tb_produtos WHERE id_produto = $prods->id_produto";
			$dao = $pdo->query($sql);
			$prod = $dao->fetch(PDO::FETCH_OBJ);
			// array_push($prods , $prod);
			
		}
		echo ' prods array -->> ' . serialize($prods);
	}

?>

<script>

	var prod, cli, prodCounter = 0, clients = []

	function editProd(prodId){
		console.log('prod id', prodId)
	}

	function showList() {
		items = document.getElementsByClassName("autocomplete-items");
		if (items && items.length > 0) {
			for (item of items) { item.style.display = '' }
		}
	}

	function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
		if (elmnt == 1) {
			items = document.getElementsByClassName("autocomplete-items");
			for (item of items) { item.style.display = 'none' }
			return
		} else if (elmnt == 2) {
			items = document.getElementsByClassName("autocomplete-items");
			for (item of items) { item.remove() }
			return
		}


		var x = document.getElementsByClassName("autocomplete-items");
		for (var i = 0; i < x.length; i++) {
			if (elmnt && elmnt != x[i] && elmnt != inp) {
				x[i].parentNode.removeChild(x[i]);
			}
		}
	}

	function InsertAutoComplete(v) {
		var a, b, i, val = v
		/*close any already open lists of autocompleted values*/
		closeAllLists();
		if (clients.length < 1) { return false; }
		currentFocus = -1;
		/*create a DIV element that will contain the items (values):*/
		a = document.createElement("DIV");
		a.setAttribute("id", "autocomplete-list");
		a.setAttribute("class", "autocomplete-items");
		/*append the DIV element as a child of the autocomplete container:*/
		let nameInp = document.getElementById('fullName')
		nameInp.parentNode.appendChild(a);
		/*for each item in the array...*/
		for (i = 0; i < clients.length; i++) {
			/*check if the item starts with the same letters as the text field value:*/
			if (clients[i].nome.toUpperCase().includes(val.toUpperCase())) {
				/*create a DIV element for each matching element:*/
				b = document.createElement("DIV");
				/*make the matching letters bold:*/
				let indexOfSearch = clients[i].nome.indexOf(val)
				b.innerHTML = clients[i].nome.substring(0, indexOfSearch)
				b.innerHTML += "<strong>" + clients[i].nome.substring(indexOfSearch, indexOfSearch + val.length) + "</strong>";
				b.innerHTML += clients[i].nome.substring(indexOfSearch + val.length)
				// b.innerHTML += clients[i].nome.substr(val.length);
				/*insert a input field that will hold the current clientsay item's value:*/
				// b.innerHTML += "<input type='hidden' value='" + clients[i].nome + "'>";
				/*execute a function when someone clicks on the item value (DIV element):*/
				b.addEventListener("click", function (e) {
					/*insert the value for the autocomplete text field:*/
					inp.value = nameInp.getElementsByTagName("input")[0].value;
					/*close the list of autocompleted values,
					(or any other open lists of autocompleted values:*/
					closeAllLists();
				});
				a.appendChild(b);
			}
		}
	}


	document.addEventListener('DOMContentLoaded', () => {
		const nameInput = document.getElementById('fullName')

		nameInput.addEventListener('keyup', (e) => {
			// console.log(e.target.value)
			if (e.target.value.length > 2) {
				let username_url = `http://localhost:81/web_dev_disciplina_sistemas_de_infor_uniplac
					/skeleton/controllers/GeneralController.php?name=${e.target.value}&type=searchByClientName`
				fetch(username_url, {
					method: 'get',
				}).then(function (response) {
					if (response.status >= 200 && response.status < 300) {

						try {
							if (response.ok) {
								return response.json()
							} else {
								throw new Error(response)
							}
						}
						catch (err) {
							console.log(err.message)
							return 'WHATEVER_YOU_WANT_TO_RETURN'
						}
					}
				})
					.then(responseJson => {
						clients = responseJson

						InsertAutoComplete(e.target.value)

						console.log(clients)

						// document.getElementById('prod-desc').value = prod.descricao
						// document.getElementById('price').value = prod.valor
						// document.getElementById('prod-img').src = prod.imagem

						// console.log(prod)
					})
					.catch(err => console.log(err))
			} else if (e.target.value.length == 0) {
				closeAllLists(2)
			}

		})


	})

	function submiting() {
		document.getElementById('tb-prods').innerHTML +=
			`<input type='hidden' name='products-counter' value='${prodCounter}'>`
	}

	function addProd(e) {
		e.preventDefault()
		prodCounter++
		let temp = `
		<tr id='${prod.id_produto}'>
				<th scope='row'>${prod.id_produto}
					<input type='hidden' name='prod-id-${prodCounter}-${prod.id_produto}' value='${prod.id_produto}'>
				</th>
				<td>desc prod ${prod.descricao}
					<input type='hidden' name='prod-desc-${prod.id_produto}' value='${prod.descricao}'>
				</td>
				<td>price ${prod.valor}
					<input type='hidden' name='prod-price-${prod.id_produto}' value='${prod.valor}'>
				</td>
				<td>qtt ${document.getElementById('qt').value}
					<input type='hidden' name='prod-qtt-${document.getElementById('qt').value}'>
				</td>
				<td>tt ${document.getElementById('total').value}
					<input type='hidden' name='prod-total-${document.getElementById('total').value}' >
				</td>
				<td>obs ${document.getElementById('obs-insert-prod').value}
					<input type='hidden' name='prod-obs-${document.getElementById('obs-insert-prod').value}'>
				</td>
				<td>
					<button class='btn btn-danger' onclick='document.getElementById(${prod.id_produto}).remove()'>
						Delete
					</button>
				</td>
			</tr>
		`
		document.getElementById('tb-prods').innerHTML += temp

		document.getElementById('cod-prod').value = ''
		document.getElementById('prod-desc').value = ''
		document.getElementById('price').value = ''
		document.getElementById('qt').value = ''
		document.getElementById('total').value = ''
		document.getElementById('obs-insert-prod').value = ''
		document.getElementById('prod-img').src = 'assets/images/empty.png'
	}

	function calcVl(e) {

		let price = document.getElementById('price').value
		let qtt = e.target.value

		document.getElementById('total').value = Number.parseFloat(price) * Number.parseFloat(qtt)
	}

	function checkIfClientExists(event) {
		let id = event.target.value
		let url = `http://localhost:8000/controllers/GeneralController.php?id=${id}&type=client`
		if (window.location.href.indexOf('web_dev') != -1) {
			url = `http://localhost:81/web_dev_disciplina_sistemas_de_infor_uniplac/skeleton/controllers/GeneralController.php?id=${id}&type=client`
		}
		fetch(url, {
			method: 'get',
			// may be some code of fetching comes here
		}).then(function (response) {
			if (response.status >= 200 && response.status < 300) {
				try {
					if (response.ok) {
						return response.json()
					} else {
						throw new Error(response)
					}
				}
				catch (err) {
					console.log(err.message)
					return WHATEVER_YOU_WANT_TO_RETURN
				}
			}
		})
			.then(responseJson => {
				cli = responseJson

				document.getElementById('phoneNumber').value = cli.telefone
				document.getElementById('fullName').value = cli.nome
				document.getElementById('address').value = cli.endereco
				document.getElementById('city').value = cli.cidade
				document.getElementById('number').value = cli.numero
				document.getElementById('postcode').value = cli.cep
				document.getElementById('neighborhood').value = cli.bairro
				document.getElementById('dateTime').value = new Date().toLocaleString()
				document.getElementById('obs').value = cli.observacao
				let province = cli.estado.toUpperCase()
				provSelector = document.getElementById('province-selector')
				provSelector.value = province



				//  document.getElementById('cli-img').src = cli.imagem

				console.log(cli)
			})
			.catch(err => console.log(err))

	}

	function checkIfProdExists(event) {
		let id = event.target.value
		let url = `http://localhost:8000/controllers/GeneralController.php?id=${id}&type=prod`
		if (window.location.href.indexOf('web_dev') != -1) {
			url = `http://localhost:81/web_dev_disciplina_sistemas_de_infor_uniplac/skeleton/controllers/GeneralController.php?id=${id}&type=prod`
		}
		fetch(url, {
			method: 'get',
			// may be some code of fetching comes here
		}).then(function (response) {
			if (response.status >= 200 && response.status < 300) {

				try {
					if (response.ok) {
						return response.json()
					} else {
						throw new Error(response)
					}
				}
				catch (err) {
					console.log(err.message)
					return WHATEVER_YOU_WANT_TO_RETURN
				}
			}
		})
			.then(responseJson => {
				prod = responseJson

				document.getElementById('prod-desc').value = prod.descricao
				document.getElementById('price').value = prod.valor
				document.getElementById('prod-img').src = prod.imagem

				console.log(prod)
			})
			.catch(err => console.log(err))
	}

</script>

<div class="container">
	<div class="row">
		<h1 class="text-warning"><?= isset($product) ? "Request id ([$req->id_pedido]) detail" : 
			'Request Detail Add'; ?>
		</h1>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="row">

				<?php
	 
	if (!isset($_POST['editRequest']) && !isset($_POST['requestId'] )) {

		echo	"<div class='form-group col-sm-3'>
				<label class='col-sm-4 control-label'>Pedido:</label>
				<div class=''>
						<div class='input-group'>
								<span class='input-group-addon' style='width: 30%;'><i class='fas fa-barcode'></i></span>
								<input id='req-number' name='req-number' placeholder='Número' class='form-control' required='true'
									readonly	value='' type='number'>
								<input type='hidden' name='addRequest'>
						</div>
				</div>
		</div>
		
		<div class='form-group col-sm-2'>
				<label class='col-sm-12 control-label'>Cód. Cliente</label>
				<div class=''>
						<div class='input-group'>
								<span  class='input-group-addon' style='width: 23%;'><i class='fas fa-user-shield'></i></span>
								<input id='cod-client' name='cod-cli' placeholder='Cód Cliente' class='form-control'
									onblur='checkIfClientExists(event)'	required='true' value='' type='text'></div>
				</div>
		</div>
		<div class='form-group col-sm-4'>
				<label class='col-sm-4 control-label'>Telefone</label>
				<div class=''>
						<div class='input-group'><span style='width: 27%;' class='input-group-addon'><i class='fas fa-mobile-alt'></i></span>
								<input id='phoneNumber' name='phoneNumber' placeholder='Número tel' class='form-control'
										required='true' value='' type='number'></div>
				</div>
		</div>
		<div class='form-group col-sm-8'>
				<label class='col-sm-4 control-label'>Nome do cliente</label>
				<div class=''>
						<div class='input-group'>
								<span  class='input-group-addon'><i class='fas fa-signature'></i></span>
								<input id='fullName' name='clientName' placeholder='Nome do cliente' class='form-control'
									onblur='closeAllLists(1)'	required='true' value='' type='text' autocomplete='off' 
									onfocus='showList()'	
								>
						
						</div>
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
									value='' type='text' style='max-width: 120px;'>
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
		<div class='form-group col-sm-6'>
				<label class='col-sm-4 control-label'>Observação</label>
				<div class=''>
						<div class='input-group'><span  class='input-group-addon'><i class='fas fa-object-group'></i></span>
								<input id='obs' name='obs' placeholder='Obs.' class='form-control' required='true' value=''
										type='text'>
						</div>
				</div>
		</div>
		<div class='form-group col-sm-4'>
				<label class='col-sm-4 control-label'>Data - Hora</label>
				<div class=''>
						<div class='input-group'><span  class='input-group-addon'><i class='fas fa-calendar-week'></i></span>
								<input id='dateTime' name='dateTime' placeholder='Data Hora' class='form-control' value=''
										type='text'>
						</div>
				</div>
		</div>
		<div class='form-group col-sm-5'>
				<label class='col-sm-4 control-label'>State/Province/Region</label>
				<div class=''>
						<div class='input-group'><span style='width: 18%;' class='input-group-addon'><i class='fas fa-sign'></i></span>
								<select id='province-selector' class='selectpicker form-control' placeholder='State/Province/Region'>
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
		<div class='col-12 divider' style='border: 1px solid;'></div>

		<div class='form-group col-1'>
			<label class='col-12 control-label'>Produto</label>
			<div class=''>
						<div class='input-group'>
								<input id='cod-prod' name='cod-prod' placeholder='Cod prod' class='form-control' value=''
										type='number' min='0' onblur='checkIfProdExists(event)'>
						</div>
			</div>
		</div>
		<div class='form-group col-4'>
			<label class='col-12 control-label'>Descrição</label>
			<div class=''>
						<div class='input-group'>
								<input id='prod-desc' name='prod-desc' placeholder='Descrição' class='form-control' value=''
										type='text'>
						</div>
			</div>
		</div>
		<div class='form-group col-1'>
			<label class='col-12 control-label'>Preço</label>
			<div class=''>
						<div class='input-group'>
								<input id='price' name='price' placeholder='R$' class='form-control' value=''
										type='number' min='0'>
						</div>
			</div>
		</div>
		<div class='form-group col-1'>
			<label class='col-12 control-label'>Quantidade</label>
			<div class=''>
						<div class='input-group'>
								<input id='qt' name='qt' placeholder='' class='form-control'  value=''
									onblur='calcVl(event)'	type='number' min='0'>
						</div>
			</div>
		</div>
		<div class='form-group col-1'>
		<label class='col-12 control-label'>Total</label>
		<div class=''>
					<div class='input-group'>
							<input id='total' name='total' placeholder='R$' class='form-control'  value=''
									type='number' min='0'>
					</div>
		</div>
		</div>
		<div class='form-group col-2'>
		<label class='col-12 control-label'>Obs</label>
		<div class=''>
					<div class='input-group'>
							<input id='obs-insert-prod' name='obs-insert-prod' placeholder='Descrição' class='form-control'  value=''
									type='text'>
					</div>
		</div>
		</div>
		<div class='form-group col-2'>
		<label class='col-12 control-label'>Img</label>
		<div class=''>
					<div class='input-group'>
						<img id='prod-img' alt='prod-img' src='assets/images/empty.png' class='form-control' 
							style='height:120px'
						>
					</div>
		</div>
		</div>
		<div class='form-group col-12'>
			<button class='btn btn-warning' onclick='addProd(event)'>Add Prod</button>
		</div>

		<div class='col-12 divider' style='border: 1px solid;'></div>

		<table class='table'>
		<thead>
			<tr>
				<th scope='col'>#</th>
				<th scope='col'>Descrição</th>
				<th scope='col'>Preço</th>
				<th scope='col'>Quantidade</th>
				<th scope='col'>Total</th>
				<th scope='col'>Obs.</th>
				<th scope='col'>Delete</th>
			</tr>
		</thead>
		<tbody id='tb-prods'>
			
		
		</tbody>
	</table>

		<div class='col-12 divider' style='border: 1px solid;'></div>

		"
		;
	} else {
		echo	"<div class='form-group col-sm-3'>
			<label class='col-sm-4 control-label'>Pedido:</label>
			<div class=''>
					<div class='input-group'>
							<span class='input-group-addon' style='width: 30%;'><i class='fas fa-barcode'></i></span>
							<input id='req-number' name='req-number' placeholder='Número' class='form-control' 
								required='true'
								readonly	value='{$req->id_pedido}' type='number'>
							<input type='hidden' name='addRequest'>
					</div>
			</div>
	</div>
	
	<div class='form-group col-sm-2'>
			<label class='col-sm-12 control-label'>Cód. Cliente</label>
			<div class=''>
					<div class='input-group'>
							<span  class='input-group-addon' style='width: 23%;'><i class='fas fa-user-shield'></i></span>
							<input id='cod-client' name='cod-cli' placeholder='Cód Cliente' class='form-control'
								onblur='checkIfClientExists(event)'	required='true' value='{$req->id_cliente}' type='text'></div>
			</div>
	</div>
	<div class='form-group col-sm-4'>
			<label class='col-sm-4 control-label'>Telefone</label>
			<div class=''>
					<div class='input-group'><span style='width: 27%;' class='input-group-addon'>
					<i class='fas fa-mobile-alt'></i></span>
							<input id='phoneNumber' name='phoneNumber' placeholder='Número tel' class='form-control'
									required='true' value='{$cli->telefone}' type='number'></div>
			</div>
	</div>
	<div class='form-group col-sm-8'>
			<label class='col-sm-4 control-label'>Nome do cliente</label>
			<div class=''>
					<div class='input-group'>
							<span  class='input-group-addon'><i class='fas fa-signature'></i></span>
							<input id='fullName' name='clientName' placeholder='Nome do cliente' class='form-control'
								onblur='closeAllLists(1)'	required='true' value='{$cli->nome}' 
								type='text' autocomplete='off' 
								onfocus='showList()'	
							>
					
					</div>
			</div>
	</div>
	<div class='form-group col-sm-6'>
			<label class='col-sm-4 control-label'>Endereço</label>
			<div class=''>
					<div class='input-group'><span  class='input-group-addon'><i
											class='fas fa-map-marker-alt'></i></span>
							<input id='address' name='address' placeholder='Endereço' class='form-control' 
								required='true'
								value='{$cli->endereco}' type='text'></div>
			</div>
	</div>
	<div class='form-group col-sm-6'>
			<label class='col-sm-4 control-label'>Número</label>
			<div class=''>
					<div class='input-group'><span  class='input-group-addon'><i
											class='fas fa-sort-numeric-up'></i></span>
							<input id='number' name='number' placeholder='Número' class='form-control' required='true'
								value='{$cli->numero}' type='text' style='max-width: 120px;'>
					</div>
			</div>
	</div>
	<div class='form-group col-sm-6'>
			<label class='col-sm-4 control-label'>Cep</label>
			<div class=''>
					<div class='input-group'><span  class='input-group-addon'><i class='fas fa-mail-bulk'></i></span>
							<input id='postcode' name='postcode' placeholder='Postal Code/ZIP' class='form-control'
									required='true' value='{$cli->cep}' type='text'></div>
			</div>
	</div>
	<div class='form-group col-sm-3'>
			<label class='col-sm-4 control-label'>Bairro</label>
			<div class=''>
					<div class='input-group'><span style='width: 27%;' class='input-group-addon'><i class='fas fa-door-open'></i></span>
							<input id='neighborhood' name='neighborhood' placeholder='Bairro' class='form-control'
									required='true' value='{$cli->bairro}' type='text'>
					</div>
			</div>
	</div>
	<div class='form-group col-sm-3'>
			<label class='col-sm-4 control-label'>City</label>
			<div class=''>
					<div class='input-group'><span style='width: 27%;' class='input-group-addon'><i class='fas fa-city'></i></span>
							<input id='city' name='city' placeholder='City' 
								class='form-control' required='true' value='{$cli->cidade}'
									type='text'>
					</div>
			</div>
	</div>
	<div class='form-group col-sm-6'>
			<label class='col-sm-4 control-label'>Observação</label>
			<div class=''>
					<div class='input-group'><span  class='input-group-addon'><i class='fas fa-object-group'></i></span>
							<input id='obs' name='obs' placeholder='Obs.' 
							class='form-control' required='true' value='{$req->observacao}'
									type='text'>
					</div>
			</div>
	</div>
	<div class='form-group col-sm-4'>
			<label class='col-sm-4 control-label'>Data - Hora</label>
			<div class=''>
					<div class='input-group'><span  class='input-group-addon'><i class='fas fa-calendar-week'></i></span>
							<input id='dateTime' name='dateTime' placeholder='Data Hora' 
								class='form-control' value='{$req->data_hora}'
									type='text'>
					</div>
			</div>
	</div>
	<div class='form-group col-sm-5'>
			<label class='col-sm-4 control-label'>State/Province/Region</label>
			<div class=''>
					<div class='input-group'><span style='width: 18%;' class='input-group-addon'><i class='fas fa-sign'></i></span>
							<select id='province-selector' class='selectpicker form-control'
								value='{$cli->estado}'
								placeholder='State/Province/Region'>
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
	<div class='col-12 divider' style='border: 1px solid;'></div>

	<div class='form-group col-1'>
		<label class='col-12 control-label'>Produto</label>
		<div class=''>
					<div class='input-group'>
							<input id='cod-prod' name='cod-prod' placeholder='Cod prod' class='form-control' value=''
									type='number' min='0' onblur='checkIfProdExists(event)'>
					</div>
		</div>
	</div>
	<div class='form-group col-4'>
		<label class='col-12 control-label'>Descrição</label>
		<div class=''>
					<div class='input-group'>
							<input id='prod-desc' name='prod-desc' placeholder='Descrição' class='form-control' value=''
									type='text'>
					</div>
		</div>
	</div>
	<div class='form-group col-1'>
		<label class='col-12 control-label'>Preço</label>
		<div class=''>
					<div class='input-group'>
							<input id='price' name='price' placeholder='R$' class='form-control' value=''
									type='number' min='0'>
					</div>
		</div>
	</div>
	<div class='form-group col-1'>
		<label class='col-12 control-label'>Quantidade</label>
		<div class=''>
					<div class='input-group'>
							<input id='qt' name='qt' placeholder='' class='form-control'  value=''
								onblur='calcVl(event)'	type='number' min='0'>
					</div>
		</div>
	</div>
	<div class='form-group col-1'>
	<label class='col-12 control-label'>Total</label>
	<div class=''>
				<div class='input-group'>
						<input id='total' name='total' placeholder='R$' class='form-control'  value=''
								type='number' min='0'>
				</div>
	</div>
	</div>
	<div class='form-group col-2'>
	<label class='col-12 control-label'>Obs</label>
	<div class=''>
				<div class='input-group'>
						<input id='obs-insert-prod' name='obs-insert-prod' placeholder='Descrição' class='form-control'  value=''
								type='text'>
				</div>
	</div>
	</div>
	<div class='form-group col-2'>
	<label class='col-12 control-label'>Img</label>
	<div class=''>
				<div class='input-group'>
					<img id='prod-img' alt='prod-img' src='assets/images/empty.png' class='form-control' 
						style='height:120px'
					>
				</div>
	</div>
	</div>
	<div class='form-group col-12'>
		<button class='btn btn-warning' onclick='addProd(event)'>Add Prod</button>
	</div>

	<div class='col-12 divider' style='border: 1px solid;'></div>

	<table class='table'>
	<thead>
		<tr>
			<th scope='col'>#</th>
			<th scope='col'>Descrição</th>
			<th scope='col'>Preço</th>
			<th scope='col'>Quantidade</th>
			<th scope='col'>Total</th>
			<th scope='col'>Obs.</th>
			<th scope='col'>Del</th>
			<th scope='col'>Edit</th>
		</tr>
	</thead>
	<tbody id='tb-prods'>";

		$prodCounter = 0;
		foreach ($req_prods as $prod) {
			$prodCounter++;
			echo "<tr id='{$prod->id_produto}'>
			<th scope='row'>{$prod->id_produto}
				<input type='hidden' name='prod-id-{$prodCounter}-{$prod->id_produto}' value='{$prod->id_produto}'>
			</th>
			<td>desc prod prods->descricao
				<input type='hidden' name='prod-desc-prod->id_produto' value='prod->descricao'>
			</td>
			<td>price {$prod->valor}
				<input type='hidden' name='prod-price-{$prod->id_produto}' value='{$prod->valor}'>
			</td>
			<td>qtt {$prod->quantidade}
				<input type='hidden' name='prod-qtt-{$prod->quantidade}'>
			</td>
			<td>tt {$prod->valor}
				<input type='hidden' name='prod-total-{$prod->valor}' >
			</td>
			<td>obs {$prod->observacao}
				<input type='hidden' name='prod-obs-{$prod->observacao}'>
			</td>
			<td>
				<button class='btn btn-danger' onclick='document.getElementById({$prod->id_produto}).remove()'>
					Delete
				</button>
			</td>
			<td>
				<button class='btn btn-info' onclick='editProd($prod->id_produto)'>
					Edit
				</button>
			</td>
		</tr>";
		}
echo	"</tbody>
</table>

	<div class='col-12 divider' style='border: 1px solid;'></div>

	"
	;
	}

	?>

			</div>
			<div class="row">
				<div class="form-group col-sm-4 mt-4">
					<button onclick="submiting()" type="submit" class="btn btn-secondary">Realizar Solicitação</button>
				</div>
			</div>
		</form>

	</div>
</div>