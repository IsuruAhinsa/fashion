<form action="{{ route('coupon.store') }}" method="post">
    @csrf
    <label for="code" class="d-none">Coupon Code</label>
    <input type="text" placeholder="Enter Coupon Code" name="code" id="code">
    <button type="submit">Apply</button>
</form>
