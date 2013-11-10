<?php
 
class Todo_Controller extends Base_Controller {
    
    public $restful = true;

    public function post_add() {
    	$regras  = array(
                'titulo' => 'required',
                'priority' => 'required',
                'description' => 'required'
                );
    	$validacao = Validator::make(Input::all(),$regras);

    	if ($validacao->fails())
    	{
    		return Redirect::to_route('todos')->withErrors($validacao);
    	}
    	else
    	{
    		$task = new Todo;
    		$task->titulo = Input::get('titulo');
            $task->priority = Input::get('priority');
            $task->description = Input::get('description');
    		$task->status = 0;
    		$task->save();

    		return Redirect::to_route('todos');
    	}
    }

    public function get_listar() {
        
        $todos = Todo::paginate(3);

    	return View::make('todos.list_todos')->with('todos', $todos);
	}

	public function post_check() {
        //verifica se a request é ajax
        if (Request::ajax()) {
            //criando regras de validação
            $regras = array('task_id' => 'required|integer');

            $validacao = Validator::make(Input::all(), $regras);

            if ($validacao->fails()) {
                return Response::json( array("status" => FALSE) );
            }
            else {
                //tenta encontrar e atualizar a task
                try {
                    $task = Todo::findOrFail(Input::get('task_id'));
                    $task->status = TRUE;
                    $task->save();

                    return Response::json( array("status" => TRUE, "titulo" => $task->titulo) );
                }
                //caso não tenha conseguido encontrar a task
                catch(Exception $e) {
                    return Response::json( array("status" => FALSE, "mensagem" => $e->getMessage()) );
                }
            }
        }
    }
}