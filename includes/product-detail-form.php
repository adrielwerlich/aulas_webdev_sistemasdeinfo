<div class="container">
    <div class="row">
        <h1 class="text-warning">Produto Detail Add</h1>
        <form action="#">
        <div class="row">

            <div class="form-group col-sm-3">
                <label class="col-sm-4 control-label">Código:</label>
                <div class="">
                    <div class="input-group">
                        <span class="input-group-addon" style="width: 30%;"><i class="fas fa-barcode"></i></span>
                        <input id="fullName" name="fullName" placeholder="Cod" class="form-control" required="true"
                            value="" type="text">
                    </div>
                </div>
            </div>
            <div class="form-group col-sm-8">
                <label class="col-sm-4 control-label">Descrição</label>
                <div class="">
                    <div class="input-group">
                        <span  class="input-group-addon"><i class="fab fa-product-hunt"></i></span>
                        <input id="prod-desc" name="prod-desc" placeholder="Descrição do Produto" class="form-control"
                            required="true" value="" type="text"></div>
                </div>
            </div>
            <div class="form-group col-sm-6">
                <label class="col-sm-4 control-label">Preço</label>
                <div class="">
                    <div class="input-group"><span  class="input-group-addon"><i class="fas fa-tags"></i></span>
                        <input id="price" name="price" placeholder="Preço" class="form-control" required="true"
                            value="" type="text"></div>
                </div>
            </div>
            <div class="form-group col-sm-6">
                <label class="col-sm-4 control-label">Foto do produto</label>
                <div class="">
                    <div class="input-group"><span  class="input-group-addon"><i class="fas fa-camera-retro"></i></span>
                        <input id="photo" name="photo" class="form-control" required="true"
                            value="" type="file" >
                    </div>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="form-group col-sm-4 mt-4">
                <button type="submit" class="btn btn-secondary">Gravar Produto</button>
            </div>
        </div>
    </form>

    </div>
</div>