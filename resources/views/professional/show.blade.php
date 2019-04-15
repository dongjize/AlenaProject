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

                            {{--<div class="card card-body">--}}
                            {{--Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry--}}
                            {{--richardson ad--}}
                            {{--squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt--}}
                            {{--sapiente ea proident. Anim pariatur cliche reprehenderit, enim eiusmod high life--}}
                            {{--accusamus terry richardson ad--}}
                            {{--squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt--}}
                            {{--sapiente ea proident. Anim pariatur cliche reprehenderit, enim eiusmod high life--}}
                            {{--accusamus terry richardson ad--}}
                            {{--squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt--}}
                            {{--sapiente ea proident.--}}
                            {{--</div>--}}

                            <form role="form" action="/appointments/create" method="POST">
                                {{csrf_field()}}
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="message">Date and Time</label>


                                        {{--<div class="row">--}}
                                        {{--<div class='col-sm-6'>--}}
                                        {{--<div class="form-group">--}}
                                        {{--<div class='input-group date' id='datetimepicker5'>--}}
                                        {{--<input type='text' class="form-control"/>--}}
                                        {{--<span class="input-group-addon">--}}
                                        {{--<span class="glyphicon glyphicon-calendar"></span>--}}
                                        {{--</span>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<script type="text/javascript">--}}
                                        {{--$(function () {--}}
                                        {{--$('#datetimepicker5').datetimepicker({--}}
                                        {{--defaultDate: "11/1/2013",--}}
                                        {{--disabledDates: [--}}
                                        {{--moment("12/25/2013"),--}}
                                        {{--new Date(2013, 11 - 1, 21),--}}
                                        {{--"11/22/2013 00:53"--}}
                                        {{--]--}}
                                        {{--});--}}
                                        {{--});--}}
                                        {{--</script>--}}
                                        {{--</div>--}}


                                    </div>

                                    <div class="form-group">
                                        <label for="message">Additional Message</label>
                                        <textarea type="text" class="form-control"
                                                  style="height:200px;max-height:300px;"
                                                  id="message" name="message"></textarea>
                                    </div>
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
