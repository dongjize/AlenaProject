@extends("layout.main")

@section("content")
    <div class="col-sm-8 blog-main">
        <form class="form-horizontal" action="/customer/me/settings" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label class="col-sm-2 control-label">Username</label>
                <div class="col-sm-10">
                    <input class="form-control" name="name" type="text" value="{{$customer->name}}">
                </div>
                <label class="col-sm-2 control-label">Phone Number</label>
                <div class="col-sm-10">
                    <input class="form-control" name="phone" type="text" value="{{$customer->phone}}">
                </div>
                <label class="col-sm-2 control-label">Home Address</label>
                <div class="col-sm-10">
                    <input class="form-control" name="address" type="text" value="{{$customer->address}}">
                </div>
            </div>
            {{--<div class="form-group">--}}
                {{--<label class="col-sm-2 control-label">Avatar</label>--}}
                {{--<div class="col-sm-2">--}}
                    {{--<input class="file-loading preview_input" type="file" value="username" style="width:72px"--}}
                           {{--name="avatar">--}}
                    {{--<img class="preview_img" src="{{$user->avatar}}" alt="" class="img-rounded"--}}
                         {{--style="border-radius:500px;">--}}
                {{--</div>--}}
            {{--</div>--}}
            @include('layout.error')
            <button type="submit" class="btn btn-default">Modify</button>
        </form>
        <br>

    </div>

@endsection