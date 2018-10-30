@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.4/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.dataTables.min.css">
<link rel="stylesheet" href="https://editor.datatables.net/extensions/Editor/css/editor.dataTables.min.css">
@endsection
@section('content')
<div class="card">
  <div class="card-header">
  <h5>My Profile</h5>
  <span>Click on edit action then Enter for save</span>
  <div class="card-header-right">
    <i class="icofont icofont-rounded-down"></i>
    <i class="icofont icofont-refresh"></i>
    <i class="icofont icofont-close-circled"></i>
  </div>
  </div>
  <div class="card-block">
    <div class="table-responsive">
<table id="example" class="display" cellspacing="0" width="100%">
  <thead>
      <tr>
          <th></th>
          <th>First name</th>
          <th>Last name</th>
          <th>Position</th>
          <th>Office</th>
          <th width="18%">Start date</th>
          <th>Salary</th>
      </tr>
  </thead>
</table>
</div>
</div>
</div>
@endsection

@section('script')
<script>
var editor; // use a global for the submit and return data rendering in the examples

$(document).ready(function() {
  editor = new $.fn.dataTable.Editor( {
      ajax: "{{route('at')}}",
      table: "#example",
      fields: [ {
              label: "First name:",
              name: "first_name"
          }, {
              label: "Last name:",
              name: "last_name"
          }, {
              label: "Position:",
              name: "position"
          }, {
              label: "Office:",
              name: "office"
          }, {
              label: "Extension:",
              name: "extn"
          }, {
              label: "Start date:",
              name: "start_date",
              type: "datetime"
          }, {
              label: "Salary:",
              name: "salary"
          }
      ]
  } );

  // Activate an inline edit on click of a table cell
  $('#example').on( 'click', 'tbody td:not(:first-child)', function (e) {
      editor.inline( this );
  } );

  $('#example').DataTable( {
      dom: "Bfrtip",
      ajax: "../php/staff.php",
      order: [[ 1, 'asc' ]],
      columns: [
          {
              data: null,
              defaultContent: '',
              className: 'select-checkbox',
              orderable: false
          },
          { data: "first_name" },
          { data: "last_name" },
          { data: "position" },
          { data: "office" },
          { data: "start_date" },
          { data: "salary", render: $.fn.dataTable.render.number( ',', '.', 0, '$' ) }
      ],
      select: {
          style:    'os',
          selector: 'td:first-child'
      },
      buttons: [
          { extend: "create", editor: editor },
          { extend: "edit",   editor: editor },
          { extend: "remove", editor: editor }
      ]
  } );
} );
</script>
@endsection

@section('jslink')
<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
<script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>
@endsection
