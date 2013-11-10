<?php 

class Todo extends Eloquent 
{
	public function lista()
	{
		return $this->belongsTo('Lista','list_id');
	}
}

?>