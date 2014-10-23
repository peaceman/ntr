@extends('layouts/default')
@section('content')
<div class="page-header">
	<h3>Registration</h3>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<form class="form-horizontal">
				<div class="form-group">
					<label for="email" class="col-md-2 control-label">Email</label>
					<div class="col-md-10">
						<input type="email" name="email" class="form-control">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@stop
