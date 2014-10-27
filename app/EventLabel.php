<?php namespace App;
use Illuminate\Database\Eloquent\Model;

class EventLabel extends Model
{
	protected $table = 'event_labels';
	protected $fillable = ['name'];

	public function events()
	{
		return $this->hasMany('App\Event');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
