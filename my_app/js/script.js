// console.log('Vue OK', Vue);

const { createApp } = Vue;

const app = createApp ({
    data (){
        return {
            tasks: [],
            newTask: ''
        }
    },
    methods: {
        addTask(){
            // Preparo i dati
            const data = {'task' : this.newTask};

            // Preparo le configurazioni
            const config = {
                headers: { 'Content-Type': 'application/json'}
            }

            axios.post('http://localhost:8888/php-todo-list-json/api/tasks/' , data , config)
            .then(res => { 
                this.tasks = res.data;
                this.newTask = '';
            });
        }
    },
    created(){
        // Chiamata con Axios
        axios.get('http://localhost:8888/php-todo-list-json/api/tasks/')
        .then(res => {
            this.tasks = res.data;
        });
    }
})

app.mount('#app')