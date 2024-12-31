<?php

header('Content-Type: application/json');

// Sanitização dos dados recebidos
$nome = htmlspecialchars(trim($_POST['caixanome']));
$email = htmlspecialchars(trim($_POST['caixaemail']));
$telefone = htmlspecialchars(trim($_POST['caixatelefone']));
$mensagem = htmlspecialchars(trim($_POST['caixamensagem']));

// Validação de campos obrigatórios
if(empty($nome) || empty($email) || empty($telefone) || empty($mensagem)) {
    echo json_encode(["status" => "error", "message" => "Por favor, preencha todos os campos obrigatórios."]);
    exit;
}

// Validação de formato de e-mail
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(["status" => "error", "message" => "Por favor, insira um e-mail válido."]);
    exit;
}

// Validação de formato de telefone
if(!preg_match('/^\d{8,15}$/', $telefone)) {
    echo json_encode(["status" => "error", "message" => "Por favor, insira um telefone válido."]);
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
    echo json_encode(["status" => "success", "message" => "E-mail enviado com sucesso!"]);
} else {
    error_log("Erro ao enviar o e-mail para $destino com dados: " . print_r($_POST, true));
    echo json_encode(["status" => "error", "message" => "Houve um erro ao enviar o e-mail. Tente novamente mais tarde."]);
}

?>
