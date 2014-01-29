<?php


/**
 * @author Victor
 * @version 1.0
 * @created 07-may-2011 06:42:29 p.m.
 */
class Email
{
	/**
	 * Logo de la empresa y codigo HTML que va al comienzo del email
	 */
	private $encabezado;
	/**
	 * Es el pie que va en la parte de abajo, con los datos de contacto generalmente
	 */
	private $pie;
	/**
	 * Nombre del remitente a nombre de quien le llega a los usuarios
	 */
	private $remitente = "Caja de Pruebas <info@cajadepruebas.com>";


	function Email()
	{
            $this->encabezado = '<img src="http://www.cajadepruebas.com/assets/images/logo4email.jpg" /><br/>';
            
            $this->pie = "";
            $this->remitente = "Caja de Pruebas <info@cajadepruebas.com>";
	}



	/**
	 * 
	 * @param destinatario    Persona que va a recibir la notifiaci�n
	 * @param cuerpoMensaje    Mensaje a ser enviado, puede contener codigo HTML
	 * @param nombreNotificacion    Nombre del asunto que va a tener en el email
	 */
	function enviarNotificacion($destinatario, $cuerpoMensaje, $nombreNotificacion)
	{
         
		$cuerpo = $this->encabezado;
		$cuerpo .= $cuerpoMensaje;
		$cuerpo .= $this->pie;
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
                $headers  .= "From: $this->remitente \r\n"; 
                mail($destinatario, $nombreNotificacion, $cuerpo,$headers);
	}

}
?>