function init() {

var apiProducto= 'http://localhost/ttd4a21/public/apiProducto'; //se crea para tener un acceso global. 

new Vue({
	//Asignamos el token
	http: {
            headers: {
                'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
            }
        },

	//Especificar la zona de actuación de Vue
	el:"#apiVenta",

	//Esta sección de VUE sirve para declarar Variables
	//Y constantes.
	data:{
		mensaje: 'HOLA MUNDO CRUEL',
		

	},

	//INICIO DE METHODS
	methods:{
		

},
//FIN DE METHODS

//SECCION PARA CALCULAR UN VALOR
computed:{
	
},


}) 
} window.onload = init;