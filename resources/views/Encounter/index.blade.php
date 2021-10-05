@extends('layouts.appDashboard')
@section('title','Club')
@section('nameTitleTemplate','Club')
@section('modales')
{{-- @include('layouts.modales.Club.modalCreateEncounter') --}}
@endsection
@section('js')
<script>
 $(function () {

    /* initialize the external events
    -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
    -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
    m    = date.getMonth(),
    y    = date.getFullYear()
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : ''
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
      monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
      dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
      dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],

      //Random default events
      events    : { url: APP_URL+"/get_encounter"},
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      
      drop      : function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }

      }
    })

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      ini_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
  });


$('#btnEdit').click(function(){
  var id=$('#modalEditid');
  $.ajax({
    type: "PUT",
    url: APP_URL+"/Club/"+id.val(),
    dataType: "json",
    data:{
      '_token': $('input[name=_token]').val(),
      'name':$("#modalEditname").val(),
      'rif':$("#modalEditrif").val(),
      'address':$("#modalEditaddress").val(),
      'mision':$("#modalEditmision").val(),
      'history':$("#modalEdithistory").val(),
      'stadium_id':$("#modalEditstadium_id").val(),
      'email':$("#modalEditemail").val(),
      'phone_number': $("#modalEditphone_number").val()
    },
    success: function(response){
      location.reload(true);
    }
  });
});

</script>
@endsection
@section('headerContent')
<div class="container-fluid">
  <div class="row">
    <div class="col-xl-3 col-lg-3 col-md-6">
      <div class="card card-stats">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <span class="h5 font-weight-bold">Crear Encuentro</span>
            </div>
            <div class="col-auto">
              <a href="#" data-target='#createEncounter' data-toggle='modal' title data-original-title="Agregar Encuentro" class='text-white'>
                <div class="btn-icons btn-rounded btn bg-danger text-white shadow">
                  <i class="fa fa-plus text-white"></i>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
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
          <div class="external-event bg-success">Lunch</div>
          <div class="external-event bg-warning">Go home</div>
          <div class="external-event bg-info">Do homework</div>
          <div class="external-event bg-primary">Work on UI design</div>
          <div class="external-event bg-danger">Sleep tight</div>
          <div class="checkbox">
            <label for="drop-remove">
              <input type="checkbox" id="drop-remove">
              remove after drop
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