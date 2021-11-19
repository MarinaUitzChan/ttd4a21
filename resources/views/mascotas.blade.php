@extends('layouts.master')
@section('titulo','CRUD MASCOTAS')
@section('contenido')

	<!--INICIA VUE-->
	<div id="apiMascotas">


		<!--<div class="row">
			<div class="col-md-8">
				<input type="number" placeholder="cantidad" class="form-control" v-model="cantidad"><br>
				<input type="number" placeholder="precio" class="form-control" v-model="precio"><br>

				<h5>TOTAL: @{{total}}</h5>


				
			</div>
			
		</div>-->
<div class="row">
	<div class="col-md-8">
		
	</div>
	
</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card card-warning">
					<div class="card-header">
						<h3>CRUD MASCOTAS
						<span class="btn btn-sm btn-primary" @click="mostrarModal()">
							<i class="fas fa-plus"></i>
						</span>
						</h3>

						<div class="col-md-6">
						<input type="text" placeholder="Escriba el nombre o especie de la mascota" class="form-control" v-model="buscar">
						</div>

					</div>
					<div class="card-body">
						<!--INICIO DE LA TABLA-->
			<table class="table table-bordered table-striped">
				<thead><!--encabezado-->
					<th hidden="">ID MASCOTA</th>
					<th>NOMBRE</th>
					<th>EDAD</th>
					<th>GENERO</th>
					<th>ESPECIE</th>
					<th>ACCIONES</th>
				</thead>

				<tbody>
					<tr v-for="mascota in filtroMascotas">
						<td hidden="">@{{mascota.id_mascota}}</td>
						<td>@{{mascota.nombre}}</td>
						<td>@{{mascota.edad}}</td>
						<td>@{{mascota.genero}}</td>
						<td>@{{mascota.especie.especie}}</td>
						
						<td>
							<button class="btn btn-sm" @click="editandoMascota(mascota.id_mascota)">
								<!--fas se busca un icono solido-->
								<i class="fas fa-pen"></i>
							</button>
							
							<button class="btn btn-sm" @click="eliminarMascota(mascota.id_mascota)">
								<i class="fas fa-trash"></i>
							</button>
						</td>
					</tr>
				</tbody>
			</table>
			<!--FIN DE LA TABLA-->

					</div>
			
			</div>

		</div>
			<!--FIN DE COL-MD-12-->
		</div>

<!-- Modal para el formulario del registro de los moovimientos -->
<div class="modal fade" id="modalMascota" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==true">Agregando Mascota</h5>
        <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==false">Editando Mascota</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
         	<input type="text" class="form-control" placeholder="Nombre de mascota" v-model="nombre"><br>
         	<input type="text" class="form-control" placeholder="Escribe Edad" v-model="edad"><br>
         	<input type="text" class="form-control" placeholder="Escribe peso" v-model="peso"><br>
         	<div class="col">
                 <select class="form-control" v-model="genero">
                 	<option disabled="">Elige un genero</option>
                 	<option value="M">M</option>
                 	<option value="H">H</option>
                 </select><br>

                 <select class="form-control" v-model="id_especie" @change="obtenerRazas">
                 	<option v-for="especie in especies" v-bind:value="especie.id_especie">@{{especie.especie}}</option>
                 </select><br>


                 <select class="form-control" v-model='id_raza'>
                 	<option value="" disabled="">Seleccione una raza</option>
                 	<option v-for="raza in raza" v-bind:value="id_raza">@{{raza.raza}}</option>
                 </select>


                 <!--<h5>Especie elegida: @{{id_especie}}</h5>-->

               </div>

        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" @click="guardarMascota" v-if="agregando==true">Guardar</button>

        <button type="button" class="btn btn-primary" @click="actualizarMascota()" v-if="agregando==false">Guardar</button>

      </div>
    </div>
  </div>
</div>
<!-- aqui termina el modal-->

	</div>
	<!--FIN DE VUE-->
@endsection

@push('scripts')
	<script type="text/javascript" src="js/vue-resource.js"></script>
	<script type="text/javascript" src="js/apis/mascotas.js"></script>
@endpush