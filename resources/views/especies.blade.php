<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CRUD DE ESPECIES</title>
	<script type="text/javascript" src="{{asset('js/vue.js')}}"></script>
</head>
<body>
	<!-- INICIO DE VUE-->
	<div id='apiEspecies'> 

		<h1>@{{mensaje}}</h1>

		<pre>
			@{{especies}}
		</pre>

	 </div> <!-- FIN DE VUE-->

<script type="text/javascript" src="{{asset('js/apis/especies.js')}}"></script>
<script type="text/javascript" src="{{asset('js/vue-resource.js')}}"></script>
</body>
</html>