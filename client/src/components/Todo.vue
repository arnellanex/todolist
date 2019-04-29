<template>
  <div class='ui centered card'>
    <div class="content" v-show="!isEditing">
      <div class='header'>
        {{ todo.title }}
      </div>
      <div class='extra content'>
        <span class='right floated edit icon' @click="showForm">
            <i class='edit icon'></i>
          </span>
      </div>
      <span class='right floated trash icon' @click="deleteTodo(todo)">
          <i class='trash icon'></i>
          </span>
      </div>
    <div class="content" v-show="isEditing">
      <div class='ui form'>
        <div class='field'>
          <label>Title</label>
          <input type='text' v-model="todo.title">
        </div>
        <div class='ui two button attached buttons'>
          <button class='ui basic blue button' @click="updateTodo(todo)">
              Update
          </button>
          <button class='ui basic red button' @click="cancelEdit">
              Cancel
          </button>
        </div>
      </div>
    </div>
    <div class='ui bottom attached green basic button' v-show="!isEditing &&todo.completed" disabled>
      Completed
    </div>
    <div class='ui bottom attached red basic button' @click="completeTodo(todo)" v-show="!isEditing && !todo.completed">
      Pending
    </div>
  </div>
</template>

<script type="text/javascript">
  import { mapGetters } from "vuex";

  export default {
    props: ['todo'],
    data() {
      return {
        isEditing: false,
      }
    },
    methods: {
      showForm() {
        this.isEditing = true;
      },
      editTodo(todo) {
        this.$store.commit("EDIT_TODO", todo);
        this.isEditing = false;
      },
      cancelEdit(todo){
        this.$store.commit("CANCEL_EDIT", todo);
        this.isEditing = false;
      },
      updateTodo(todo){
        this.$store.dispatch("UPDATE_TODO", todo);
        this.isEditing = false;
      },
      deleteTodo(todo){
        this.$store.dispatch("DELETE_TODO", todo);
      },
      completeTodo(todo){
        todo.completed = true;
        this.$store.dispatch("UPDATE_TODO", todo);
      }
    },
    computed: {
      ...mapGetters(['editedTodo', 'todos'])
    }
  };
</script>