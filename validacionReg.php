<?php
	function validarRegistro(array $datos){
		$errores = [];

		$nombre = isset($datos['txtNombre']) ? $datos['txtNombre'] : '';
		$apellido = isset($datos['txtApellido']) ? $datos['txtApellido'] : '';
		$user = isset($datos['txtUsername']) ? $datos['txtUsername'] : '';
		$mail = isset($datos['txtMail']) ? $datos['txtMail'] : '';
		$confmail = isset($datos['txtMail']) ? $datos['txtMail'] : '';
		$dia = isset($datos['dia']) ? $datos['dia'] : '';
		$mes = isset($datos['mes']) ? $datos['mes'] : '';
		$ano = isset($datos['ano']) ? $datos['ano'] : '';
		$genero = isset($datos['rdSexo']) ? $datos['rdSexo'] : 0;
		$cats = isset($datos['cat']) ? $datos['cat'] : [];
		$pass = isset($datos['txtPass']) ? $datos['txtPass'] : '';
		$confpass = isset($datos['txtPassConfirmacion']) ? $datos['txtPassConfirmacion'] : '';
		$desc = isset($datos['txtDescripcion']) ? $datos['txtDescripcion'] : '';

		if(!$nombre)
		{
			$errores['nombre'] = 'Debe ingresar un nombre';
		}
		if(!$apellido)
		{
			$errores['apellido'] = 'Debe ingresar un apellido';
		}
		if(!$user)
		{
			$errores['user'] = 'Debe ingresar un nombre de ususario';
		}
		if(!$mail)
		{
			$errores['mail'] = 'Debe ingresar un E-Mail';
		}
		elseif(!filter_var($mail, FILTER_VALIDATE_EMAIL))
		{
			$errores['mail'] = 'Debe ingresar un E-Mail válido';
		}
		elseif(!$mail == $confmail)
		{
			$errores['mail'] = 'Los E-Mails no coinciden';
		}
		if (!$pass)
		{
			$errores['pass'] = 'Debe ingresar una contraseña';
		}
		elseif(!strlen($pass) >= 6)
		{
			$errores['pass'] = 'Ingrese una contraseña con más de 6 caracteres';
		}
		elseif(!$pass == $confpass)
		{
			$errores['pass'] = 'Las contraseñas no coinciden';
		}
		if(!checkdate((int)$mes,(int)$dia,(int)$ano))
		{
			$errores['fecha'] = 'Ingrese una fecha válida';
		}
		if (!(strlen($desc) >= 20 && strlen($desc) <= 140))
		{
			$errores['desc'] = 'La descripción debe tener entre 20 y 140 caracteres';
		}
		if (count($cats) < 2)
		{
			$errores['cats'] = 'Seleccione al menos 2 categorias';
		}
		if(!isset($_POST['cbTerminos']))
		{
			$errores['term'] = 'Acepte los terminos y condiciones';
		}

		return $errores;
	}
