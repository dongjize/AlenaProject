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
                            <h3 class="box-title">Update Profile</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="/customer/update" method="POST"
                              enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="box-body">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" name="name" type="text" value="{{$customer->name}}">
                                </div>
                            </div>

                            <div class="box-body">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input class="form-control" name="phone" type="text"
                                           value="{{$customer->phone}}">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Home Address</label>
                                    <input class="form-control" name="address" type="text"
                                           value="{{$customer->address}}">
                                </div>

                            </div>
                            @include('layout.error')
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success">Modify</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection