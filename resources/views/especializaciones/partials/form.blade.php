
	<legend><h2 class="text-center">Completa Tu Cuenta Especialista</h2></legend>
		<div class="form-group">
			<label> Especialidades que realiza</label>
			<div class="input-group">
				<div class="input-group-addon">
					<span><i class="fa fa-briefcase fa-lg" aria-hidden="true"></i></span>
				</div>
				<select class="form-control" id="especializacion" name="especializacion">
					<option selected="selected"> Selecciona una especializacion</option>
					@foreach ($especializaciones as $especialidad)
						<option  value="{{$especialidad->id}}">{{$especialidad->nombre}}</option>
					@endforeach
				</select>
			</div>
		</div><br>

		<div class="form-group">
			<label>Seleciones la actividad a desempeñar</label>
			<div class="input-group">
				<div class="input-group-addon">
					<span><i class="fa fa-building fa-lg" aria-hidden="true"></i></span>
				</div>
				<select class="form-control" id="actividades" name="actividad">
					<option selected="selected"> Selecciona una especializacion</option>
				</select>
			</div>
		</div><br>

		<div class="form-group">
			<label>Seleccion la actividad  a desenpeñar</label>
			<div class="input-group">
				<div class="input-group-addon">
					<span><i class="fa fa-building fa-lg" aria-hidden="true"></i></span>
				</div>
				<input class="form-control" name="tiempo" type="date" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
			</div>
		</div>

