
function init() {

var apiEspecie= 'http://localhost/ttd4a/public/apiEspecie'; //se crea para tener un acceso global. 

new Vue({
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
		getEspecies:function(){
			this.$http.get(apiEspecie).then(function(j){
				this.especies= j.data;
			});

		}

},
//FIN DE METHODS

//SECCION PARA CALCULAR UN VALOR
computed:{
	
		
	},

}) 

} window.onload = init;