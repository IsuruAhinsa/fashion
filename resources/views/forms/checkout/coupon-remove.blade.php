<form action="{{ route('coupon.destroy') }}" method="POST" class="d-inline">

    @csrf
    @method('DELETE')

    <button class="btn btn-link btn-sm" type="submit">
        REMOVE
    </button>
</form>
