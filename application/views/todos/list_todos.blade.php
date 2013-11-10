@layout('templates.default')

@section('conteudo')
    <section class="scrollable" id="todos">
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
                            <small class="pull-right">{{ $todo->created_at }}</small>
                            <strong class="user">{{Auth::user()->name}}</strong>
                            <a data-toggle="modal" href="#myModal{{$todo->id}}">
                                <span>{{ $todo->titulo }}</span>
                            </a>
                        @else
                            <label data-todo-id='{{ $todo->id }}'>
                                <input type="checkbox" />
                                <a data-toggle="modal" href="#myModal{{$todo->id}}">
                                    <span>{{ $todo->titulo }}</span>
                                </a>
                            </label>
                        @endif
                    </li>
            @endforeach
        </ul>
    </section>
    {{$todos->links()}}
    <section id="todo_description" class="animated fadeInDown">
        
        @if(isset($validacao))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Atenção</strong> $validacao
            </div>
        @endif

        <form class="form-horizontal" method="POST" action="{{URL::to_route('addtodo')}}"> 
            <div class="form-group"> 
                <label class="col-sm-3 control-label">Título</label> 
                <div class="col-sm-4"> 
                    <input type="text" name="titulo" class="bg-focus form-control" REQUIRED autofocus data-type="email"> 
                 </div> 
            </div> 
            <div class="form-group"> 
                <label class="col-sm-3 control-label">Priority</label> 
                <div class="col-sm-4"> 
                    <select name="priority" class="form-control"> 
                        <option value="Soft">Soft</option> 
                        <option value="Medium">Medium</option> 
                        <option value="Urgent">Urgent</option> 
                    </select> 
                </div> 
            </div> 
            <div class="form-group"> 
                <label class="col-sm-3 control-label">To-Do</label> 
                <div class="col-sm-5"> 
                    <textarea name="description" placeholder="Descreva a tarefa..." rows="5" data-trigger="keyup" data-rangelength="[20,200]" class="form-control parsley-validated"></textarea> 
                </div> 
            </div> 
            <div class="form-group" style="margin-left:70px"> 
                <button type="submit" class="btn btn-default">Save</button> 
            </div> 
        </form>
    </section>

    @foreach ($todos->results as $todo)
        <div class="modal" id="myModal{{$todo->id}}">
            <div class="modal-header">
                <a class="close" data-dismiss="modal">&times;</a>
                <h3>{{$todo->titulo}}</h3>
            </div>
            <div class="modal-body">
                <p>{{$todo->description}}</p>
            </div>
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn btn-default">Close</a>
            </div>
        </div>
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
                    {{str_replace('http://localhost',null,URL::to_route('checktodo'))}},
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
        #todos{
            width: 71%;
        }
        .footer{
            padding: 0;
        }
        .user{
            color: orange;
        }
        #todo_description{
            margin-top: 170px;  
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
    </style>
@endsection