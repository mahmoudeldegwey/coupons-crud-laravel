
<form method="POST" action="{{ route('coupons.destroy',$id) }}">
	@csrf
	{{ method_field('DELETE') }}
	<button type="submit" class="btn-link">Delete</button>
</form>

<a href="{{ route('coupons.edit',$id) }}" class="btn btn-link">Edit</a>
