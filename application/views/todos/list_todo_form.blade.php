<div class="modal fade" id="addTodo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3>To - Do</h3>
        </div>
        <div class="modal-body">

            @if(isset($validacao))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Atenção</strong> $validacao
                </div>
            @endif

            <form class="form-horizontal" method="POST" action="{{URL::to_route('addtodo')}}"> 
                <div class="form-group" style="margin-right:-570px">
                    <label class="col-sm-3 control-label">Título</label> 
                    <div class="col-sm-4"> 
                        <input type="text" name="titulo" class="form-control" REQUIRED autofocus data-type="email"> 
                     </div> 
                </div> 
                <div class="form-group" style="margin-right:-570px"> 
                    <label class="col-sm-3 control-label">Priority</label> 
                    <div class="col-sm-4"> 
                        <select name="priority" class="form-control"> 
                            <option value="Soft">Soft</option> 
                            <option value="Medium">Medium</option> 
                            <option value="Urgent">Urgent</option> 
                        </select> 
                    </div> 
                </div> 
                <div class="form-group" style="margin-right:-570px"> 
                    <label class="col-sm-3 control-label">To-Do</label> 
                    <div class="col-sm-5"> 
                        <textarea name="description" placeholder="Descreva a tarefa..." rows="5" data-trigger="keyup" data-rangelength="[20,200]" class="form-control"></textarea> 
                    </div> 
                </div> 
                <div class="form-group" style="margin-left:77px"> 
                    <button type="submit" class="btn btn-default">Save</button> 
                </div> 
            </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->