$(document).ready(function() {
    $("#insertar").click(function(){
        var str=$("#email").val();
        var val=str.match(/[a-z]+[0-9]{3}@+(ikasle.ehu.eus|ikasle.ehu.es)/);
        var vol=str.match(/[a-z]@+(ehu.eus|ehu.es)/);

        if(val==null && vol==null){
            alert('email incorrecto');
            return false;
        }
        if($("#enunciado").val().length < 10){
            alert('enunciado incompleto');
            return false;
         }

         if($("#tema").val().length == 0){
            alert('tema vacio');
            return false;
         }
         if($("#resp1").val().length < 1){
            alert('respuesta1 vacia');
            return false;
         }
         
         if($("#resp2").val().length == 0){
            alert('respuesta2 vacia');
            return false;
         }
         
         if($("#resp3").val().length == 0){
            alert('respuesta3 vacia');
            return false;
         }
         
          if($("#resp4").val().length == 0){
            alert('respuesta4 vacia');
            return false;
         }
		 if($("#imagen").val().length == 0){
            alert('imagen vacia');
            return false;
         }
    		var f= $('#fquestion')[0];
            var datos = new FormData(f);
    		$.ajax({
    			type: 'post',
				enctype: 'multipart/form-data',
    			url: '../php/AddQuestion.php',
    			data:datos,
				processData: false,
				contentType: false,
    			success:function(){
    				$('#visualizar').load('../php/ShowTable.php');
					$('#visualizar_totales').load('../php/TotalPreguntas.php');
    			},
    			cache:false,
    			error:function(){
    				$('#visualizar').html('Error');
    			}
    		});
    	 });
    $("#reset").click(function(){
        $('#visualizar').html('');
    });

    });