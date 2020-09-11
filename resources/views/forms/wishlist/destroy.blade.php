<form action="{{ route('wishlist.destroy', $item->rowId) }}" method="POST" class="list-inline-item">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger btn-sm" type="submit">
        Remove
    </button>
</form>
