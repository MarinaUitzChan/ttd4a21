function init() {

var apiEspecie= 'http://localhost/ttd4a21/public/apiEspecie'; //se crea para tener un acceso global. 

new Vue({
	//Asignamos el token
	http: {
            headers: {
                'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
            }
        },

	//Especificar la zona de actuación de Vue
	el:"#apiEspecies",

	//Esta sección de VUE sirve para declarar Variables
	//Y constantes.
	data:{
		mensaje: 'HOLA MUNDO CRUEL',
		especies:[],

	},

		//Se  ejecuta automaticamente cuando la pagina se crea
		created:function(){
			this.getEspecies();
		},

	//INICIO DE METHODS
	methods:{
		//Obtiene el listado de todas las especies
		getEspecies:function(){
			this.$http.get(apiEspecie).then(function(j){
				this.especies= j.data;
			})
		},

		eliminarEspecie:function(id){

		Swal.fire({
		  title: 'Esta seguro de eliminar?',
		  text: "No podrá deshacer cambios",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Si, Eliminalo!'
		}).then((result) => {
		  if (result.isConfirmed) {
		  	
		  	this.$http.delete(apiEspecie + '/' + id).then(function(j){
				this.getEspecies();
			}).catch(function(j){
				console.log();
			});

		  Swal.fire(
		     'Eliminado!',
		     'Tu especie fue eliminado',
		     'success'
		    )
		 }
	});

	},//Fin de eliminacion

	mostrarModal(){
		$('#modalEspecies').modal('show');
	}

},
//FIN DE METHODS

//SECCION PARA CALCULAR UN VALOR
computed:{
	
},


}) 
} window.onload = init;