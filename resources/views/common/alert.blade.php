@if (session('message'))
    <div class="alert alert-{{session('result')}}" role="alert">
        @if(session('bold_message'))
            <strong class="d-block d-sm-inline-block-force">{{session('bold_message')}}</strong>&nbsp;
        @endif
        {{session('message')}}
    </div>
@endif
