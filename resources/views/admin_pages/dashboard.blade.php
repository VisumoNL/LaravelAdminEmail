@extends('admin_pages/template')

@section('title', env("BEDRIJFSNAAM") . ' | Dashboard')


@section('body')
<div class="admin_container">
  @if(!Auth::user()->verified)
    <div class="info_box danger">
      <i class="fas fa-times info_close"></i>
      <h1>Email niet geverifieerd.</h1>
      <p>Je email is nog niet geverifieerd, doe dit snel!</p>
    </div>
  @endif

  @if(session('errorh1'))
    <div class="info_box danger">
      <i class="fas fa-times info_close"></i>
      <h1>{{session("errorh1")}}</h1>
      <p>{{session("errorp")}}</p>
    </div>
  @endif

  @if(session('successh1'))
    <div class="info_box success">
      <i class="fas fa-times info_close"></i>
      <h1>{{session("successh1")}}</h1>
      <p>{{session("successp")}}</p>
    </div>
  @endif

<div id="app">
  <div class="row">
    <div class="col-md-6">
        <todos></todos>
    </div>
  </div>
</div>


  <template id="todo-list">
    <div class="todos">
      <div class="todo_head">
        <p>Todo's</p>
      </div>
      <div class="todo_item" v-if="todos.length == 0">
        <p><i class="material-icons green">sentiment_very_satisfied</i> There are no todos left!</p>
      </div>
      <div class="todo_item" v-for="todo in todos" v-else>
        <p>@{{ todo.TodoName }}</p>
      </div>
        <form action="#" @submit.prevent="addTodo()">
          <div class="add_todo">
            <input v-model="todos.TodoName" type="text" name="add_todo" class="form-control">
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>
    </div>
  </template>

  <script>
    Vue.component('todos', {
      template: "#todo-list",

      data: function() {
          return {
            todos: []
          }
      },

      created: function() {
          this.getTodos();
      },

      methods: {
        getTodos: function() {
          $.getJSON("{{route('todo_api')}}", function(todos) {
            var list_todos = [];
            $.each(todos, function(id, todo) {
              if(todo.TodoUser == {{Auth::user()->id}}) {
                list_todos.push(todo);
              }
            });
            this.todos = list_todos;
          }.bind(this));

          setTimeout(this.getTodos, 1000);
        },

        addTodo: function() {
          this.$http.post('api/addtodo', this.todos);
          this.todos.TodoName = '';
          this.getTodos();
        }
      }
    });

    new Vue({
      el: "#app",
    });
  </script>
</div>
@endsection
