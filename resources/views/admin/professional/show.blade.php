@extends("admin.layout.main")

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

                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->
@endsection
