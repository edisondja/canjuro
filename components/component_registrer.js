	function validar_email(email) 
	{
	      var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		    return regex.test(email) ? true : false;
	}


$('document').ready(()=>{

	var control_user = false ;
	var control_email = false;
	var control_password = false;


	$('#usuario').keyup(()=>{


		$.ajax({
			url:'components/component_registrer_val.php',
			type:'post',
			data:{
				action:'check_user',
				usuario:$('#usuario').val()

			}



		}).done(function(data){

			if(data=="disponible"){

				control_user = true;

				$('#usuario_alert').html(`
					<tr id='usuario_alert'>
						<td><div  style="height: 10px; width: 10px; border-radius:100px;margin-top: 2%; background:#42f542;"></div></td>
						<td><strong style="color:#42f542">Disponible</strong></td>
					</tr>
				`);


			}else{
				control_user = false;

				$('#usuario_alert').html(`
					<tr id='usuario_alert'>
						<td><div  style="height: 10px; width: 10px; border-radius:100px;margin-top: 2%; background:#ff1010"></div></td>
						<td><strong style="color:#ff1010">No Disponible</strong></td>
					</tr>
				`);


			}




		});
			




	});


	$('#email').keyup(()=>{

			$.ajax({
			url:'components/component_registrer_val.php',
			type:'post',
			data:{
				action:'check_email',
				email:$('#email').val()

			}



		}).done(function(data){

			if(data=="disponible"){

				control_email = true;

				$('#email_alert').html(`
					<tr id='email_alert'>
						<td><div  style="height: 10px; width: 10px; border-radius:100px;margin-top: 2%; background:#42f542;"></div></td>
						<td><strong style="color:#42f542">Disponible</strong></td>
					</tr>
				`);


			}else{
				control_email = false;

				$('#email_alert').html(`
					<tr id='usuario_alert'>
						<td><div  style="height: 10px; width: 10px; border-radius:100px;margin-top: 2%; background:#ff1010"></div></td>
						<td><strong style="color:#ff1010">No Disponible</strong></td>
					</tr>
				`);


			}




		});
			



	});



	$('#registrar').click(function(){

			if(control_user==true && control_password==true && control_email==true){

				var contraseñas_check = false;
				var correo_check = false;
				var usuario_check = false;

					var clave = $('#clave').val();

					if(clave.length<8){

						  $('#password_alert').html(`
							<tr id='password_alert'>
								<td><div  style="height: 10px; width: 10px; border-radius:100px;margin-top: 2%; background:#ff1010;"></div></td>
								<td><strong style="color:#ff1010">Debe tener minimo 8 caracteres de contraseña</strong></td>
							</tr>
					      `);


					}else{	
						 contraseñas_check=true;

						  $('#password_alert').html(`
							<tr id='password_alert'>
								<td><div  style="height: 10px; width: 10px; border-radius:100px;margin-top: 2%; background:#42f542;"></div></td>
								<td><strong style="color:#42f542">Nivel decente</strong></td>
							</tr>
					      `);


					}	

				var usuario = $('#usuario').val();


					if(usuario.length<5){

						  $('#usuario_alert').html(`
							<tr id='usuario_alert'>
								<td><div  style="height: 10px; width: 10px; border-radius:100px;margin-top: 2%; background:#ff1010;"></div></td>
								<td><strong style="color:#ff1010">Su usuario es muy corto , minimo 5 caractares</strong></td>
							</tr>
					      `);


					}else{
						usuario_check = true;

						  $('#usuario_alert').html(`
							<tr id='usuario_alert'>
								<td><div  style="height: 10px; width: 10px; border-radius:100px;margin-top: 2%; background:#42f542;"></div></td>
								<td><strong style="color:#42f542">Nivel decente</strong></td>
							</tr>
					      `);


					}	
                      
                    var email = $('#email').val();
					var correcto_mail = validar_email(email);	

					if(correcto_mail){
						correo_check = true;

						  $('#email_alert').html(`
							<tr id='email_alert'>
								<td><div  style="height: 10px; width: 10px; border-radius:100px;margin-top: 2%; background:#42f542;"></div></td>
								<td><strong style="color:#42f542">Este correo es correcto</strong></td>
							</tr>
					      `);


					}else{
					  $('#email_alert').html(`
							<tr id='email_alert'>
								<td><div  style="height: 10px; width: 10px; border-radius:100px;margin-top: 2%; background:#ff1010;"></div></td>
								<td><strong style="color:#ff1010;">Esto no es una direccion de correo electronico</strong></td>
							</tr>
					      `);


					}

					if(contraseñas_check==true && correo_check==true && usuario_check==true){

							//procedemos a registrar el usuario  este es el segundo nivel de validacion

							$.ajax({
								url:'components/component_registrer_val.php',
								type:'post',
								data:{
									action:'registrer_user',
									usuario:$('#usuario').val(),
									clave:$('#clave').val(),
									clave2:$('#clave2').val(),
									email:$('#email').val(),
									sexo:$('#sexo').val()

								}


							}).done((data)=>{

								//alertiffy.succes(data);
								console.log(data);
								if(data=="success"){
									
									$('#mensaje').html(`
										<p style="color:#6eff6e;padding-top:2px;padding-bottom: 2px;font-size:18px;">Registrado con exito!! Inicie sesion</p>
									`);
									
									$('#usuario').val("");
									$('#clave').val("");
									$('#clave2').val("");
									$('#email').val("");

								}else{

									$('#mensaje').html(`
										<p style="color:#6eff6e;padding-top:2px;padding-bottom: 2px;font-size:18px;">Datos no balido</p>
									`);

								}


							});




					}



			}



	});


	$('#clave2').keyup(function(){

		var clave = $('#clave').val();
		var clave2 = $('#clave2').val();

		if(clave==clave2){

			$('#password_alert').html(`
					<tr id='password_alert'>
						<td><div  style="height: 10px; width: 10px; border-radius:100px;margin-top: 2%; background:#42f542;"></div></td>
						<td><strong style="color:#42f542">Contraseñas correctas</strong></td>
					</tr>
				   `);
			control_password = true;

		}else{


			$('#password_alert').html(`
					<tr id='password_alert'>
						<td><div  style="height: 10px; width: 10px; border-radius:100px;margin-top: 2%; background:#ff1010;"></div></td>
						<td><strong style="color:#ff1010">Las contraseñas no son iguales</strong></td>
					</tr>
			      `);

		  control_password = false;

		}






	});







});