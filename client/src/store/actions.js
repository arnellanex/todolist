import axios from "axios";

let actions = {
    ADD_TODO({ commit }, todo) {
        axios.post('/api/v1/todo', todo).then(res => {
            if (res.data){
                commit('ADD_TODO', res.data);
                console.log("added!")
            }
        }).catch(err => {
            console.log(err)
        })
    },
    UPDATE_TODO({ commit }, todo) {
        axios.put(`/api/v1/todo/${todo.id}`, todo).then(res => {
            if (res.data){
                commit('UPDATE_TODO', todo);
                console.log('updated')
            }
        }).catch(err => {
            console.log(err)
        })
    },
    DELETE_TODO({ commit }, todo) {
        axios.delete(`/api/v1/todo/${todo.id}`)
            .then(res => {
                if (res.data){
                    commit('DELETE_TODO', todo)
                    console.log('deleted')
                }
            }).catch(err => {
                console.log(err)
            })
    },
    GET_TODOS({ commit }) {
        axios.get('/api/v1/todos')
            .then(res => {
                {
                    console.log(res.data)
                    commit('GET_TODOS', res.data)
                }
            }).catch(err => {
                console.log(err)
            })
    }
}
export default actions