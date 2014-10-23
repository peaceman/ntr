<?php namespace App;
use Illuminate\Database\Eloquent\Model;

class Event extends Model {
	protected $table = 'events';
	protected $fillable = ['started_at', 'ended_at', 'description'];

	public function eventLabel()
	{
		return $this->belongsTo('App\EventLabel');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
