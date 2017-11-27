
		<div class="form-group">
			<label> Especialidades que realiza</label>
			<div class="input-group">
				<div class="input-group-addon">
					<span><i class="fa fa-briefcase fa-lg" aria-hidden="true"></i></span>
				</div>
					<select class="form-control" id="especializacion" name="especializacion">
						<option  value="{{$datos->especializacion_id}}">{{$datos->especializacion}}</option>
						<option ">-----------------------------</option>
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
				<select name="actividad" class="form-control" id="actividades">
					<option value="{{ $datos->actividad_id }}">{{ $datos->actividad }}</option>
				</select>
			</div>
		</div><br>


		<div class="experiencia">
{{-- 			<div class="form-group col-sm-6">
				<label>Años De Experiencia</label>
				<div class="input-group">
					<div class="input-group-addon">
						<span><i class="fa fa-calendar fa-lg" aria-hidden="true"></i></span>
					</div>
					<input class="form-control" name="tiempo" type="date" value="">
				</div>
			</div> --}}

			<div class="form-group">
				<label>Seleccion la actividad  a desenpeñar</label>
				<div class="input-group">
					<div class="input-group-addon">
						<span><i class="fa fa-calendar fa-lg" aria-hidden="true"></i></span>
					</div>
					<input class="form-control" name="tiempo" type="date" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
				</div>
			</div>
		</div>