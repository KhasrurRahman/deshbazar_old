@if(Session::get('message'))
    <div class="container" >
        <div class="row">
            <div class="bg-warning text-danger" id="alert">
                <div class="text-center alert-content">{{Session::get('message')}}</div>
                <div class="alert-close">
                    <a href="#" class="text-danger" id="alert-close">
                        <i class="fa fa-close"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endif

