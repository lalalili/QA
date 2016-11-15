(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

Vue.component('tasks', {
    template: '#tasks-template',

    props: {
        list: {},
        newTask: {}
        // sum: {
        //     default: 1
        // }
    },

    data: function data() {
        return {
            sum: 0
        };
    },

    created: function created() {
        // this.list = JSON.parse(this.list);
        this.fetchTaskList();
    },

    methods: {
        fetchTaskList: function fetchTaskList() {
            $.getJSON('api/tasks', function (tasks) {
                this.list = tasks;
            }.bind(this));
        },

        deleteTask: function deleteTask(task) {
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
        types: [{ type_id: 1, type_name: 'Summary' }, { type_id: 2, type_name: 'Status' }, { type_id: 3, type_name: 'Effectiveness' }]
    },

    methods: {
        saveTask: function saveTask() {
            var saveTask = this.newTask.trim();
            console.log(this.selectType + '_' + saveTask);
        },

        updateCount: function updateCount() {
            this.sum += 1;
        }
    }
});

},{}]},{},[1]);

//# sourceMappingURL=task.js.map
