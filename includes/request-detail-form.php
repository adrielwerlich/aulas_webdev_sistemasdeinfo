<div class="container">
    <div class="row">
        <h1 class="text-warning">Pedido Detail Add</h1>
        <form action="#">
        <div class="row">

            <div class="form-group col-sm-3">
                <label class="col-sm-4 control-label">Pedido:</label>
                <div class="">
                    <div class="input-group">
                        <span class="input-group-addon" style="width: 30%;"><i class="fas fa-barcode"></i></span>
                        <input id="req-number" name="req-number" placeholder="Número" class="form-control" required="true"
                            value="" type="number">
                    </div>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <label class="col-sm-4 control-label">Telefone</label>
                <div class="">
                    <div class="input-group"><span style="width: 27%;" class="input-group-addon"><i class="fas fa-mobile-alt"></i></span>
                        <input id="phoneNumber" name="phoneNumber" placeholder="Número tel" class="form-control"
                            required="true" value="" type="number"></div>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <label class="col-sm-4 control-label">Cód. Cliente</label>
                <div class="">
                    <div class="input-group">
                        <span  class="input-group-addon"><i class="fas fa-user-shield"></i></span>
                        <input id="cod-client" name="cod-client" placeholder="Código do cliente" class="form-control"
                            required="true" value="" type="text"></div>
                </div>
            </div>
            <div class="form-group col-sm-8">
                <label class="col-sm-4 control-label">Nome do cliente</label>
                <div class="">
                    <div class="input-group">
                        <span  class="input-group-addon"><i class="fas fa-signature"></i></span>
                        <input id="fullName" name="clientName" placeholder="Nome do cliente" class="form-control"
                            required="true" value="" type="text"></div>
                </div>
            </div>
            <div class="form-group col-sm-6">
                <label class="col-sm-4 control-label">Endereço</label>
                <div class="">
                    <div class="input-group"><span  class="input-group-addon"><i
                                class="fas fa-map-marker-alt"></i></span>
                        <input id="address" name="address" placeholder="Endereço" class="form-control" required="true"
                            value="" type="text"></div>
                </div>
            </div>
            <div class="form-group col-sm-6">
                <label class="col-sm-4 control-label">Número</label>
                <div class="">
                    <div class="input-group"><span  class="input-group-addon"><i
                                class="fas fa-sort-numeric-up"></i></span>
                        <input id="number" name="number" placeholder="Número" class="form-control" required="true"
                            value="" type="text" style="max-width: 120px;">
                    </div>
                </div>
            </div>
            <div class="form-group col-sm-6">
                <label class="col-sm-4 control-label">Cep</label>
                <div class="">
                    <div class="input-group"><span  class="input-group-addon"><i class="fas fa-mail-bulk"></i></span>
                        <input id="postcode" name="postcode" placeholder="Postal Code/ZIP" class="form-control"
                            required="true" value="" type="text"></div>
                </div>
            </div>
            <div class="form-group col-sm-3">
                <label class="col-sm-4 control-label">Bairro</label>
                <div class="">
                    <div class="input-group"><span style="width: 27%;" class="input-group-addon"><i class="fas fa-door-open"></i></span>
                        <input id="neighborhood" name="neighborhood" placeholder="Bairro" class="form-control"
                            required="true" value="" type="text">
                    </div>
                </div>
            </div>
            <div class="form-group col-sm-3">
                <label class="col-sm-4 control-label">City</label>
                <div class="">
                    <div class="input-group"><span style="width: 27%;" class="input-group-addon"><i class="fas fa-city"></i></span>
                        <input id="city" name="city" placeholder="City" class="form-control" required="true" value=""
                            type="text">
                    </div>
                </div>
            </div>
            <div class="form-group col-sm-6">
                <label class="col-sm-4 control-label">Observação</label>
                <div class="">
                    <div class="input-group"><span  class="input-group-addon"><i class="fas fa-object-group"></i></span>
                        <input id="obs" name="obs" placeholder="Obs." class="form-control" required="true" value=""
                            type="text">
                    </div>
                </div>
            </div>

            <div class="form-group col-sm-4">
                <label class="col-sm-4 control-label">Data - Hora</label>
                <div class="">
                    <div class="input-group"><span  class="input-group-addon"><i class="fas fa-calendar-week"></i></span>
                        <input id="obs" name="obs" placeholder="Obs." class="form-control" required="true" value=""
                            type="text">
                    </div>
                </div>
            </div>
           
            
            <div class="form-group col-sm-5">
                <label class="col-sm-4 control-label">State/Province/Region</label>
                <div class="">
                    <div class="input-group"><span style="width: 18%;" class="input-group-addon"><i class="fas fa-sign"></i></span>
                        <select class="selectpicker form-control" placeholder="State/Province/Region">
                            <option>Selecione um Estado</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                            <option value="ES">Estrangeiro</option>
                        </select>
                    </div>
                </div>
            </div>
           
            <!-- <div class="form-group col-sm-5">
                <label class="col-sm-4 control-label">Email</label>
                <div class="">
                    <div class="input-group"><span style="width: 27%;" class="input-group-addon"><i
                                class="fas fa-envelope-square"></i></span>
                        <input id="email" name="email" placeholder="Email" class="form-control" required="true" value=""
                            type="text"></div>
                </div>
            </div> -->
        </div>
        <div class="row">
            <div class="form-group col-sm-4 mt-4">
                <button type="submit" class="btn btn-secondary">Gravar Cliente</button>
            </div>
        </div>
    </form>

    </div>
</div>