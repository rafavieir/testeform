

<?php
include ('PHPMailer/class.phpmailer.php');

//Variaveis do formulário
$email_cliente 				= $_POST['email_cliente'];
$senha_email 				= $_POST['senha_email'];
$nome 						= $_POST['nome'];
$email_visitante 			= $_POST['email'];
$telefone 					= $_POST['telefone'];
$observacoes 				= $_POST['observacoes'];

//config smtp

if($_POST['tipo'] == 1)
{
	$tipos = 'host_smtp';
	$porta = 465;
	$segu  = 'ssl';
}
else
{
	$tipos = 'hostsmtp';
	$porta = 587;
	$segu  = 'tls';
}


$mail = new PHPMailer;
$mail->setLanguage('br');                             // Habilita as saídas de erro em Português
$mail->CharSet='UTF-8';                               // Habilita o envio do email como 'UTF-8'

//$mail->SMTPDebug = 3;                               // Habilita a saída do tipo "verbose"

$mail->isSMTP();                                      // Configura o disparo como SMTP
$mail->Host = 'email-ssl.com.br';                     // Especifica o enderço do servidor SMTP da Locaweb
$mail->SMTPAuth = true;                               // Habilita a autenticação SMTP
$mail->Username = "$email_cliente";   		          // Usuário do SMTP
$mail->Password = "$senha_email";                  	  // Senha do SMTP
$mail->SMTPSecure = "$segu";                          // Habilita criptografia TLS | 'ssl' também é possível
$mail->Port = "$porta";                                 // Porta TCP para a conexão

$mail->From = "$email_cliente";                		  // Endereço previamente verificado no painel do SMTP
$mail->FromName = 'Teste de Formulario';              // Nome no remetente
$mail->addAddress("$email_cliente 	");      	  // Acrescente um destinatário

$mail->isHTML(true);                                  // Configura o formato do email como HTML

$mail->Subject = 'Contato pelo site - Teste de Formulário';
$mail->Body    = "O(a) $nome do <b>email</b> $email_visitante entrou em contato com a seguinte <b>mensagem:</b> $observacoes<br> eo <b>Telefone:</b> $telefone";
//$mail->AltBody = 'Esse é o corpo da mensagem em formato "plain text" para clientes de email não-HTML';

if(!$mail->send()) {
    echo 'A mensagem não pode ser enviada';
    echo 'Mensagem de erro: ' . $mail->ErrorInfo;
} else {
    echo 'Mensagem enviada com sucesso';
}
echo "<a class='btn btn-danger' href='index.php'>Voltar</a>";
