<?php

require_once("validacionReg.php");
require_once("funcionesGraficas.php");


$nombre = isset($_POST['txtNombre']) ? $_POST['txtNombre'] : '';
$apellido = isset($_POST['txtApellido']) ? $_POST['txtApellido'] : '';
$user = isset($_POST['txtUsername']) ? $_POST['txtUsername'] : '';
$mail = isset($_POST['txtMail']) ? $_POST['txtMail'] : '';
$confmail = isset($_POST['txtMail']) ? $_POST['txtMail'] : '';
$dia = isset($_POST['dia']) ? $_POST['dia'] : '';
$mes = isset($_POST['mes']) ? $_POST['mes'] : '';
$ano = isset($_POST['ano']) ? $_POST['ano'] : '';
$genero = isset($_POST['rdSexo']) ? $_POST['rdSexo'] : 0;
$cats = isset($_POST['cat']) ? $_POST['cat'] : [];
$pass = isset($_POST['txtPass']) ? $_POST['txtPass'] : '';
$confpass = isset($_POST['txtPassConfirmacion']) ? $_POST['txtPassConfirmacion'] : '';
$desc = isset($_POST['txtDescripcion']) ? $_POST['txtDescripcion'] : '';

$errores=[];

if ($_POST) {
	$errores=validarRegistro($_POST);

	if (!count($errores))
	{
		header('location: felicitaciones.php');
		exit;
	}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
		<?php headerHTML("Registración"); ?>
  </head>
  <body>

		<?php aperturaHTML(); ?>

    <div class="container">
      <h1>Registración</h1>

	  <?php if(count($errores) > 0) { ?>
		<div class="alert alert-danger" role="alert">
			<?php foreach($errores as $error)
			{
				echo $error . "<br/>";
			} ?>
		</div>
	  <?php } ?>
	  <form action="" method="POST">
		  <div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" class="form-control" name="txtNombre" value="<?php echo $nombre ?>" id="nombre"> <br>
			<label for="apellido">Apellido</label>
			<input type="text" class="form-control" name= "txtApellido" value="<?php echo $apellido ?>" id="apellido"> <br>
			<label for="user">Nombre de usuario</label>
			<input type="text" class="form-control" name="txtUsername" value="<?php echo $user ?>" id="user"> <br><br>
		  </div>

		  <div class="form-group">
			<label for="mail">E-Mail</label>
			<input type="text" class="form-control" name="txtMail" value="<?php echo $mail ?>" id="mail"> <br>
			<label for="confmail">Confirme su E-Mail</label>
			<input type="text" class="form-control" name="confmail" id="confmail"> <br>
			<label for="pass">Contraseña</label>
			<input type="password" class="form-control" name="txtPass" id="pass"> <br>
			<label for="otrapass">Confirme su contraseña</label>
			<input type="password" class="form-control" name="txtPassConfirmacion" id="otrapass"> <br>
		  </div>
		  <br>
		  <div class="form-group">
			<b>Sexo</b>: <br>
			<input type="radio" name="rdSexo" <?php if($genero == 0){ ?> checked="checked" <?php } ?> value="0"><i>Masculino</i>
			<input type="radio" name="rdSexo" <?php if($genero == 1){ ?> checked="checked" <?php } ?> value="1"><i>Femenino</i> <br> <br>

			<b>Fecha de nacimiento</b>:

			<select name="dia">
			<option value="">Dia</option>
			<?php for($i = 1; $i <= 31; $i++) {
				if ($dia == $i)
				{?>
			  <option value="<?php echo $i;?>" selected="selected"><?php echo $i;?></option>
				<?php } else { ?>
				<option value="<?php echo $i;?>"><?php echo $i;?></option>
				<?php }} ?>
			</select>

			<select name="mes">
			<option value="">Mes</option>
			<?php for($i = 1; $i <= 12; $i++) {
				if ($mes == $i)
				{?>
			  <option value="<?php echo $i;?>" selected="selected"><?php echo $i;?></option>
				<?php } else { ?>
				<option value="<?php echo $i;?>"><?php echo $i;?></option>
				<?php }} ?>
			</select>

			<select name="ano">
			<option value="">Año</option>
			<?php for($i = date('Y'); $i >= date('Y')-100; $i--) {
				if ($ano == $i)
				{?>
			  <option value="<?php echo $i;?>" selected="selected"><?php echo $i;?></option>
				<?php } else { ?>
				<option value="<?php echo $i;?>"><?php echo $i;?></option>
				<?php }} ?>
			</select><br><br>

			<label for="descr">Descripción</label> <br>
			<textarea rows="8" cols="65"  name="txtDescripcion" id="descr"><?php echo htmlspecialchars($desc); ?></textarea> <br> <br>
		  </div>

		  <div class="form-group">
			<label for="cate">Seleccione sus categorías</label> <br>
			<input type="checkbox" name="cat[]" id="cat" <?php if(in_array(1, $cats)){ ?> checked="checked" <?php } ?> value="1"><i>Deportes</i> <input type="checkbox" name="cat[]" id="cat" <?php if(in_array(2, $cats)){ ?> checked="checked" <?php } ?> value="2"><i>Geografía</i> <input type="checkbox" name="cat[]" id="cat" <?php if(in_array(3, $cats)){ ?> checked="checked" <?php } ?> value="3"><i>Ciencia</i> <br>
			<input type="checkbox" name="cat[]" id="cat" <?php if(in_array(4, $cats)){ ?> checked="checked" <?php } ?> value="4"><i>Arte</i> <input type="checkbox" name="cat[]" id="cat" <?php if(in_array(5, $cats)){ ?> checked="checked" <?php } ?> value="5"><i>Espectaculos</i> <input type="checkbox" name="cat[]" id="cat" <?php if(in_array(6, $cats)){ ?> checked="checked" <?php } ?> value="6"><i>Historia</i> <br> <br>
		  </div>
		  <br>
		  <div class="form-group">
			<input type="checkbox" name="cbTerminos"><b> Acepto los términos y condiciones</b> <br> <br>
			<button type="submit" class="btn btn-default">Registrarse</button> <br> <br>
			</div>
	  </form>
	  </div>

		<?php footerHTML(); ?>
		<?php cierreHTML(); ?>
  </body>
</html>
