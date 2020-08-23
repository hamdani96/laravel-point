@extends('layouts.app')
@section('title', 'My Library | Transaction Data')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"> Data Transaksi</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <a href="#" class="btn btn-primary"><i class="fa fa-plus-square"> Tambah Transaksi</i></a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Id Transaksi</th>
            <th>Nama User</th>
            <th> Produk Yg Dibeli</th>
            <th> Point Product</th>
            <th> Tgl</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($datas as $read)
          <tr>
            <td>{{ $read->id }}</td>
            <td>{{ $read->user->name }}</td>
            <td>{{ $read->product->name_product }}</td>
            <td>{{ $read->product->point_product }}</td>
            <td>{{ $read->tgl }}</td>
            <td>{{ $read->status }}</td>
            <td>
                @if($read->status == 'menunggu-pembayaran')
                <form action="/transaction/proses/{{ $read->id }}" method="POST">
                  @csrf
                  <input type="submit" class="btn btn-info" onclick="return confirm('Apakah Kamu Yakin Produk Sudah Dibayar')" value="Proses">
                </form>
                @elseif($read->status == 'proses')
                <form action="/transaction/selesai/{{ $read->id }}" method="POST">
                  @csrf
                  <input type="hidden" name="user_id" value="{{ $read->user->id }}">
                  <input type="text" name="point_product" value="{{ $read->product->point_product }}">
                  <input type="submit" class="btn btn-info" onclick="return confirm('Apakah Kamu Yakin Produk Sudah Dibayar')" value="Selesai">
                </form>
                @elseif($read->status == 'selesai')
                -
                @endif
            </td> 
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
