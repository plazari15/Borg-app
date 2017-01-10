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
            axios.get('/api/users/all/?api_token='+this.api_token).then((response) => {
               this.results = response.data;
            });
        },
        GenerateLink(id){
            return url_edit + id;
        }
    }
});
