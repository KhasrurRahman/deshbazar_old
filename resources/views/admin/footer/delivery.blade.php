@extends('admin.master')

@section('body')

    <div class="container">
        <h3 class=" text-center">ডেলিভারি</h3>

        <form action="{{route('admin_delivery_save')}}" method="post">
            {!! csrf_field() !!}
            <div class="form-group">
                <label class="control-label col-md-2 text-success">বিবরণ</label>
                <div class="col-md-8">
                    <textarea name="description" id="editor" class="form-control" >
                        @if(empty($footer->delivery))
                         @else
                            {{$footer->delivery}}
                        @endif
                    </textarea>
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-4" style="margin-top: 30px">
                    <input type="submit" name="btn" class="btn btn-success btn-block" value="save" />
                </div>
            </div>

        </form>

    </div>

@endsection