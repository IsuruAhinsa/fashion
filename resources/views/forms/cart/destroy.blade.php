<form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="btn btn-outline-dark rounded-circle" type="submit">
        <i class="fa fa-close"></i>
    </button>
</form>
