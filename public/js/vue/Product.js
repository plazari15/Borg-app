new Vue({
    el: '#app',
    delimiters : ['[[', ']]'], //Versão 2.0 do VUE
    data: {
        api_token : api_token,
        fornecedor : '',
        results : []
    },
    mounted(){
        //
    },
    methods : {
        GetItens(fornecedor){
            this.results = [];
            App.startPageLoading({message: 'Aguarde...'});
            axios.get('/api/item/'+fornecedor+'?api_token='+this.api_token).then((response) => {
                App.stopPageLoading();
               this.results = response.data;
            });
        },
    }
});