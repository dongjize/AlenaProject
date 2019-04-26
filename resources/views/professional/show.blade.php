@extends("layout.main")

@section("content")

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-10 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$professional->name}}</h3>
                    </div>

                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>ID</td>
                                <td>{{$professional->id}}</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{$professional->name}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{$professional->email}}</td>
                            </tr>
                            <tr>
                                <td>Type</td>
                                <td>{{$professional->type->name}}</td>
                            </tr>
                            <tr>
                                <td>Hourly Charge</td>
                                <td>{{$professional->charge}}</td>
                            </tr>

                        </table>

                        <p style="margin-top: 10px;">
                            <button class="btn btn-success" type="button" data-toggle="collapse"
                                    data-target="#collapseExample" aria-expanded="false"
                                    aria-controls="collapseExample">
                                Book an Appointment
                            </button>
                        </p>
                        <div class="collapse" id="collapseExample">

                            <form role="form" action="/appointments/create" method="POST">
                                {{csrf_field()}}
                                <div class="box-body">

                                    {{--<div class="form-group">--}}

                                    <div class="row">
                                        <div class='col-md-6'>
                                            <div class="form-group">
                                                <label for="message">Date Time</label>
                                                <div class='input-group date' id="datetimepicker">
                                                    <input type='text' class="form-control"/>
                                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="message">Additional Message</label>
                                        <textarea type="text" class="form-control"
                                                  style="height:200px;max-height:300px;"
                                                  id="message" name="message"></textarea>
                                    </div>
                                    <input type="hidden" id="professional_id" name="professional_id"
                                           value="{{$professional->id}}">
                                </div>

                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-success">Confirm Booking</button>
                                    <button class="btn btn-danger" type="button">
                                        Cancel
                                    </button>
                                </div>
                            </form>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->
@endsection
