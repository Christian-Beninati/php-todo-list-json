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
            console.log(this.newTask);
            
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