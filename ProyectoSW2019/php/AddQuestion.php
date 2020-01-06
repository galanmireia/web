<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <?php include '../php/DbConfig.php'?>;

  <section class="main" id="s1">
  	<div>
  		<?php
    	$conexion = mysqli_connect($server, $user, $pass, $basededatos);

    	if(!$conexion){
    		die("Connection failed: " . mysqli_connect_error());
    	}
    	
    	

    		$email = $_POST['email'];
       	$enunciado = $_POST['enunciado'];
    		$respC = $_POST['resp1'];
    		$respuesta1 = $_POST['resp2'];
    		$respuesta2 = $_POST['resp3'];
    		$respuesta3 = $_POST['resp4'];
    		$dificultad = $_POST['dificultad'];
    		$tema = $_POST['tema'];
			$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

			
    		?>

<?php

        // var str=$email;
         //var val=str.match(/[a-z]+[0-9]{3}@+(ikasle\.ehu\.eus|ikasle\.ehu\.es)/);
         //var vol=str.match(/([a-z]{2}\.[a-z]|[a-z])@+(ehu\.eus|ehu\.es)/);

         if(preg_match("/[a-z]+[0-9]{3}@+(ikasle\.ehu\.eus|ikasle\.ehu\.es)/",$email)==null && preg_match("/([a-z]{2}\.[a-z]|[a-z])@+(ehu\.eus|ehu\.es)/",$email)==null){
         	            echo "<script> alert('email incorrecto')</script>";
         	            die('Email incorrecto <br><br>
         	             <button onclick="goBack()">Go Back</button>

								<script>
								function goBack() {
  								window.history.back();
								}
								</script>');

         }
        


        if(strlen($enunciado)< 10){
            echo "<script> alert('enunciado incompleto')</script>";
            die('Enunciado incompleto <br><br>
         	             <button onclick="goBack()">Go Back</button>

								<script>
								function goBack() {
  								window.history.back();
								}
								</script>');
         }

         if(strlen($respC) ==0){
            echo "<script> alert('respuesta correcta incompleta')</script>";
                        die('Respuesta correcta incompleta <br><br>
         	             <button onclick="goBack()">Go Back</button>

								<script>
								function goBack() {
  								window.history.back();
								}
								</script>');

         }
         
         if(strlen($respuesta1) ==0){
            echo "<script> alert('respuesta 2 incompleta')</script>";
                       die('Respuesta 2 incompleta <br><br>
         	             <button onclick="goBack()">Go Back</button>

								<script>
								function goBack() {
  								window.history.back();
								}
								</script>');


         }
         
         if(strlen($respuesta2) ==0){
            echo "<script> alert('respuesta 3 incompleta')</script>";
                          die('Respuesta 3 incompleta <br><br>
         	             <button onclick="goBack()">Go Back</button>

								<script>
								function goBack() {
  								window.history.back();
								}
								</script>');

         }
         
        if(strlen($respuesta3) ==0){
            echo "<script> alert('respuesta 4 incompleta')</script>";
                          die('Respuesta 4 incompleta <br><br>
         	             <button onclick="goBack()">Go Back</button>

								<script>
								function goBack() {
  								window.history.back();
								}
								</script>');
         }
         
          if(strlen($tema) ==0){
            echo "<script> alert('tema incompleto')</script>";
                          die('Tema incompleto <br><br>
         	             <button onclick="goBack()">Go Back</button>

								<script>
								function goBack() {
  								window.history.back();
								}
								</script>');
         }

    ?>

    <?php
    $xml=simplexml_load_file('../xml/Questions.xml');
    $assessmentItem = $xml->addChild('assessmentItem');
    $assessmentItem ->addAttribute('author',$email);
    $assessmentItem ->addAttribute('subject','');
    $itemBody= $assessmentItem ->addChild('itemBody');
    $itemBody->addChild('p',$enunciado);
    $correctResponse= $assessmentItem ->addChild('correctResponse');
    $correctResponse->addChild('value',$respC);
    $incorrectResponse= $assessmentItem ->addChild('incorrectResponse');
    $incorrectResponse->addChild('value',$respuesta1);
    $incorrectResponse->addChild('value',$respuesta2);
    $incorrectResponse->addChild('value',$respuesta3);
    $xml->asXML('../xml/Questions.xml');
    ?>
    <?php
    		echo "Connected succesfully <br><br>";
    		$sql = "INSERT INTO Preguntas(clave, email, enunciado, respuestaC, respuesta1, respuesta2, respuesta3, complejidad, tema,imagen) VALUES (NULL, '$email', '$enunciado', '$respC', '$respuesta1', '$respuesta2', '$respuesta3', '$dificultad', '$tema','$imagen')";
          echo 'respuesta insertada correctamente';
    		if(mysqli_query($conexion, $sql)){
    			
    		} 
    		else {
    			echo "ERROR: " . $sql . "<br>" . mysqli_error($conexion);
    		}
    		mysqli_close($conexion);
    	?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
