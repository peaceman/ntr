<?php namespace App;
use Illuminate\Database\Eloquent\Model;
use League\Period\Period;

class Event extends Model {
	protected $table = 'events';
	protected $fillable = ['started_at', 'ended_at', 'description'];
	protected $dates = ['started_at', 'ended_at'];

	public function eventLabel()
	{
		return $this->belongsTo('App\EventLabel');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function getDuration()
	{
		$period = new Period($this->started_at, $this->ended_at);
		return $period->getDuration(true);
	}

	public function hasEnded()
	{
		return !is_null($this->ended_at);
	}
}
