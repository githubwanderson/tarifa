<?php

class Helper 
{
    // ==================================================
    // RECEBE UM ARRAY E DEVOLVE UM ARRAY COM UMA LINHA CAMPO KEY 
    // E UMA LINHA CAMPO VALOR 
    // PARA EFETUAR INSERT NO BANCO DE DADOS

    public function retornOneRow($array)
    {
        $novoArray  = [];
        $key        = false;
        $valor      = false;

        // PEGANDO AS CHAVES E VALORES 
        foreach ($array as $k => $v) 
        {
            if($key)
            {
                $key    = $key.",`".$k."`";
                $valor  = $valor.",'".$v."'";
            }
            else
            {
                $key     = "`".$k."`";
                $valor   = "'".$v."'";
            }
        }

        // CRIANDO STRINGS PARA INSERT
        $novoArray['KEY']   = "(".$key.")";
        $novoArray['VALUE'] = "(".$valor.")"; 

        return $novoArray;
    }


}

?>