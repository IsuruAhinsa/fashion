@if(count($errors) > 0)
    <div class="alert alert-danger" style="font-family: 'Open Sans', sans-serif;">
        @foreach($errors->all() as $error)
            <i class="fa fa-exclamation-circle mr-2"></i>
            {{ $error }} <br>
        @endforeach
    </div>
@endif
