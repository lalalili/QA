<template lang='jade'>
    .wrapper
      alert()
        | Hello Vue

      alert(type='error')
        | Danger

      alert(type='success')
        | Login Success
    .my
      p {{ message }}
      input(v-model="message" v-on:keyup.enter="addTodos")
      li(v-for="todo in todos")
        span {{ todo.list }}
        button(v-on:click="removeTodos($index)")
          | x
</template>
<style lang="stylus" scoped>
    .my
      input
        margin-bottom: 10px;
      li
        margin-bottom: 10px;
        background: #c7e0f2;
        color: #0082d5;
        border: 1px solid #0082d5;
</style>
<script>
    import Alert from '../components/alert.vue'
    export default {
//        el() {
//            return '#app'
//        },
        el: '#app',
//        data() {
//            return ''
//        },
        data: {
            message: '2',
            todos: [
                {list: '1'},
                {list: '2'},
                {list: '3'}
            ]
        },
        computed: {},
        ready() {},
        methods: {
            addTodos: function () {
                var newList = this.message.trim()
                if (newList) {
                    this.todos.push({list: newList})
                    this.message = ''
                }
            },
            removeTodos: function (index) {
                this.todos.splice(index, 1)
            }
        },
        events: {},
        components: {
            Alert
        }
    }
</script>