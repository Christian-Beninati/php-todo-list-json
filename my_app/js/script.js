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
                headers: { 'Content-Type': 'x-www-form-urlencoded'}
            }

            axios.post('http://localhost:8888/php-todo-list-json/api/tasks/' , data , config)
            .then(res => { console.log('dato inviato, ok') });
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