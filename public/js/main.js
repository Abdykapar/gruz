var app = new Vue({
    el: '#app1',
    data: {
        message: 'Hello Vue!',
        selected: 0,
        items: []
    },
    computed: {
        sortMethod: function (data) {
            if (this.selected > 0){
                for (i=0; i<data.length; i++){
                    if (data[i].id == selected){
                        this.items.add(data[i].id);
                    }
                }
            }
                else {
                    this.items = data;
                }
        }
    }
});