<?php

// Sanitização dos dados recebidos
$nome = htmlspecialchars(trim($_POST['caixanome']));
$email = htmlspecialchars(trim($_POST['caixaemail']));
$telefone = htmlspecialchars(trim($_POST['caixatelefone']));
$mensagem = htmlspecialchars(trim($_POST['caixamensagem']));

// Validação de campos obrigatórios
if(empty($nome) || empty($email) || empty($telefone) || empty($mensagem)) {
    echo "Por favor, preencha todos os campos obrigatórios.";
    exit;
}

// Validação de formato de e-mail
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Por favor, insira um e-mail válido.";
    exit;
}

// Configuração do e-mail
$destino = "pedropatamon@gmail.com";
$assunto = "Dados dos Leads - Landing Page";

$body = "Nome: $nome\n";
$body .= "E-mail: $email\n";
$body .= "Telefone: $telefone\n";
$body .= "Mensagem: $mensagem\n";

$cabecalho = "From: pedropatamon@gmail.com\r\n";
$cabecalho .= "Reply-To: $email\r\n";
$cabecalho .= "X-Mailer: PHP/" . phpversion();

// Envio do e-mail
if(mail($destino, $assunto, $body, $cabecalho)) {
    echo "E-mail enviado com SUCESSO!";
} else {
    echo "Houve um erro ao enviar o e-mail. Tente novamente mais tarde.";
}

?>
