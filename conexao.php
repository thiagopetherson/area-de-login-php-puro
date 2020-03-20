<?php

    //Fazemos a conexão com nosso banco de dados
    $dsn = "mysql:dbname=banco_thiago;host=localhost"; //b7_web é o nome do banco e localhost é o nome do servidor (vocÊ pode trocar)
    $dbuser = "root"; //usuário do banco
    $dbpass = ""; //senha do banco

    try
    {
        //Instanciamos a classe PDO passando como parâmetro os dados de conexão pegos acima
        $pdo = new PDO($dsn, $dbuser, $dbpass); 
        

    }
    catch(PDOException $e)
    {   
        //Se der erro na conexão, nós estourando esse Catch e é exibida essa mensagem junto com a mensagem do erro
        echo "A conexão falhou: ".$e->getMessage();
    }



?>