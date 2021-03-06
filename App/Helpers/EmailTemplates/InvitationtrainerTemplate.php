<?php 


class InvitationtrainerTemplate
{
	// funcion para crear el contenido de la pagina
	// los parametros son los datos basicos que contendra el mensaje
	public static function template( $name, $slug, $club_title, $activity, $salary, $currency )
	{
		$body = "
			<html> 
				<body>
					<div style='background: #DB1B1B; color: white; text-align: center; padding: 10px;'>
						<h2><img src='".RUTA_IMG."/logotipo.png' width='300px' height='80px' /></h2>
					</div>
					<div style='background: #efefef; padding: 30px;'>
						<h3>Welcome to TAKEONE SPORTS & TECHNOLOGY! For us it is a pleasure to be able to count on you, the club ". $club_title ." he has sent him an invitation to belong to his team as a trainner for the activity <i>". $activity ."</i> and with a salary <i>". $salary ." ".$currency."</i>, Enter the following link and complete the form:</h3>
						<p>
							Url: <a href='".RUTA_URL."/Invitation/Trainner/".$slug."/". $activity ."/". $salary ." ".$currency."'>".RUTA_URL."/Invitation/Trainner/".$slug."/". $activity ."/". $salary ." ".$currency."</a>
						</p>
						<h4>Remember that the invitation was sent to your mail by your request. If I do not request this email, please ignore it.</h4>
						<h5 style='text-align:center'>
							** Do not respond to this message, it is automatically generated by the web page system **
						</h5>
					</div>
				</body> 
			</html>
		";
		return $body; 
	}
}