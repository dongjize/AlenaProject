@extends("admin.layout.main")

@section("content")
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <a type="button" class="btn btn-danger"
               href="/admin/professionals/{{$professional->id}}">Delete Professional</a>
        </div>

@endsection