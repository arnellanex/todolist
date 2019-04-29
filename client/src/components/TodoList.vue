<template>
  <div>
    <create-todo></create-todo>
    <ul class="todo-list">
        <todo v-for="todo in todos" :todo="todo"></todo>
    </ul> 
  </div>
</template>

<script type = "text/javascript" >
import Todo from './Todo';
import CreateTodo from './CreateTodo';
import { mapGetters } from 'vuex';

export default {
  name: 'TodoList',
  components: {
    Todo,
    CreateTodo,
  },
  data () {
    return {}
  },
  mounted() {
    this.$store.dispatch("GET_TODOS");
  },
  methods: {

  },
  computed: {
    ...mapGetters(["todos"])
  }
};
</script>
<style>
  .todo-list{
    padding-left: 0;
  }
</style>