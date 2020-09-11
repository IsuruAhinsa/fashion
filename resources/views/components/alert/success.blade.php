@if(session()->has('success'))
    <div class="alert alert-success">
        <i class="fa fa-check-circle mr-2"></i>
        {{ session()->get('success') }}
    </div>
@endif
