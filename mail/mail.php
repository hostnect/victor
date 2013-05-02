<?php

$nomeContato = $_POST['nome'];
$emailContato = $_POST['email']; 
$assuntoContato = $_POST['assunto'];
$mensagemContato = $_POST['mensagem'];

// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
require("class.phpmailer.php");

// Inicia a classe PHPMailer
$mail = new PHPMailer();

// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host     = "ssl://smtp.googlemail.com";
$mail->Port     = 465;
$mail->Username = 'victorcbr@gmail.com'; // Usuário do servidor SMTP
$mail->Password = 'victor2308'; // Senha do servidor SMTP

// Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->From = $emailContato; // Seu e-mail
$mail->FromName = $nomeContato; // Seu nome

// Define os destinatário(s)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->AddAddress('victor@hostnect.net', 'Victor Colucci - ADM Site');
$mail->AddBCC('victorcbr@gmail.com', 'Victor Colucci - ADM Site');

//$mail->AddAddress('ciclano@site.net');
//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta

// Define os dados técnicos da Mensagem
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsHTML(TRUE); // Define que o e-mail será enviado como HTML
//$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)

// Define a mensagem (Texto e Assunto)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->Subject  = $assuntoContato; // Assunto da mensagem
$mail->Body = $mensagemContato;
//$mail->AltBody = $mensagemContato;



// Envia o e-mail
$enviado = $mail->Send();

// Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();

if ($enviado) {
echo("<script language = 'javascript'> alert('E-mail enviado com sucesso, muito obrigado.. em breve entrarei em contato!'); </script>");
echo("<script language = 'javascript'> location.href = '../'; </script>");
} else {
echo 'Não foi possível enviar o e-mail.<br /><br />';
echo '<b>Informações do erro:</b> <br />' . $mail->ErrorInfo;
}

?>