<?php namespace App\Http\Controllers;
use Illuminate\Contracts\Auth\User;
use Illuminate\Routing\Controller;

class ReportsController extends Controller {
	/**
	 * @var \App\User
	 */
	protected $user;

	/**
	 * @param \Illuminate\Contracts\Auth\User $user
	 */
	public function __construct(User $user) {
		$this->user = $user;
	}

	public function index()
	{
		$eventLabels = $this->user->eventLabels()->lists('name', 'id');
		return view('reports.index', compact('eventLabels'));
	}
}
