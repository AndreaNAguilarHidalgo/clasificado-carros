<template>
    <input type="submit" class="btn btn-danger d-block mb-2 w-100" 
        value="Eliminar ×" @click="eliminarAnuncio">
</template>

<script>
export default 
{
    props: ['anuncioId'],

    methods: 
    {
        eliminarAnuncio()
        {
            this.$swal
            ({
                    title: '¿Deseas eliminar este anuncio?',
                    text: "Una vez eliminada, no se puede recuperar",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí',
                    cancelButtonText: 'No'
            }).then((result) => 
            {
                if(result.value)
                {
                    const params = {
                        id: this.anuncioId
                    }
                    // Enviar peticion a servidor
                    
                    axios.post(`anuncios/${this.anuncioId}`, {params, _method: 'delete'})

                    .then( respuesta => {
                         this.$swal
                        ({
                            title: 'Anuncio Eliminada',
                            text: 'Se eliminó el anuncio.',
                            icon: 'success'
                        });

                        // Eliminar receta del DOM
                        this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                    })
                    .catch(error => {
                        console.log(error)
                    })
                }
            })
        }
    }
}
</script>