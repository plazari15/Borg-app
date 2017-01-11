new Vue({
    el: '#app',
    delimiters : ['[[', ']]'], //Versão 2.0 do VUE
    data: {
        api_token : api_token,
        results : []
    },
    mounted(){
        this.GetItens();
    },
    methods : {
        GetItens(){
            axios.get('/api/myitens/?api_token='+this.api_token).then((response) => {
               this.results = response.data;
            });
        },
        GenerateLink(id){
            return url_edit + id;
        },
        DeleteItens(id){
            axios.delete('/api/myitens/'+id+'?api_token='+this.api_token).then((response) => {
                toastr.success(response.data.message);
                this.GetItens();
            });
        },
    }
});

toastr.options = {
    "closeButton": true,
    "debug": false,
    "positionClass": "toast-top-right",
    "onclick": null,
    "showDuration": "1000",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}