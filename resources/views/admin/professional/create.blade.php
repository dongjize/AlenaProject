@extends("admin.layout.main")

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
                            <h3 class="box-title">Add a Professional</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="/admin/professionals" method="POST">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail">Email Address</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="charge">Hourly Charge ($)</label>
                                    <input type="number" class="form-control" name="charge">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="professionalType">Type</label>
                                    <select name="type_id" class="form-control" id="type_id">
                                        @foreach($profTypes as $profType)
                                            <option id="{{$profType->id}}"
                                                    value="{{$profType->id}}">{{$profType->name}}</option>
                                        @endforeach
                                    </select>
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