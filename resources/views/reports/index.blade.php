@extends('layouts.default')
@section('content')
<div class="row">
    <div class="col-md-9 well">
        <form class="form-horizontal">
            <div class="row">
                <div class="col-xs-5">
                    <div class="input-prepend input-group">
                        <span class="add-on input-group-addon">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        </span>
                        <input type="text" name="report-range" id="report-range" class="form-control" />
                    </div>
                </div>
                <div class="col-xs-4">
                    <select class="form-control" name="event_label_id" placeholder="Select a label">
                        <option value=""></option>
                        <option value="foo">foo</option>
                        <option value="bar">bar</option>
                    </select>
                </div>
                <div class="col-xs-3">
                    <input value="Submit" type="submit" class="btn btn-primary"/>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#report-range').daterangepicker({
            format: 'YYYY-MM-DD',
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [
                    moment().subtract(1, 'month').startOf('month'),
                    moment().subtract(1, 'month').endOf('month')
                ]
            }
        });

        var reportRange = $('#report-range').data('daterangepicker');
        reportRange.setStartDate(moment().subtract(29, 'days'));
        reportRange.setEndDate(moment());

        $("[name='event_label_id']").selectize();
    });
</script>
@stop
