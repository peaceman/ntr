<?php namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\StartEventRequest;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\User;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;

class EventsController extends Controller {
	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$eventLabels = $this->user->eventLabels()->lists('name', 'id');
		return view('events.index', compact('eventLabels'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StartEventRequest $request)
	{
		$eventLabel = $this->user->eventLabels()
			->findOrFail($request->get('event_label_id'));

		$event = new Event();
		$event->user()->associate($this->user);
		$event->eventLabel()->associate($eventLabel);
		$event->started_at = Carbon::now();
		$event->save();

		return redirect(route('events.index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
