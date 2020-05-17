<template>
    <li>
        {{ todo.text }} <button v-on:click="onRemoveButtonClick">Remove</button>
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
