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

	protected function colSetEndedAt($row) {
		if (is_null($row->ended_at)) {
			?>
			<form action="<?= route('events.stop', $row->id) ?>" method="POST">
				<?= \Form::token() ?>
				<input type="submit" value="Stop" class="btn btn-default btn-xs"/>
			</form>
			<?php
		} else {
			echo $row->ended_at;
		}
	}
}
