@extends("layout.main")

@section("content")
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-10 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Appointment Booking</h3>
                    </div>

                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>Appointment ID</td>
                                <td>{{$appointment->id}}</td>
                            </tr>
                            <tr>
                                <td>Professional</td>
                                <td>{{$appointment->professional->name}}</td>
                            </tr>
                            <tr>
                                <td>Customer</td>
                                <td>{{$appointment->customer->name}}</td>
                            </tr>
                            <tr>
                                <td>Start Time</td>
                                <td>{{$appointment->startTime()}}</td>
                            </tr>
                            <tr>
                                <td>Duration</td>
                                <td>{{$appointment->duration()}} hr(s)</td>
                            </tr>
                            <tr>
                                <td>Message</td>
                                <td>{{$appointment->message}}</td>
                            </tr>
                        </table>
                        <a type="button" class="btn btn-danger" style="margin-top: 10px;"
                           href="/appointments/{{$appointment->id}}/delete">Cancel Appointment</a>
                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection
