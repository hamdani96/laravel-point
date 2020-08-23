@extends('layouts.app')
@section('title', 'My Library | Product')
@section('content')
<div class="row">
	@foreach($products as $r)
	<div class="col-md-3">
		<div class="card">
			<div class="card-header">
				{{ $r->name_product }}
			</div>
			<div class="card-body">
				<p class="display-4">{{ $r->price_product }}</p>
				<a href="/product/detail/{{ $r->id }}" class="btn btn-primary"> Detail</a>
			</div>
		</div>
	</div>
	@endforeach
</div>
@endsection