<template>
    <li>
        <input
            type="text"
            v-on:keyup.enter="onEnter"
            v-model="text"
            class="form-control"
        />
    </li>
</template>

<script>
	export default {
		name: 'TodoItemForm',
        data() {
		    return {
		    	text: null
		    }
        },
        methods: {
			onEnter() {
                this.$emit('todo-added', {text: this.text});
                this.text = null;
			}
        }
	};
</script>
