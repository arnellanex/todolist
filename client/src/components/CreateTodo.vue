<template>
  <div class='ui basic content center aligned segment'>
    <button class='ui basic button icon' @click="openForm" v-show="!isCreating">
      <i class='plus icon'></i>
    </button>
    <div class='ui centered card' v-show="isCreating">
      <div class='content'>
        <div class='ui form'>
          <div class='field'>
            <label>Title</label>
            <input v-model="newTodo.title" type='text' ref='title' defaultValue="">
          </div>
          <div class='ui two button attached buttons'>
            <button class='ui basic blue button' @click="addTodo()">
              Create
            </button>
            <button class='ui basic red button' @click="closeForm">
              Cancel
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  data() {
    return {
      isCreating: false,
    };
  },
  methods: {
    openForm() {
      this.isCreating = true;
    },
    closeForm() {
      this.isCreating = false;
    },
    addTodo() {
      this.$store.dispatch("ADD_TODO", this.newTodo);
    },
  },
  computed: {
    ...mapGetters(["newTodo"])
  }
};
</script>