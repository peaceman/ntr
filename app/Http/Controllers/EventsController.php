<?php namespace App\Http\Controllers;

use App\Event;
use App\EventLabel;
use App\Http\Requests\StartEventRequest;
use App\Http\TableListings\EventTableListing;
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
		$recentEvents = $this->user->events()
			->orderBy('started_at', 'desc')
			->get();

		$tableListing = new EventTableListing();
		$tableListing->query->where('events.user_id', $this->user->id);
		$tableListing->prepareList();

		return view('events.index', compact('eventLabels', 'recentEvents', 'tableListing'));
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
		$eventLabelId = $request->get('event_label_id');

		if (is_numeric($eventLabelId)) {
			$eventLabel = $this->user->eventLabels()
				->findOrFail($eventLabelId);
		} else {
			$eventLabel = EventLabel::firstOrNew([
				'user_id' => $this->user->id,
				'name' => $eventLabelId,
			]);

			$eventLabel->user()->associate($this->user);
			$eventLabel->save();
		}


		$event = new Event();
		$event->user()->associate($this->user);
		$event->eventLabel()->associate($eventLabel);
		$event->started_at = Carbon::now();
		$event->save();

		return \Redirect::back();
	}

	public function stop($id)
	{
		$event = $this->user->events()
			->findOrFail($id);

		$event->ended_at = Carbon::now();
		$event->save();

		return \Redirect::back();
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
		/** @var Event $event */
		$event = $this->user->events()
			->findOrFail($id);

		$event->delete();
		return \Redirect::back();
	}

}
