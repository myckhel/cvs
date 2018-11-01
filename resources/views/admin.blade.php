@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{URL::asset('css/bootstrap-datetimepicker.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('css/counter.css')}}">
@endsection
@section('content')
<div class="container">
	<div class="row">
		@if(isset($active->event_edate))
		<div class="col-lg-12 col-xl-12">
			<div class="card">
				<div class="card-header">
					<h5 class="card-header-text">Active Event</h5>
					<div class="card-header-right">
						<i class="icofont icofont-rounded-down"></i>
						<i class="icofont icofont-refresh"></i>
						<i class="icofont icofont-close-circled"></i>
					</div>
				</div>
				<div class="row">
				<div class="card-block" style="">
					<div class="row" id="draggableWithoutImg">
						<div class="col-md-3 col-sm-offset-4 col-xs-12 m-b-20 text-center">
							<div class="card-sub">
								<div class="card-block">
									<h4 class="card-title">{{date('l jS \of F Y', strtotime($active->event_edate))}}</h4>
									<!-- <div class="col-6 counter-card-icon card-block-big">
										<i class="icofont icofont-chart-line"></i>
									</div> -->
								</div>
							</div>
						</div>
						<div id="timer">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 countdown-wrapper text-center mb20" style="padding-right: 15px; padding-left: 0;">
									<div class="card-header">
										<h5 class="card-header-text">Event Countdown</h5>
									</div>
									<div id="countdown">
											<div class="row" >
												<div class="col-xs-3">
													<span id="day" class="timer bg-success"></span>
													<span id="" class="">Days</span>
												</div>
												<div class="col-xs-3">
													<span id="hour" class="timer bg-primary"></span>
													<span id="" class="">Hrs</span>
												</div>
												<div class="col-xs-3">
													<span id="min" class="timer bg-info"></span>
													<span id="" class="">Mins</span>
												</div>
												<div class="col-xs-3">
													<span id="sec" class="timer bg-danger"></span>
													<span id="" class="">Secs</span>
												</div>
											</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card-header">
					<h5 class="card-header-text">Stat</h5>
				</div>
				<div class="col-sm-12 col-md-4 col-xl-4">
					<div class="card counter-card-1">
						<div class="card-block-big">
							<div class="row">
								<div class="col-6 counter-card-icon">
									<i class="icofont icofont-chart-histogram"></i>
								</div>
								<div class="col-6  text-right">
									<div class="counter-card-text">
										<h3>{{$stat->yes}}</h3>
										<p>Coming</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-12 col-md-4 col-xl-4">
					<div class="card counter-card-2">
						<div class="card-block-big">
							<div class="row">
								<div class="col-6 counter-card-icon">
									<i class="icofont icofont-chart-line-alt"></i>
								</div>
								<div class="col-6 text-right">
									<div class="counter-card-text">
										<h3>{{$stat->no}}</h3>
										<p>Not Coming</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-12 col-md-4 col-xl-4">
					<div class="card counter-card-3">
						<div class="card-block-big">
							<div class="row">
								<div class="col-6 counter-card-icon">
									<i class="icofont icofont-chart-line"></i>
								</div>
								<div class="col-6 text-right">
									<div class="counter-card-text">
										<h3>{{$stat->ignored}}</h3>
										<p>Ignoring</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

			</div>
		</div>

		@endif
		<div class="page-body">
			<div class="row">
				<div class="col-sm-12">

					<div class="card">
						<div class="card-header">
							<h5 class="card-header-text">Create Event</h5>
							<div class="card-header-right">
								<i class="icofont icofont-rounded-down"></i>
								<i class="icofont icofont-refresh"></i>
								<i class="icofont icofont-close-circled"></i>
							</div>
						</div>
						<div class="card-block">

							<div class="row">
								<div class="col-xs-12 col-md-6 mobile-inputs">
									<h4 class="sub-title">Event Date</h4>
									<form>
										<div class="form-group">
											<div class="input-group">
												<input id="start" class="form-control form-txt-primary datetimepicker" type="text" placeholder="Select event start date&time" readonly="readonly">
												<span class="input-group-addon bg-default">
													<span class="icofont icofont-ui-calendar"></span>
												</span>
											</div>
										</div>
									</form>
									<form>
										<div class="form-group">
											<div class="input-group">
												<input id="end" class="form-control form-txt-primary datetimepicker" type="text" placeholder="Select event end date&time" readonly="readonly">
												<span class="input-group-addon bg-default">
													<span class="icofont icofont-ui-calendar"></span>
												</span>
											</div>
										</div>
									</form>
								</div>
								<div class="col-xs-12 col-md-6 mobile-inputs">
									<h4 class="sub-title">Submit</h4>
									<button style="background-color: #dd4b39;" id="create" class="btn btn-inverse">
										<i class="icofont icofont-exchange"></i>Create event
									</button>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
		//counter
		counter("{{$active->event_edate}}");
		//time picker
		$(function(){
   		$('.datetimepicker').datetimepicker({
				format: 'yyyy-mm-dd hh:mm',
				autoclose: true,
				startDate: "{{NOW()}}",
        // pickDate: false,
				// pickTime: true,
        pickSeconds: false,
        pick12HourFormat: true
	    });
		});
  	// $('#dropper-default').dateDropper();
		$('#create').click(function(){
			let sdate = $('#start').val();
			let edate = $('#end').val();
			//validate on empty fields
			if (sdate === '' || edate === '') {
				swal("Oops", "Please choose event dates", "error");
				return ;
			}
			//validate on invalid dates
			if (new Date(sdate) > new Date(edate)) {
				swal("Oops", "End date must be greater than the start date", "error");
				return;
			}
			swal({
			  title: "Are you sure you want to create the event?",
			  text: "Oncreation will remove active event",
			  type: "warning",
			  buttons: true,
			  dangerMode: true,
			  showCancelButton: true,
			},function(){
				let values = {'event_sdate': sdate, 'event_edate': edate, '_token': '{{ csrf_token() }}'};
			  	$.ajax(
			  		{type: "POST", url: "{{route('event.create')}}", data: values, dataType: "json", encode: true}
			  	).done(function(response){
			  		if(response.status){
          				swal("Success!", "Event Created", "success");
			  		}else{
			  			swal("Oops", ""+response.reason, "error");
			  		}
          		}).error(function(data) {
								console.log(data.responseText);
			        swal("Oops", "Error occured! Error: "+data.statusText, "error");
			    });
			});
	 	});
 	});
</script>
@endsection

@section('jslink')
<!-- <script src="{{URL::asset('js/datedropper.min.js')}}"></script> -->
<script src="{{URL::asset('js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{URL::asset('js/counter.js')}}"></script>
@endsection
