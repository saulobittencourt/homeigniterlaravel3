@layout('templates.default')

@section('conteudo')
    <div id="lista">
        <section class="scrollable" id="todos">
            <a data-toggle="modal" class="btn btn-default" href="#addTodo">What to do?</a>
            <br /><br />
            <footer class="footer b-t"> 
                <form class="m-t-sm"> 
                    <div class="input-group"> 
                        <input type="text" class="input-sm form-control input-s-sm" placeholder="Search"> 
                        <div class="input-group-btn"> 
                            <button class="btn btn-sm btn-white">
                                <i class="icon-search"></i>
                            </button> 
                        </div> 
                    </div> 
                </form> 
            </footer>

            <ul class="list-group m-b-none m-t-n-xxs list-group-alt list-group-lg">
                @foreach ($todos->results as $todo)
                        <li class="todo list-group-item animated bounceInLeft" data-toggle="class:show">
                            @if ($todo->status)
                                <small class="pull-right">{{$todo->datetime_br()}}</small>
                                <a data-toggle="modal" href="#myModal{{$todo->id}}">
                                    <span>{{ $todo->titulo }}</span>
                                </a> - <span class="badge bg-default">{{Auth::user()->username}}</span>
                            @else
                                <label data-todo-id='{{ $todo->id }}'>
                                    <input type="checkbox" name="todo_id" id="todo_id"/>
                                    <a data-toggle="modal" href="#myModal{{$todo->id}}">
                                        <span>{{ $todo->titulo }}</span>
                                    </a>
                                </label>
                            @endif
                        </li>
                @endforeach
            </ul>
        </section>
    </div>
    {{$todos->links()}}

    @include('todos.list_todo_form')

    @foreach ($todos->results as $todo)
        <div class="modal fade" id="myModal{{$todo->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h3>{{$todo->titulo}}</h3>
                </div>
                <div class="modal-body">
                  <p>{{$todo->description}}</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endforeach

@endsection

@section('scripts')
    <script language="javascript">
        $(document).ready( function() {
            $('li label input').on('change', function(){
                var todo_id = $(this).parent().data('todo-id');
                var li = $(this).parent().parent();
                //ajax post request
                $.post(
                    'checktodo',
                    {todo_id: todo_id},
                    function(data) {
                        //callback do ajax request
                        if (data.status == true) {
                             li.html("<span class='label label-success'>"+data.titulo+"</span>");
                        }
                    }
                );
            });
        });
    </script>
@endsection

@section('style')
    <style type="text/css">
        .footer{
            padding: 0;
        }
        .user{
            color: orange;
        }
        #todo_description{
            margin-top: 90px;  
        }
        .form-horizontal .control-label{
        }
        .col-sm-3 {
            width: 7%;
        }
        .pagination { 
            width:602px;
            margin:5px auto;
            padding:0px;
            text-align:center;
            color:#aaa;
        }
        .pagination a {
            padding:7px;
            text-decoration:none; 
            color:orange;
        }
        .pagination li.active a {
            font-weight:bold;
        }
        .pagination li:not(.disabled) a:hover {
            text-decoration: underline; 
        }

        .pagination li
        {
            display: inline;
            list-style-type: none;
        }

        .pagination ul
        {
            margin: 0px 0px;
            padding: 0 0px;
        }

        .pagination  li.disabled a:hover {
           pointer-events: none;
           cursor: default;
        }

        .pagination  li.disabled a {
            color: #B6B8BB;
        }
        #lista{
            width: 680px;
            height: 300px;
        }
    </style>
@endsection