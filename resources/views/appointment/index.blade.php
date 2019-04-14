@extends("layout.main")

@section("content")

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-10 col-xs-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Professional List</h3>
                    </div>
                    <a type="button" class="btn btn-success" style="margin: 10px" href="/professionals">Book a New Appointment</a>

                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th style="width: 20px">ID</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Hourly Charge</th>
                                <th>Operation</th>
                            </tr>
                            @foreach($appointments as $appointment)
                                {{--<tr>--}}
                                    {{--<td>{{$professional->id}}</td>--}}
                                    {{--<td>{{$professional->name}}</td>--}}
                                    {{--<td>{{$professional->type->name}}</td>--}}
                                    {{--<td>{{$professional->charge}}</td>--}}
                                    {{--<td>--}}
                                        {{--<a type="button" class="btn btn-success"--}}
                                           {{--href="/admin/professionals/{{$professional->id}}">View Details</a>--}}
                                        {{--<a type="button" class="btn btn-danger"--}}
                                           {{--href="/admin/professionals/{{$professional->id}}/delete">Delete</a>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                            @endforeach
                        </table>
{{--                        {{$professionals->links()}}--}}
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->
@endsection
