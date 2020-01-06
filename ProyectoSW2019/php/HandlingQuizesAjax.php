<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<?php
if($_SESSION['autentificacion']=="si"){
}
else{
  echo"<script> alert('Debe hacer login primero');
                         
                          window.location.href='../php/LogIn.php?<?=SID?>';
                </script>";
}

?>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/AddQuestionsAjax.js"></script>
  <script src="../js/ShowQuestionsAjax.js"></script>

  <section class="main" id="s1">
	
	<div>
	<div id="visualizar_totales"> 
	 </div><br></br>
	
	<div id="formulario">
      <form id='fquestion' name='fquestion' method='post'>
        <?php
        $val=$_SESSION['email'];
        echo"Email: <input type=text name='email' id='email' value='$val' readonly='readonly'><br><br>";
        ?>
        Inserte el enunciado: <input type=text name="enunciado" id="enunciado"><br><br>
        Inserte la respuesta correcta: <input type=text name="resp1" id="resp1"><br><br>
        Inserte la primera incorrecta: <input type=text name="resp2" id="resp2"><br><br>
        Inserte la segunda incorrecta: <input type=text name="resp3" id="resp3"><br><br>
        Inserte la tercera incorrecta: <input type=text name="resp4" id="resp4"><br><br>
		Inserte foto				   <input type=file name="imagen" id="imagen"><br><br>
        
        Dificultad de la pregunta
      <select name="dificultad" id="dificultad">
      <option value="1">Baja</option>
      <option value="2">Media</option>
      <option value="3">Alta</option>
    </select><br><br>
    Tema de la pregunta <input type="text" name= "tema" id="tema"><br><br>
    <input type=button id="insertar" value="Insertar" >
    <input type=button id="verPreguntas" value="Ver preguntas" onclick="verDatos()"><br>
    <input type=reset id="reset" value="Ocultar Tabla" >
    <div id="visualizar">
    </div>
    </form>
  </div>   
    </div>
	
	

  </section>
  <script>
	    $('#visualizar_totales').load('../php/TotalPreguntas.php');

	</script>
  <?php include '../html/Footer.html' ?>
  
</body>
</html>