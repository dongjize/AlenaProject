@extends("layout.main")

@section("content")

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-10 col-xs-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Appointment List</h3>
                    </div>
                    <a type="button" class="btn btn-success" style="margin: 10px" href="/professionals">Book a New
                        Appointment</a>

                    {{--<a type="button" class="btn btn-info" style="margin: 10px" href="/appointments/email">Book a New--}}
                        {{--Appointment</a>--}}

                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th style="width: 20px">ID</th>
                                <th>Professional</th>
                                <th>Start Time</th>
                                <th>Duration (hrs)</th>
                                <th>Message</th>
                            </tr>
                            @foreach($appointments as $appointment)
                                <tr>
                                    <td>{{$appointment->id}}</td>
                                    <td>
                                        <a href="/professionals/{{$appointment->professional->id}}">{{$appointment->professional->name}}</a>
                                    </td>
                                    <td>{{$appointment->startTime()}}</td>
                                    <td>{{$appointment->duration()}}</td>
                                    <td>{{$appointment->message}}</td>
                                </tr>
                            @endforeach
                        </table>
                        {{$appointments->links()}}
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->
@endsection
