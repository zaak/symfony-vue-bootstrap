<template>
    <div class="container">
        <h1>Todo</h1>
        <ol>
            <TodoItem
                    v-for="todo in todos"
                    v-bind:todo="todo"
                    v-bind:key="todo.id"
                    v-on:todo-removed="removeTodo"
            ></TodoItem>
            <TodoItemForm v-on:todo-added="addTodo"></TodoItemForm>
        </ol>
    </div>
</template>

<script>
    import TodoItem from "./TodoItem";
    import TodoItemForm from "./TodoItemForm";
    import storage from "./storage";

    export default {
		name: 'App',
		components: {TodoItemForm, TodoItem},
		data() {
			return {
                todos: []
			};
        },
        beforeMount() {
			storage.setEndpointSettings(document.getElementById( 'app' ).dataset);
		},
		mounted() {
			storage.getTodos().then(todos => {
				this.todos = todos;
            })
		},
        methods: {
			addTodo(todo) {
				this.todos.push(todo);
				storage.addTodo(todo).then(data => {
					todo.id = data.id;
                });
            },
			removeTodo(todo) {
				removeArrayItem(this.todos, todo);
				storage.removeTodo(todo);
			}
        }
	};

    function removeArrayItem(arr, value) {
		var index = arr.indexOf(value);
		if (index > -1) {
			arr.splice(index, 1);
		}
		return arr;
	}
</script>
