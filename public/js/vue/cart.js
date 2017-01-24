new Vue({
    el: '#app',
    delimiters : ['[[', ']]'], //Versão 2.0 do VUE
    data: {
        api_token : '',
        results : []
    },
    methods : {
        DeleteItens(id){
            App.startPageLoading({message: 'Aguarde...'});
            axios.delete('/api/mercado/delete'+id+'?api_token='+this.api_token).then((response) => {
                toastr.success(response.data.message);
                App.stopPageLoading();
                //location.reload();
            });
        },
    }
});
