@extends("layout.main")

@section("content")
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-10 col-xs-6">
                <div class="box">

                    <!-- /.box-header -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add a New Appointment</h3>
                        </div>
                        <!-- /.box-header -->
                        <h2 class="blog-post-title">{{$professional->name}}</h2>

                        <!-- form start -->
                        <form role="form" action="/appointments/store" method="POST">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="message">Additional Message</label>
                                    <textarea type="text" class="form-control" style="height:200px;max-height:300px;"
                                              name="message"></textarea>
                                </div>
                            </div>

                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection