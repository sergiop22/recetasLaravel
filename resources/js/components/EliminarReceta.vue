<template>
    <input 
	    type="submit" 
	    class="btn btn-danger d-block w-100 mb-2" 
	    value="Eliminar"
	    @click="eliminarReceta"
    >
</template>


<script>
	export default {
		props: ['recetaId'],
		methods: {
			eliminarReceta() {
				this.$swal( {
				  title: "Deseas eliminar esta receta?",
				  text: "Una vez eliminada, no se puede recuperar",
				  icon: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'SI',
				  cancelButtonText: 'NO'
				}).then((result) => {
				  if (result.value) {
				  	const params = {
				  		id: this.recetaId
				  	}
				  	axios.post(`recetas/${this.recetaId}`, {params, _method: 'delete'})
				  	.then( respuesta => {
					  		this.$swal( {
					    	title: 'Receta eliminada',
					    	text: 'Se elimino la receta',
					    	icon: 'success'
					    });

					  	//eliminar receta de DOM
					  	this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
				  	})
				  	.catch( error => {
				  		console.log(error)
				  	})
				  }
				})
			}
		}
	}
</script>