let getters = {
    newTodo: state => {
        return state.newTodo
    },
    todos: state => {
        return state.todos
    },
    editedTodo: state => {
        return state.editedTodo
    }
}
export default getters