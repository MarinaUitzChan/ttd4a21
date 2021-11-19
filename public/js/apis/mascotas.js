function init() {


var apiMascota= 'http://localhost/ttd4a21/public/apiMascota'; //se crea para tener un acceso global. 
var apiEspecie= 'http://localhost/ttd4a21/public/apiEspecie';

new Vue({

	http: {
            headers: {
                'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
            }
        },

	//Especificar la zona de actuación de Vue
	el:"#apiMascotas",

	//Esta sección de VUE sirve para declarar Variables
	//Y constantes.
	data:{
		prueba:'ESTA ES UNA PRUEBA',
		mascotas:[],
		especies:[],
		raza:[],

		nombre:'',
		edad:0,
		genero:'',
		peso:0,
		agregando:true,
		id_mascota:'',
		id_especie:'',
		id_raza:'',


		cantidad:1,
		precio:0,
		buscar:'',

	},

		//Se  ejecuta automaticamente cuando la pagina se crea
		created:function(){
			this.obtenerMascotas();
			this.obtenerEspecies();
		},

	//INICIO DE METHODS
	methods:{
		//Obtiene el listado de todas las especies
		obtenerMascotas:function(){
			this.$http.get(apiMascota).then(function(json){
				this.mascotas=json.data;
				console.log(json.data);
			}).catch(function(json){
				console.log(json);
			});
		},

		mostrarModal:function(){
			this.agregando=true;
			this.nombre='';
			this.edad='';
			this.peso='';
			this.genero='';

			$('#modalMascota').modal('show');
		},

		guardarMascota:function(){

			var mascota={nombre:this.nombre,
				edad:this.edad,
				peso:this.peso,
				genero:this.genero,
				id_especie:this.id_especie};

			//Se construye el json para enviar al controlador
			var mascota={nombre:this.nombre,edad:this.edad,peso:this.peso,genero:this.genero};
			//Se envia los datos de json a Controlador
			this.$http.post(apiMascota,mascota).then(function(j){
				this.obtenerMascotas();
				console.log(j);
				this.nombre='';
				this.edad='';
				this.peso='';
				this.genero='';
				this.id_especie;
				

			}).catch(function(j){
				//console.log(j);
			});

			$('#modalMascota').modal('hide');

			console.log(mascota);
		},

		eliminarMascota:function(id){
			var confir= confirm('Esta seguro de eliminar la mascota?');

			if(confir)
			{
				this.$http.delete(apiMascota + '/' + id).then(function(json){
					this.obtenerMascotas();
				}).catch(function(json){

				});
			}
		},

		editandoMascota:function(id){
			this.agregando=false;
			this.id_mascota=id;


			this.$http.get(apiMascota + '/' + id).then(function(json){
				//console.log(json.data);

				this.nombre=json.data.nombre;
				this.edad=json.data.edad;
				this.genero=json.data.genero;
				this.peso=json.data.peso;

			});


			$('#modalMascota').modal('show');

		},

		actualizarMascota:function(){

			var jsonMascota = {nombre:this.nombre, 
								edad:this.edad,
								peso:this.peso,
								genero:this.genero,
								id_especie:this.id_especie
							};

							//console.log(jsonMascota);
			
			this.$http.patch(apiMascota + '/' + this.id_mascota,jsonMascota).then(function(json){
				this.obtenerMascotas();
			});

			$('modalMascota').modal('hide');

		},

		obtenerEspecies:function(){
			this.$http.get(apiEspecie).then(function(json){
				this.especies=json.data;
			});
		},

		//Evento
		obtenerRazas(e){
			var id_especie=e.target.value;
			//console.log(id_especie);

			this.$http.get(apiEspecie + '/getRazas/' + id_especie).then(function(j){
				this.raza=j.data;
			});
		}

},
//FIN DE METHODS

//SECCION PARA CALCULAR UN VALOR
computed:{//Inicio de Computed
	total:function(){
		var t=0;
		t= this.cantidad * this.precio;
		return t;

	},

	filtroMascotas:function(){
		return this.mascotas.filter((mascota)=>{
			return mascota.nombre.toLowerCase().match(this.buscar.toLowerCase().trim()) || 
					mascota.especie.especie.toLowerCase().match(this.buscar.toLowerCase().trim())
					
			
		});
	}
	
},//fin de computed


})
} window.onload = init;