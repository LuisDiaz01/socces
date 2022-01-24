@extends('layouts.appDashboard')
@section('title','Club')
@section('nameTitleTemplate','Club')
@section('header_js')
<link rel="stylesheet" href="{{ asset('plugins/fullcalendar/fullcalendar.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/fullcalendar/fullcalendar.print.css') }}" media="print">   
@endsection
@section('js')

<script src="{{ asset('plugins/fullcalendar/dist/fullcalendar.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar/dist/locale/es.js') }}"></script>


<script>

  $(document).ready(function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var calendar = $('#calendar').fullCalendar({
      editable: true,
      events: APP_URL + "/Encounter",
      displayEventTime: true,
      editable: true,
      locale: 'es',
      eventRender: function (event, element, view) {
        if (event.allday === 'true') {
          event.allday = true;
        } else {
          event.allday = false;
        }
      },
      selectable: true,
      selectHelper: true,
      select: function (start, end, allDay) {
        var title = prompt('Titulo del Evento:');
        if (title) {
          var start = moment(start, 'DD.MM.YYYY').format('YYYY-MM-DD');
          var end = moment(start, 'DD.MM.YYYY').format('YYYY-MM-DD');
          $.ajax({
            type: "POST",
            url: APP_URL + "/Encounter",
            data: {
              '_token': $('input[name=_token]').val(),
              'title': title,
              'start': start,
              'end': start,
              'club_home_id':1,
              'club_visitor_id':1
            },
            success: function (data) {
              displayMessage("Se Agrego un nuevo Encuentro");
            }
          });
          calendar.fullCalendar('renderEvent',
          {
            title: title,
            start: start,
            end: end,
            allDay: allDay
          },
          true
          );
        }
        calendar.fullCalendar('unselect');
      },
      eventDrop: function (event, delta) {
        var start = moment(event.start, 'DD.MM.YYYY').format('YYYY-MM-DD');
        var end = moment(event.start, 'DD.MM.YYYY').format('YYYY-MM-DD');
        $.ajax({
          url: APP_URL + '/Encounter/'+ event.id,
          data: {
            '_token': $('input[name=_token]').val(),
            'title':event.title,
            'start':start,
            'end':end,
            'id':event.id
          },
          type: "PUT",
          success: function (response) {
            displayMessage("Encuentro Editado con Exito");
          }
        });
      },
      eventClick: function (event) {
        var deleteMsg = confirm("Seguro que desea eliminar este encuentro?");
        if (deleteMsg) {
          $.ajax({
            type: "DELETE",
            url: APP_URL + '/Encounter/'+event.id,
            data:{'_token': $('input[name=_token]').val(),},
            success: function (response) {
              if(parseInt(response) > 0) {
                $('#calendar').fullCalendar('removeEvents', event.id);
                displayMessage("Encuentro Eliminado con Exito");
              }
            }
          });
        }
      }
    });
  });
  function displayMessage(message) {
    swal({
        title: "Exito!",
        text: message,
        icon: "success",
    })
  }

</script>
@endsection
@section('headerContent')
<div class="response"></div>
@endsection
@section('content')
<div class="row">
  <div class="col-md-3">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Lista de Encuentros</h4>
      </div>
      <div class="card-body">
        <!-- the events -->
        <div id="external-events">
          @foreach($data as $item)
            <div class="external-event bg-success">{{$item->title}}</div>
          @endforeach
          <div class="checkbox">
            <label for="drop-remove">
              <input type="checkbox" id="drop-remove">
              <b> ELIMINAR UN ENCUENTRO </b>
            </label>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /. box -->
  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="card card-primary">
      <div class="card-body p-0">
        <!-- THE CALENDAR -->
        <div id="calendar"></div>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /. box -->
  </div>
  <!-- /.col -->
</div>
@endsection