<template>
  <div>
    <create-todo @add-todo="addTodo"></create-todo>
    <ul>
        <todo @delete-todo="deleteTodo" @complete-todo="completeTodo" v-for="todo in todos" :todo="todo"></todo>
    </ul> 
  </div>
</template>

<script type = "text/javascript" >
import Todo from './Todo';
import CreateTodo from './CreateTodo';

export default {
  name: 'TodoList',
  components: {
    Todo,
    CreateTodo,
  },
  data () {
    return {
      todos: [
        {
          title: 'Todo A',
          completed: false
        },
        {
          title: 'Todo B',
          completed: false
        },
        {
          title: 'Todo C',
          completed: false
        },
        {
          title: 'Todo D',
          completed: false
        },
        {
          title: 'Todo E',
          completed: false
        },
      ]
    }
  },
  methods: {
    deleteTodo(todo) {
      const todoIndex = this.todos.indexOf(todo);
      this.todos.splice(todoIndex, 1);
    },
    addTodo(todo) {
      this.todos.push(todo);
    },
    completeTodo(todo) {
      const todoIndex = this.todos.indexOf(todo);
      this.todos[todoIndex].completed = true;
    }
  }
};
</script>
<style>
</style>