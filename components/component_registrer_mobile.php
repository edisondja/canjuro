		<div class="col-md-5" id="formulario_registrer">
			<table>
				<tr id='usuario_alert'>
				
				</tr>
			</table>
			<input type="text" name="usuario" placeholder="Usuario" id="usuario" class="form-control">
			

			<br>
			<input type="password" name="clave" id="clave"  placeholder="Contraseña" class="form-control">
				<table>
					<tr id='password_alert'>
						<td><strong style="color:#ffed11;">Contraseñas debe tener minimo 8 caracteres</strong></td>
					</tr>
				</table>
			<input type="password" name="clave2" id="clave2" placeholder="Repita su contraseña" class="form-control">
				
		
				<table>
					<tr id='email_alert'>
						
					</tr>
				</table><br>
			<input type="text" name="email" id="email" placeholder="Correo electronico" class="form-control">
				
			<br>
			<strong style="font-size: 14px;">Select your sex</strong><br><br>
			<select id="sexo" class="form-control">
				<option value="Masculino">Masculino</option>
				<option value="Femenina">Femina</option>
			</select><br>
			<button id="registrar" class="btn btn-primary">Registrar</button>			
			<div style="width: 200px; height:10px;" id="mensaje">
						

<script src="components/component_registrer.js"></script>

<style type="text/css">
td{
	padding-left: 2px;
}
table{
	margin-top: 1%;

}

</style>

