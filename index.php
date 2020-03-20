<?php
    session_start();
    //Verificando o usuário está logado
    if(isset($_SESSION['id']) && empty($_SESSION['id']) == false)
    {
        echo "VOCÊ ESTÁ LOGADO !";
        echo "<br>";
        echo "A partir daqui, você pode começar a fazer o seu sistema !";
    }   
    else //Se o usuário não tiver logado, ele é direcionado para a página de login
    {
        header("Location: login.php");

    }

?>