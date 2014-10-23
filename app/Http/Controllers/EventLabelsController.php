<?php namespace App\Http\Controllers;

use App\Http\Requests\CreateEventLabelRequest;
use Illuminate\Contracts\Auth\User;
use Illuminate\Routing\Controller;

class EventLabelsController extends Controller {

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
		$eventLabels = $this->user->eventLabels()->get();
		return view('event-labels.index', compact('eventLabels'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('event-labels.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \App\Http\Requests\CreateEventLabelRequest $request
	 * @return Response
	 */
	public function store(CreateEventLabelRequest $request)
	{
		$eventLabel = $this->user->eventLabels()->create($request->all());
		return redirect(route('event-labels.index'));
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
