<?php namespace App\Http\TableListings;

use App\Event;
use Nerweb\Tblist\BaseTblist;

class EventTableListing extends BaseTblist {
	public $table = 'events';
	public $columns = [
		'id' => [
			'label' => '#',
			'sortable' => true,
			'table_column' => 'events.id',
		],
		'name' => [
			'label' => 'Label',
			'sortable' => true,
			'table_column' => 'event_labels.name',
		],
		'started_at' => [
			'label' => 'Started at',
			'sortable' => true,
			'table_column' => 'events.started_at',
		],
		'ended_at' => [
			'label' => 'Ended at',
			'sortable' => true,
			'table_column' => 'events.ended_at',
		],
		'duration' => [
			'label' => 'Duration',
			'sortable' => false,
		],
	];
	public $columnsToSelect = [
		'events.*',
		'event_labels.name'
	];
	public $columnOrders = [
		'started_at' => 'desc',
	];
	public $perPage = 10;

	public function __construct() {
		parent::__construct();
//		$this->addActionColumn();

		$this->query = Event::query()
			->join('event_labels', 'events.event_label_id', '=', 'event_labels.id');
	}

	protected function colSetAction($row) {
		?>
		moar actions!!
		<?php
	}

	protected function colSetEndedAt(Event $event) {
		echo view('events.col-ended-at', ['event' => $event]);
	}

	protected function colSetDuration(Event $event) {
		echo view('events.col-duration', ['event' => $event]);
	}
}
