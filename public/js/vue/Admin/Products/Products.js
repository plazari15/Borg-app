new Vue({
    el: '#app',
    delimiters : ['[[', ']]'], //Versão 2.0 do VUE
    data: {
        api_token : api_token,
        results : []
    },
    mounted(){
        this.GetProducts();
    },
    methods : {
        GetProducts(){
            axios.get('/api/products/?api_token='+this.api_token).then((response) => {
               this.results = response.data;
            });
        },
        GenerateLink(id){
            return url_edit + id;
        },
        DeleteProduct(id){
            axios.delete('/api/products/'+id+'?api_token='+this.api_token).then((response) => {
                toastr.success(response.data.message);
                this.GetProducts();
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