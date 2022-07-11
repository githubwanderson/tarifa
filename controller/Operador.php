<?php

include_once 'database/Query.php';

// ===================================================================
// VERIFICAR SE EXISTE DADOS EM POST
// IF SIM - SALVAR
if(isset($_POST['DESC']))
{
    // adiciono a data atual para cadastro
    $_POST['DT_CADASTRO'] = date('Y/m/d');

    // retornOneRow devolve uma string com os labels e um com os valores
    include_once 'helper/Helper.php';
    $dados  = new Helper();
    $dados  = $dados->retornOneRow($_POST);
    $key    = $dados['KEY'];
    $value  = $dados['VALUE'];

    // inserindo ao banco
    $bd     = new Query();
    $result = $bd->insert('operador', $key, $value);
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
    $update = $update->update("operador", $dados, $where);

    $where = "ID_OPERADOR = ".$_GET['id'];
    $update = new Query();
    $update = $update->update("tarifa", $dados, $where);
}

// ===================================================================
// CARREGAR VIEWS
include 'views/operador.php';

// VERIFICAR SE EXISTE DADOS BD TABELA OPERADOR
$tabela = new Query();
$tabela = $tabela->get_tabela("operador","ATIVO", 1);

// IF SIM - CARREGA TABELA
if($tabela)
{
    include 'views/operador_tabela.php';
}
else
{
    $GLOBALS['mensagem'] = "Não há dados para carregar.";
    include 'views/layout/alerta.php';
}

?>