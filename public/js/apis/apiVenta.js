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
		sku:'',
		ventas:[],
		cantidades:[],
		cant:1,

	},

	//INICIO DE METHODS
	methods:{
		
		buscarProducto:function(){

		if(this.sku){//INICIO DE IF(THIS.SKU)

			var producto = {}
			this.$http.get(apiProducto + '/' + this.sku).then(function(j){
				producto = {
					sku:j.data.sku,
					nombre:j.data.nombre,
					precio:j.data.precio,
					cantidad:1, 
					total:j.data.precio
				};

	
					this.ventas.push(producto);
					this.cantidades.push(1);
				this.sku='';
			});
		}//FIN DE IF(THIS.SKU)

		}

},
//FIN DE METHODS

//SECCION PARA CALCULAR UN VALOR
computed:{
	
},


}) 
} window.onload = init;