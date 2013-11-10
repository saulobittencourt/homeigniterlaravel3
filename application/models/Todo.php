<?php 

class Todo extends Eloquent 
{
	public function lista()
	{
		return $this->belongsTo('Lista','list_id');
	}

	public function datetime_br()
	{
		return date("d-m-Y",strtotime($this->created_at));
	}
}

?>