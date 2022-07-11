<?php

include_once 'database/Query.php';

// ===================================================================
// VERIFICAR SE EXISTE DADOS EM POST
// IF SIM - SALVAR
if(isset($_POST['VALOR']))
{
    // adiciono a data atual para cadastro
    $_POST['DT_CADASTRO'] = date('Y/m/d');

    $data_retroativa = $_POST['DT_CADASTRO']."- 6 months";
    $data_retroativa = date('Y-m-d', strtotime($data_retroativa));

    // REGRA DO SISTEMA // SO PODE SALVAR SE NENHUM VALOR IGUAL NOS ULTIMOS SEIS MESES PARA O MESMO OPERADOR
    $ID_OPERADOR = $_POST['ID_OPERADOR'];
    $VALOR = $_POST['VALOR'];

    $sql = "SELECT * FROM tarifa WHERE ID_OPERADOR = $ID_OPERADOR AND VALOR = $VALOR AND DT_CADASTRO >= $data_retroativa";
    
    $regra = new Query();
    $regra = $regra->queryUser($sql );

    if($regra)
    {
        $GLOBALS['mensagem'] = "Desculpe, mas o operador já possui esse valor cadastrado nos ultimos 6 meses.<br>Por favor cadastre outro valor.";
        include 'views/layout/alerta.php';
    }
    else
    {
        // retornOneRow devolve uma string com os labels e um com os valores
        include_once 'helper/Helper.php';
        $dados  = new Helper();
        $dados  = $dados->retornOneRow($_POST);
        $key    = $dados['KEY'];
        $value  = $dados['VALUE'];

        // inserindo ao banco
        $bd     = new Query();
        $result = $bd->insert('tarifa', $key, $value);
    }
}

// ===================================================================
// VERIFICAR SE EXISTE ID EM GET
// IF SIM - INATIVAR REGISTRO
if(isset($_GET['id']))
{
    $dados = '`ATIVO` = 0';
    $where = "ID = ".$_GET['id'];
    // SALVAR NO BD
    $update = new Query();
    $update = $update->update("tarifa", $dados, $where);
}

// GET BD LISTA OPERADOR
$listaOperador = new Query();
$listaOperador = $listaOperador->get_tabela("operador","ATIVO", 1);
// IF SIM - CONTINUA
if($listaOperador)
{
    include 'views/tarifa.php';

    $sql = "SELECT 
                a.ID,
                a.VALOR,
                b.DESC DESC_OPERADOR,
                DATE_FORMAT(a.DT_CADASTRO, '%d/%m/%Y') DT_CADASTRO
            FROM tarifa a
            JOIN operador b ON b.ID = a.ID_OPERADOR
            WHERE a.ATIVO = 1                
            ";

    // VERIFICAR SE EXISTE DADOS BD TABELA TARIFA
    $tabela   = new Query();
    $tabela   = $tabela->select($sql,1);

    // IF SIM - CARREGA TABELA
    if($tabela)
    {
        include 'views/tarifa_tabela.php';
    }
    else
    {
        $GLOBALS['mensagem'] = "Não há dados para carregar.";
        include 'views/layout/alerta.php';
    }

}
else
{
    $GLOBALS['mensagem'] = "Necessário um operador. Por favor cadastrar.";
    include 'views/layout/alerta.php';
}



?>