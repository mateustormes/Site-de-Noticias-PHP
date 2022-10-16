<?php
    function conexao_base_dados($base){        
        $db = new PDO("mysql:host=localhost;dbname=$base", "root","");
        return $db;
    }

    function selectByElement($tipo, $db, $colunas, $tabela, $orderby, $filtro){
        $url = "SELECT ";
        
        if(!isset($colunas)){
            $url = $url." * ";
        }else{
            $url = $url.$colunas;
        }
        $url = $url." FROM $tabela";

        if(isset($filtro)){
            $url = $url.$filtro;
        }
        if(isset($orderby)){
            $url = $url." ORDER BY ".$orderby;
        } 
        echo $url;
        if($tipo == '1'){
            $dados = $db->query($url);            
            return $dados->fetch(PDO::FETCH_ASSOC);
        }else{
            $dados = $db->query($url);
            return $dados->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    function insert($db, $tabela, $colunas, $valores){
        if(isset($tabela) && isset($colunas) && isset($valores)){
            $url = "INSERT INTO $tabela ( ".$colunas." ) VALUES ( ".$valores." )";

            echo "<br>".$url."<br>";

            $dados = $db->exec($url);
            return $dados;
        }else{
            echo "erro";
        }
        
    }

    function update($db, $tabela, $valores, $filtro){
        if(isset($tabela) && isset($valores) && isset($filtro)){
            $url = "UPDATE $tabela SET ".$valores." WHERE ".$filtro;

            echo "<br>".$url."<br>";

            $dados = $db->exec($url);
            return $dados;
        }else{
            echo "erro";
        }
    }

    function delete($db, $tabela, $filtro){
        if(isset($db) && isset($tabela) && isset($filtro)){
            $url = "DELETE FROM ".$tabela." WHERE ".$filtro;

            echo "<br>".$url."<br>";

            $dados = $db->exec($url);
            return $dados;
        }else{
            echo "erro";
        }
    }
?>