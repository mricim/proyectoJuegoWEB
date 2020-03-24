<?php
		#Las configuraciones se realizan en ../configs/propiedad.php
	# necesita estas variables para enviar el correo:
	# $nombrecompleto
	# $emaildestinatario
	# $asunto .se_llama
	# $cuerpo
	# $cuerposinhtml
	

	#Envio del email
	
	#http://phpmailer.worxware.com/index.php?pg=examplebsmtp
		require(dirname(__FILE__).'/phpmailer/PHPMailerAutoload.php');
			include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

			$mail             = new PHPMailer();

				$body             = $cuerpo;

				$mail->IsSMTP(); // telling the class to use SMTP
				$mail->Host       = "imap.gmail.com"; // SMTP server
				$mail->SMTPDebug  = false;                     // enables SMTP debug information (for testing)
														   // 1 = errors and messages
														   // 2 = messages only
				$mail->SMTPAuth   = true;                  // enable SMTP authentication
				$mail->Port       = 465;                    // set the SMTP port for the GMAIL server
				$mail->SMTPSecure = "ssl";					//Definmos la seguridad como TLS
				$mail->WordWrap   = 50;
				$mail->Username   = $correo_des_del_que_se_envia; // SMTP account username
				$mail->Password   = $contrasena_del_correo;        // SMTP account password

				$mail->SetFrom($correo_des_del_que_se_envia, $quien_lo_envia);#aqui es mejor poner lo mismo que en / $mail->Username   = "pue@realdevelopers.es";

				$mail->AddReplyTo($donde_se_responde, $quien_lo_envia); #correo al que le responderas / nombre de a quien le responde

				$mail->Subject    = $asunto;

				$mail->AltBody    = $cuerposinhtml; // optional, comment out and test

				$mail->MsgHTML($body);

				$address = $emaildestinatario;#A quien le envia el mensaje
				$mail->AddAddress($address, $nombrecompleto);

				#$mail->AddAttachment("images/phpmailer.gif");      // attachment
				#$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
				$mail->CharSet = 'UTF-8';

				if(!$mail->Send()) {
				  $resultado_envio3 = "El error del envio a sido: " . $mail->ErrorInfo;
				} else {
				  $resultado_envio3 = "El mensaje se envio!";
				}
			echo $resultado_envio3;

?>