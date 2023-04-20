const { createApp } = Vue

createApp({
    data() {
        return {
            todoList: [],
            newTodo: ''
           
        };
    },
    methods: {
        readList() {
            axios.get('server.php')
            .then(response => {
                this.todoList = response.data;
            });
        },
        addTodo() {
            const data = {
                newTodo: this.newTodo
            };
            axios.post('server.php', data,
            {
                headers: {'Content-Type': 'multipart/form-data'},
            }
            ).then(response => {
                this.todoList = response.data;
                this.newTodo = '';
            });
        },
        toggleTextDone(index) {
            const data = {
              toggleIndex: index,
            };
      
            axios.post("server.php", data, {
                headers: {'Content-Type' : 'multipart/form-data'},
            }).then((resp) => {
                this.todoList = resp.data;
            });
        },
        deleteTask(index) {
            const data = {
              deleteIndex: index,
            };
        
            axios.post("server.php", data, {
                headers: {'Content-Type' : 'multipart/form-data'},
            }).then((resp) => {
                this.todoList = resp.data;
            });
        }
    },
    mounted() {
        this.readList();
    }
  
}).mount('#app')