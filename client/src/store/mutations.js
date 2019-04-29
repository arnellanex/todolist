let mutations = {
    ADD_TODO(state, todo) {
        state.todos.unshift(todo);
        state.newTodo.title = '';
    },
    UPDATE_TODO(state, todo) {
        state.todos[state.todos.indexOf(todo)] = state.editedTodo;
        state.editedTodo = null;
    },
    EDIT_TODO(state, todo) {
        state.editedTodo = todo;
    },
    CANCEL_EDIT(state) {
        state.editedTodo = null;
    },
    GET_TODOS(state, todos) {
        state.todos = todos
    },
    DELETE_TODO(state, todo) {
        state.todos.splice(state.todos.indexOf(todo), 1)
    }
}
export default mutations