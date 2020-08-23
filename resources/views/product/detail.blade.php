@extends('layouts.app')
@section('title', 'My Library | Detail Product')
@section('content')
<div class="row">
	@foreach($details as $r)
	<div class="col-md-3">
		<div class="card">
			<div class="card-header">
				{{ $r->name_product }}
			</div>
			<div class="card-body">
				<p class="display-4">{{ $r->price_product }}</p>
				<p class="lead"> Point: {{ number_format($r->point_product) }}</p>
				<form method="POST" action="{{ Route('transaction.store') }}">
					@csrf
					<input type="hidden" name="product_id" value="{{ $r->id }}">
					<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
					<textarea class="form-control" name="ket" cols="5"></textarea>
					<input type="submit" class="btn btn-success" value="Beli" name="">
				</form>
			</div>
		</div>
	</div>
	@endforeach
</div>
@endsection