new Vue({
    el: '#app',
    delimiters : ['[[', ']]'], //Versão 2.0 do VUE
    data: {
        api_token : api_token,
        results : []
    },
    mounted(){
        this.GetOrders();
    },
    methods : {
        GetOrders(){
            axios.get('/api/orders/?api_token='+this.api_token).then((response) => {
               this.results = response.data;
            });
        },
        GenerateLink(id){
            return url_edit + id;
        },
        UpdateStatus(id){
            $('#status').show();
            axios.put('/api/orders/'+id+'?api_token='+this.api_token, {"status" : status}).then((response) => {
                toastr.success(response.data.message);
            $('#status').hide();
                this.GetOrders();
        });
        },
        DeleteProduct(id){
            axios.delete('/api/orders/'+id+'?api_token='+this.api_token).then((response) => {
                toastr.success(response.data.message);
                this.GetOrders();
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