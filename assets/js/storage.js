export default {
	endpointSettings: {

	},
	setEndpointSettings(endpointSettings) {
		this.endpointSettings = endpointSettings;
	},
	getTodos() {
		return fetch(this.endpointSettings['todoListUrl']).then(response => response.json());
	},
	addTodo(todo) {
		return fetch(this.endpointSettings['todoAddUrl'], {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json',
				'X-CSRF-Token': this.endpointSettings['csrfToken']
			},
			body: JSON.stringify(todo),
		}).then(response => response.json());
	},
	removeTodo(todo) {
		return fetch(this.endpointSettings['todoRemoveUrl'].replace(':id', todo.id), {
			method: 'DELETE',
			headers: {
				'X-CSRF-Token': this.endpointSettings['csrfToken']
			}
		}).then(response => response.json());
	}
}
