@extends("layout.main")

@section("content")

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-10 col-xs-10">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Choose a Professional</h3>
                    </div>
                    {{--<a type="button" class="btn btn-success" style="margin: 10px" href="/professionals">Book a New--}}
                    {{--Appointment</a>--}}
                    {{--<div class="form-group">--}}
                    {{--<label for="professionalType">Type</label>--}}
                    <div class="row col-lg-6 col-xs-12">
                        <select name="type_id" class="form-control" id="type_id" style="margin: 10px;">
                            <option id="" value="">All</option>
                            @foreach($profTypes as $profType)
                                <option id="{{$profType->id}}"
                                        value="{{$profType->id}}">{{$profType->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    {{--</div>--}}
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
                            @foreach($professionals as $professional)
                                <tr>
                                    <td>{{$professional->id}}</td>
                                    <td>{{$professional->name}}</td>
                                    <td>{{$professional->type->name}}</td>
                                    <td>{{$professional->charge}}</td>
                                    <td>
                                        <a type="button" class="btn btn-success"
                                           href="/professionals/{{$professional->id}}">View and Choose</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{$professionals->links()}}
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->
@endsection
