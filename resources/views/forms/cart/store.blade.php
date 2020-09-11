<form action="{{ route('cart.store') }}" method="post" class="d-inline">
    @csrf
    <input type="hidden" name="id" value="{{ $product->id }}">
    <input type="hidden" name="name" value="{{ $product->name }}">
    <input type="hidden" name="price" value="{{ $product->price }}">
    <input type="submit" value="Add to Cart" class="primary-btn border-0">
</form>
