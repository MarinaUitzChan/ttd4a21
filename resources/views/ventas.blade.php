@extends('layouts.master')
@section('titulo','Interface de ventas')
@section('contenido')

<div id='apiVenta'> <!--INICIO DE VUE-->
	<div class="container"><!--INICIO DE CONTAINER-->
		<div class="row"><!--INICIO ROW-->
			<div class="col-md-4"><!--INICIO DE COL-->
				
				<div class="input-group mb-3">
					<input type="text" class="form-control" placeholder="Escriba el codigo de producto" arial-label="Recipient's username" arial-describedby="basic-addon2">

					<div class="input-group-append">
						<button class="btn btn-outline-secondary" type="button">Buscar</button>
					</div>	

				</div>
			
			</div><!--FIN DE COL-->	
		</div><!--FIN DE ROW-->

	</div><!--FIN DE CONTAINER-->
	
</div><!--FIN DE VUE-->

@endsection

@push('scripts')
	<script type="text/javascript" src="js/vue-resource.js"></script>
	<script type="text/javascript" src="js/apis/apiVenta.js"></script>
@endpush

