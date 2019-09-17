@extends('admin.master')

@section('body')

    <div class="container">
        <h3 class=" text-center">গ্রাহককে চুক্তি</h3>

        <form action="{{route('customer_deal_save')}}" method="post">
            {!! csrf_field() !!}
            <div class="form-group">
                <label class="control-label col-md-2 text-success">বিবরণ</label>
                <div class="col-md-8">
                    <textarea name="description" id="editor" class="form-control" >
                        @if(empty($footer->customer_deal))
                         @else
                            {{$footer->customer_deal}}
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