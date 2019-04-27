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
                                                <label for="message">Choose Date and Time</label>
                                                <div class='input-group date' id="datetimepicker">
                                                    <input id="datetime" name="datetime" type='text' class="form-control"/>
                                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        var today = new Date();
                                        var monthLater = new Date().setMonth(today.getMonth() + 1);

                                        var dict = {};
                                        var dataArr = {!! $available_slots !!};
                                        $.each(dataArr, function (idx, obj) {
                                            var datetime = moment(obj["datetime"]);
                                            if (dict[datetime.format('YYYY-MM-DD')] === undefined) {
                                                dict[datetime.format('YYYY-MM-DD')] = [];
                                            }
                                            dict[datetime.format('YYYY-MM-DD')].push(parseInt(datetime.format('HH')));

                                        });

                                        $("#datetimepicker").datetimepicker({
                                            viewMode: 'days',
                                            format: 'YYYY-MM-DD HH:00:00',
                                            minDate: today, // today
                                            maxDate: monthLater, // next month
                                            enabledDates: Object.keys(dict),
                                        });
                                        $("#datetimepicker").on("dp.change", function (e) {
                                            var chosen = e.date.format('YYYY-MM-DD');
                                            $('#datetimepicker').data("DateTimePicker").enabledHours(dict[chosen]);
                                        });
                                    </script>


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
