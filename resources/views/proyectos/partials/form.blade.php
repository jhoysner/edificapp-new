	<legend><h2 class="text-center">Creacion de Proyectos</h2></legend>
		<div class="form-group">
			<label>Titulo Proyecto</label>
			<div class="input-group">
				<div class="input-group-addon">
					<span><i class="fa fa-briefcase fa-lg" aria-hidden="true"></i></span>
				</div>
				<input type="text" name="nombre" class="form-control" placeholder="Titulo del proyecto">
			</div>
		</div><br>

		<div class="form-group">
			<label>Descripcion del Proyecto</label>
			<textarea rows="4" class="form-control" name="descripcion">
			</textarea>
		</div><br>

		<div class="form-group">
			<label>Detalles del Proyecto</label>
			<div class="input-group">
				<div class="input-group-addon">
					<span><i class="fa fa-building fa-lg" aria-hidden="true"></i></span>
				</div>
				<textarea rows="3" class="form-control" name="detalles">
			</textarea>
			</div>
		</div>
		<label id="label-terminos">
			<input type="radio" value="5" id="terminos">Al continuar acepta los
				<a href="{{ asset('uploads/docs/PoliticasDeProteccionDeDatos.pdf') }}"  target="_blank">
					Terminos y condiciones.
				</a>
		</label><br>


