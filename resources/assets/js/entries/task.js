Vue.component('tasks', {
    template: '#tasks-template',

    props: {
        list: {},
        newTask: {}
        // sum: {
        //     default: 1
        // }
    },

    data: function () {
        return {
            sum: 0
        }
    },

    created: function () {
        // this.list = JSON.parse(this.list);
        this.fetchTaskList();
    },

    methods: {
        fetchTaskList: function () {
            $.getJSON('api/tasks', function (tasks) {
                this.list = tasks;
            }.bind(this))
        },

        deleteTask: function (task) {
            this.list.$remove(task);
        }
    }
});


new Vue({
    el: 'body',
    data: {
        list: [],
        newTask: '',
        selectType: '',
        sum: 0,
        types: [
            {type_id: 1, type_name: 'Summary'},
            {type_id: 2, type_name: 'Status'},
            {type_id: 3, type_name: 'Effectiveness'},
        ]
    },
    
    methods: {
        saveTask: function () {
            var saveTask = this.newTask.trim();
            console.log(this.selectType + '_' + saveTask);
        },
        

        updateCount: function () {
            this.sum += 1;
        }
    }
});