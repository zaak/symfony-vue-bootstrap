<template>
    <li class="clearfix">
        <span class="todo-text">{{ todo.text }}</span><button type="button" class="btn btn-sm btn-primary btn-remove-todo" v-on:click="onRemoveButtonClick">Remove</button>
    </li>
</template>

<script>
	export default {
		name: 'TodoItem',
        props: ['todo'],
        methods: {
			onRemoveButtonClick() {
				this.$emit('todo-removed', this.todo);
            }
        }
	};
</script>
