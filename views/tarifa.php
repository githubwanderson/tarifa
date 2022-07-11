<div class="container divform">

    <h4> CADASTRO TARIFA </h4>
    <hr>

    <form action="index.php?p=tarifa" method="post">

        <div class="row">
            <div class="col-md-4">
                <label>OPERADOR</label>                                          
                <select class="form-control" name="ID_OPERADOR">
                    <?php 
                        // $rows_cliente ESTA DECLARADA NO ARQUIVO con_contrato.php
                        foreach ($listaOperador as $k => $v) 
                        {
                            $value  = $v['ID'];
                            $desc   = $v['DESC'];
                            echo "<option value=$value>$desc</option>";                       
                        }                 
                    ?>
                </select>
            </div>
            <div class="col-md-4">
            <label>TARIFA</label> 
                <input type="number" class="form-control" name="VALOR" step="any" min="0.00" required>
            </div>
            <div class="col-md">   
                <button type="submit" class="btn btn-block btn-dark mt-4">SALVAR</button>            
            </div>
        </div>

    </form>
</div>

