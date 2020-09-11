<form action="{{ route('cart.moveToWishlist', $item->rowId) }}" method="POST">
    @csrf
    <button class="btn btn-link text-decoration-none pl-0" type="submit">
        <i class="fa fa-heart mr-2"></i>Add to Wishlist
    </button>
</form>
