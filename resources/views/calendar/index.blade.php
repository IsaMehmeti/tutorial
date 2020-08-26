@extends('layouts.admin')

@section('page_name','Calendar')


@section('content')
<div class="content">
        <div class="container-fluid">
         
          <div class="row">
            <div class="col-md-10 ml-auto mr-auto">
              <div class="card card-calendar">
                <div class="card-body ">
                  <div id="fullCalendar"></div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
@endsection
@section('custom_scripts')
	<script>

		$(document).ready(function() {
			function fullCalendar() {
			($calendar = $("#fullCalendar")),
				(today = new Date()),
				(y = today.getFullYear()),
				(m = today.getMonth()),
				(d = today.getDate()),
				$calendar.fullCalendar({
					viewRender: function(e, a) {
						"month" != e.name &&
							$(a)
								.find(".fc-scroller")
								.perfectScrollbar();
					},
					header: {
						left: "title",
						center: "month,agendaWeek,agendaDay",
						right: "prev,next,today",
					},
					defaultDate: today,
					selectable: !0,
					selectHelper: !0,
					views: {
						month: { titleFormat: "MMMM YYYY" },
						week: { titleFormat: " MMMM D YYYY" },
						day: { titleFormat: "D MMM, YYYY" },
					},
					select: function(t, n) {
						swal({
							title: "Create an Event",
							html:
								'<div class="form-group"><input class="form-control" placeholder="Event Title" id="input-field"></div>',
							showCancelButton: !0,
							confirmButtonClass: "btn btn-success",
							cancelButtonClass: "btn btn-danger",
							buttonsStyling: !1,
						})
							.then(function(e) {
								var a;
								(event_title = $("#input-field").val()),
									event_title &&
										((a = {
											title: event_title,
											start: t,
											end: n,
										}),
										$calendar.fullCalendar(
											"renderEvent",
											a,
											!0
										)),
									$calendar.fullCalendar("unselect");
										console.log(t);
							})
							.catch(swal.noop);
					},
					editable: !0,
					eventLimit: !0,
					events: [
						{
							title: "All Day Event",
							start: new Date(y, m, 1),
							className: "event-default",
						},
						{
							title: "Click for Google",
							start: new Date(y, m, 21),
							end: new Date(y, m, 22),
							className: "event-orange",
						},
						{
							title: "sad",
							start: new Date(y, m, 3),
							end: new Date(y, m, 5),
							className: "event-orange",
						},
					],
				});
		}
		fullCalendar();
		
		});
	</script>
@endsection