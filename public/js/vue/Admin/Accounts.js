new Vue({
    el: '#app',
    delimiters : ['[[', ']]'], //Versão 2.0 do VUE
    data: {
        api_token : api_token,
        results : []
    },
    mounted(){
        this.GetUsers();
    },
    methods : {
        GetUsers(){
            axios.get('/api/users/'+status+'/?api_token='+this.api_token).then((response) => {
               this.results = response.data;
            });
        },
        GenerateLink(id){
            return url_edit + id;
        },
        DeleteUser(id){
            axios.delete('/api/users/'+id+'?api_token='+this.api_token).then((response) => {
                toastr.success(response.data.message);
                this.GetUsers();
            });
        },
        UserStatus(status, id){
            axios.put('/api/users/status/'+id+'?api_token='+this.api_token+'&code='+status).then((response) => {
                toastr.success(response.data.message);
                this.GetUsers();
            });
        }
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