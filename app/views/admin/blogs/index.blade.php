@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ $title }}} :: @parent
@stop

@section('keywords')Blogs administration @stop
@section('author')Laravel 4 Bootstrap Starter SIte @stop
@section('description')Blogs administration index @stop

{{-- Content --}}
@section('content')
	<div class="page-header">
		<h3>
			{{{ $title }}}

			<div class="pull-right">
				<a href="{{{ URL::to('admin/blogs/create') }}}" class="btn btn-small btn-info iframe"><span class="glyphicon glyphicon-plus-sign"></span> Create</a>
			</div>
		</h3>
	</div>

	<table id="blogs" class="table table-striped table-hover">
		<thead>
			<tr>
				<th class="col-md-4">{{{ Lang::get('admin/blogs/table.title') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/blogs/table.comments') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/blogs/table.created_at') }}}</th>
				<th class="col-md-2">{{{ Lang::get('table.actions') }}}</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
@stop

{{-- Scripts --}}
@section('scripts')
	<script type="text/javascript">
		var oTable;
		jQuery(document).ready(function() {
         $('body').css('cursor', 'wait');
			oTable = jQuery('#blogs').dataTable( {
				  "bProcessing": true,
              "bLengthChange": true,
              //"bFilter": true,
              //"bStateSave": true,
              "bInfo": true,
		        //"bServerSide": true,
              "bJQueryUI": true,
              "aaSorting": [[ 1, "asc" ]],
		        "sAjaxSource": "{{ URL::to('admin/blogs/data') }}",
/*
		        "fnDrawCallback": function ( oSettings ) {
	           		$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
	     		  },
*/
              "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                    // if ( aData.eventState == 41 )
                     //$('#blogs').effect("pulsate", { times: 2 }, 250);
                     //$('body').css('cursor', 'progress');
              },
              "initComplete": function () {
                     $('body').css('cursor', 'default');
                     //console.log(oTable);
              }
			});
        
         //console.log(oTable);
         $('body').css('cursor', 'default');
         //$('#blogs').effect("pulsate", { times: 2 }, 250);
         // oTable.fnReloadAjax();
		});
	</script>
@stop

