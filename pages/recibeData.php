<?php
	include_once("../scripts/sendMail.php");
	$mail = new Mail();
	
	$nombreContacto 	= $_POST["nombreContacto"];
	$emailContacto 		= $_POST["emailContacto"];
	$mensajeContacto 	= $_POST["mensajeContacto"];
	
		$result = $mail->SendMail($emailContacto,$nombreContacto,$mensajeContacto);
		
		if($result):
?>
			<div class="toolTip tpRed borderContent clearfix" >
                <div>
                    <img src="img/light-bulb-off.png" alt="Tip!" />
                    Tu Mensaje ha sido Enviado correctamente
                </div> 
                <a class="close" title="Close"></a>
            </div>
		
		<?php else: ?>
			
            <div class="toolTip tpYellow borderContent clearfix" >
                <div>
                    <img src="img/light-bulb-off.png" alt="Tip!" />
                    Hubo un error al intentar enviar el correo
                </div> 
                <a class="close" title="Close"></a>
            </div>
            
		<?php endif; ?>