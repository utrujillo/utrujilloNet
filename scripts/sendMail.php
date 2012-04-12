<?php
class Mail{
	
	public function SendMail($emailContacto,$nombreContacto,$mensajeContacto){
		$nombre_origen    = "sitio Web utrujillo";
		$email_origen     = $emailContacto;
		//$email_copia      = "utrujillo@intellimentum.com.mx";
		$email_ocultos    = "uziel.trujillo@hotmail.com";
		$email_destino    = "uziel.trujillo@hotmail.com"; 
		
		$asunto		= "Petición a Formulario de Contacto";
		
		
		
		
		$formato	= "html";
		
		//*****************************************************************//
		$headers  = "From: $nombre_origen <$email_origen> \r\n";
		$headers .= "Return-Path: <$email_origen> \r\n";
		$headers .= "Reply-To: $email_origen \r\n";
		//$headers .= "Cc: $email_copia \r\n";
		$headers .= "Bcc: $email_ocultos \r\n";
		$headers .= "X-Sender: $email_origen \r\n";
		$headers .= "X-Mailer: [utrujillo.Net] \r\n";
		$headers .= "X-Priority: 3 \r\n";
		$headers .= "MIME-Version: 1.0 \r\n";
		$headers .= "Content-Transfer-Encoding: 7bit \r\n";
		$headers .= "Disposition-Notification-To: \"$nombre_origen\" <$email_origen> \r\n";
		//*****************************************************************//
		
		if($formato == "html")
		 { $headers .= "Content-Type: text/html; charset=iso-8859-1 \r\n";  }
		   else
			{ $headers .= "Content-Type: text/plain; charset=iso-8859-1 \r\n";  }
		
		if (@mail($email_destino, $asunto, $mensajeContacto, $headers)) 
			{ return true;  } 
			 else 
			{  return false; }       
	}//fin SendMail
}//fin class
?> 
