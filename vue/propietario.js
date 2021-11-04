new Vue({
	//Especificar la zona de actuación de Vue
	el:"#miPagina",

	//Esta sección de VUE sirve para declarar Variables
	//Y constantes.
	data:{
		mensaje: 'HOLA MUNDO CRUEL',
		alumno:'',
		nombre:'',
		genero:'',
		edad:0,
		editando:0,
		indice:0,
		buscar:'',
		propietarios:[{nombre:'Betzabe May', genero:'Femenino', edad:21},
				  {nombre:'Juan Ek', genero:'Masculino', edad:21},
				  {nombre:'Gaspar Uitz', genero:'Masculino', edad:49},
				  {nombre:'Carina Chan', genero:'Femenino', edad:48}
				 ],

		generos:[
			       {clave:1, nombre:'Femenino'},
			       {clave:2, nombre:'Masculino'}
		         ],

	},

	//Este objeto permite crear funciones y/o procedimientos
	methods:{


		aumentarEdad:function(){
			
		this.edad=Number(this.edad)+1;
		
		},

		disminuirEdad:function(){
			this.edad=Number(this.edad)-1;
		},

		agregarPropietario:function(){

			if (this.nombre && this.genero && this.edad){
			// Construimos un objeto de tipo mascota para insertar en el array
      		var unPropietario={nombre:this.nombre,genero:this.genero,edad:this.edad};

		    // Agrego un objeto mascota
		     this.propietarios.push(unPropietario);
		     this.limpiarHtml();

		     //Enviamos el foco al primer HTML / nombre de la mascota
		     this.$refs.nombre.focus();

		     //Enviamos mensaje de configuracion
		     Swal.fire({
				  position: 'top-end',
				  icon: 'success',
				  title: 'El propietario se guardó corecctamente',
				  showConfirmButton: false,
				  timer: 2000
			});
			 } 

		    else
		     Swal.fire({
				  position: 'top-end',
				  icon: 'error',
				  title: 'Debe capturar todos los datos',
				  showConfirmButton: false,
				  timer: 2000
			});
   },

   		limpiarHtml:function(){
	     this.nombre='';
	     this.genero='';
	     this.edad='';
   },
   
   eliminarPropietario:function(pos){
   	//var pregunta=confirm('Esta seguro de eliminar?');
   	
   	//if (pregunta)
   		//Console.log('Voy a eliminar el: ' + pos);
   	//this.mascotas.splice(pos,1);
   	//else
   	//Console.log('Se arrepintío');


   	//Ventana de sweet alert
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
		  	//Eliminamos la mascota seleccionada
		  	this.propietarios.splice(pos,1);
		  Swal.fire(
		     'Eliminado!',
		     'Tu propietario fue eliminado',
		     'success'
		    )
		 }
	});
   	//Fin de venta sweet alert
},

	editarPropietario:function(pos){
		this.nombre=this.propietarios[pos].nombre;
		this.genero=this.propietarios[pos].genero;
		this.edad=this.propietarios[pos].edad;
		this.editando=1;
		this.indice=pos;

	},

	cancelar:function(){
		this.limpiarHtml();
		this.editando=0;
	},

	guardaEdicion:function(){
		//Modifico los valores de array de objetos
		this.propietarios[this.indice].nombre=this.nombre;
		this.propietarios[this.indice].genero=this.genero;
		this.propietarios[this.indice].edad=this.edad;

		//limpiamos los componentes HTML
		this.limpiarHtml();
		//Indicamos que terminamos de editar,(Actualizamos el boton agregar)
		this.editando=0;

		
		 Swal.fire({
  			position: 'top-end',
  			icon: 'info',
  			title: 'Los cambios fueron efectuados',
  			showConfirmButton: false,
  			timer: 2000,
		});
		 },  
},
//FIN DE METHODS

//SECCION PARA CALCULAR UN VALOR
computed:{
	numeroPropietario:function(){
		var num=0;
		num=this.propietarios.length;
		return num;
	},

	filtroPropietarios:function(){
		return this.propietarios.filter((propietario)=>{
			return propietario.nombre.toLowerCase().match(this.buscar.toLowerCase().trim()) || 
			propietario.genero.toLowerCase().match(this.buscar.toLowerCase().trim())

		});
	},
}

}); 