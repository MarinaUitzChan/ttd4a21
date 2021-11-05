@extends('layouts.master')

@section('contenido')
<!-- INICIO DE VUE-->
	<div id='apiEspecies'> 

	 <div class="row">

          <div class="col-lg-12">

            <div class="card card-warning card-outline">
              <div class="card-header">
                <h5 class="m-0">CRUD ESPECIES</h5>
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
                        <button class="btn btn-danger">Eliminar</button>
                      </td>
                    </tr>
                  </tbody>
                  
                </table>
              </div>
            </div>
          </div>
	 </div> <!-- FIN DE VUE-->
@endsection

@push('scripts')
<script type="text/javascript" src="{{asset('js/apis/especies.js')}}"></script>
<script type="text/javascript" src="{{asset('js/vue-resource.js')}}"></script>
@endpush