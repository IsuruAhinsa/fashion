<form action="{{ route('wishlist.moveToCart', $item->rowId) }}" method="POST" class="list-inline-item">
    @csrf
    <button class="btn btn-primary btn-sm" type="submit">
        Move to Cart
    </button>
</form>
