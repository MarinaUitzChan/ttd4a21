@extends('layouts.master')

@section('contenido')
<!-- INICIO DE VUE-->
	<div id='apiEspecies'> 

	 <div class="row">

          <div class="col-lg-12">

            <div class="card card-warning card-outline">
              <div class="card-header">
                <h5 class="m-0">CRUD ESPECIES<button  class="btn btn-primary" @click="mostrarModal()">Agregar</button></h5>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped table-hover table-sm">
                  <thead>
                    <th>CLAVE</th>
                    <th>ESPECIE</th>
                    <th>OPERACIONES</th>
                  </thead>

                  <tbody>
                    <tr v-for="especie in especies">
                      <td>@{{especie.id_especie}}</td>
                      <td>@{{especie.especie}}</td>
                      <td>
                        <button class="btn btn-danger" @click="eliminarEspecie(especie.id_especie)">Eliminar</button>
                      </td>
                    </tr>
                  </tbody>
                  
                </table>
              </div>
            </div>
          </div>

<!-- Modal para el formulario del registro de los moovimientos -->
<div class="modal fade" id="modalEspecies" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de Especies</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-row">
            <div class="col">
            <input type="text" name="form-control" placeholder="clave">
            </div>
          

          <div class="col">
            <input type="text" name="form-control" placeholder="nombre de especie">
          </div>
        </div>
        
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" @click="">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- aqui termina el modal-->

	 </div> <!-- FIN DE VUE-->
@endsection

@push('scripts')
<script type="text/javascript" src="js/vue-resource.js"></script>
<script type="text/javascript" src="{{asset('js/apis/especies.js')}}"></script>

@endpush