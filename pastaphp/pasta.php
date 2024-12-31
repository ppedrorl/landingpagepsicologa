<?php

    $nome = addslashes($_POST['caixanome']);
    $email = addslashes($_POST['caixaemail']);
    $telefone = addslashes($_POST['caixatelefone']);
    $mensagem = addcslashes($_POST['caixamensagem']);

    $destino = "pedropatamon@gmail.com";
    $assunto = "Dados dos Leads - LandingPage"

    $body = "Nome: ".$nome."\n"."E-mail: ".$email."\n"."Telefone: ".$telefone."\n"."Mensagem: ".$mensagem;

    $cabecalho = "From pedropatamon@gmail.com"."\n"."Reply-to: ".$email."\n"."X=Mailer:PHP/".phpversion();

    if(mail($destino, $assunto, $body, $cabecalho)){
        echo("E-mail enviado com SUCESSO!!");
    }else{
        echo("Houve um erro ao enviar o e-mail!!");
    }
?>