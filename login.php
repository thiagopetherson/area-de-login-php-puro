<?php
    session_start();
    require "conexao.php";

    if(isset($_POST['email']) && empty($_POST['email']) == false)
    {
          
        try
        {
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);

            //SELECT que verifica se aquele usuário, com aquele email e senha, existe.
            $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
            $sql = $pdo->prepare($sql); //Prepara a query
            $sql->bindValue(":email", $email); //Passa para a query o valor que está na variável
            $sql->bindValue(":senha", $senha); //Passa para a query o valor que está na variável
            $sql->execute(); //Executa a query       
            
            //Verifica se o usuário consultado no SELECT foi achado
            //Se sim, ele pega os dados dele, se não, somos redirecionados para a página de login
            if($sql->rowCount() > 0)
            {
                $dado = $sql->fetch();
                $_SESSION['id'] = $dado['id'];
                
                header("Location: index.php");
            }
            else
            {
                header("Location: falha.php");
            }


        }
        catch(PDOException $e)
        {   
            echo "Falhou". $e->getMessage();
        }
    }
   
?>
<!-- Formulário de Login -->
<form method="POST">
    E-mail:<br/>
    <input type="text" name ="email" /><br/><br/>
    Senha:<br/>
    <input type="password" name ="senha" /><br/><br/>

    <input type="submit" value="Logar" />

</form>