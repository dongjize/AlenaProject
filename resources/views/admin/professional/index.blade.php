@extends("admin.layout.main")

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
                    <a type="button" class="btn " href="/admin/professionals/create">Add a Professional</a>
                </div>
            </div>
            {{--<div class="col-lg-3 col-xs-6">--}}
            {{--<!-- small box -->--}}
            {{--fuck--}}
            {{--</div>--}}
        </div>
    </section>
    <!-- /.content -->
@endsection
