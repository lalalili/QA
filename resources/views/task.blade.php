@extends('app')

@section('content')
    <div id="wrapper" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
        <!-- Navigation -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Back Office</h3>
                    <pre>@{{ $data | json  }}</pre>
                    <br>
                    <form @submit.prevent="saveTask">
                        <span class="error" v-show="!newTask || !selectType">
                        You must enter a message
                        </span>
                        <br>

                        <select v-model="selectType">
                            <option v-for="type in types" value="@{{ type.type_id }}">@{{ type.type_name }}</option>
                        </select>
                        <br>

                        <input type="text" v-model="newTask">
                        <br>
                        <button type="submit" v-show="newTask && selectType">Save</button>
                    </form>

                    <br>
                </div>
            </div>
            <tasks list="@{{ newTask }}"></tasks>
            <template id="tasks-template">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="list-group">
                            <li class="list-group-item" v-for="task in list" track-by="$index">
                                @{{ task.task }}
                                <strong @click="deleteTask(task)">X</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </template>

            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
@endsection