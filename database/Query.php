<?php

date_default_timezone_set('America/Sao_Paulo');

include_once "ConexaoBD.php";

class Query extends ConexaoBD
{    
    public function get_tabela($tabela,$where=null,$id=null)
    {
        $pdo    = $this->conectar();
        $where  = $where != null ? " WHERE $where = $id" : "";
        $sql    = "SELECT * FROM $tabela $where";
        $result = $pdo->query($sql);
        $result = $result->fetchAll();
        return $result;       
    }

    public function insert($tabela,$key,$value)
    {   
        $pdo    = $this->conectar();
        $sql    = "INSERT INTO $tabela $key VALUES $value";
        $r      = $pdo->query($sql);
        $r      = $pdo->lastInsertId();
        return $r;       
    }

    public function queryUser($sql)
    {   
        $pdo    = $this->conectar();
        $result      = $pdo->query($sql);
        $result = $result->fetchAll();
        return $result;       
    }

    public function select($sql,$p=null)
    {   
        $pdo    = $this->conectar();
        $r      = $pdo->query($sql);
        if($p)
        {
            $result = $r->fetchAll();
        }
        else
        {
            $result = $r->fetch();
        }
        return $result;       
    }

    public function update($tabela,$dados,$where)
    {   
        $pdo    = $this->conectar();
        $sql    = "UPDATE $tabela SET $dados WHERE $where";
        $r      = $pdo->query($sql);
        return $r;       
    }

}


?>