@extends('adminlte::page')

@section('title', 'Kasir')

@section('content_header')
    <h1>Tambah Penjualan</h1>
@stop

@section('content')
@if (session('msg'))
<div class="alert alert-{{ session('type') ?? 'info' }}" role="alert">
    {{ session('msg') }}
</div>
@endif
@if (count($errors) > 0)
<div class="alert alert-danger" role="alert">
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
</div>
@endif
<div class="card border border-dark">
  <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="qty" type="text" disabled label="Tanggal Penjualan" placeholder="Masukan Jumlah Barang" value="{{ date('d-m-Y', strtotime($penjualan->tanggalPenjualan)) }}"/>
            </div>
            <div class="col-md-6">
                <x-adminlte-input name="qty" type="text" disabled label="Nama Pelanggan" placeholder="Masukan Jumlah Barang" value="{{ $penjualan->pelanggan->namaPelanggan ?? '-' }}"/>
            </div>
        </div>
    </div>
</div>
<div class="card border border-dark">
<div class="card-header bg-dark clearfix">
  <h5 class="mb-0 float-left">
      Daftar Barang
  </h5>
  <div class="form-actions float-right">
      <a href='{{route('sales.index')}}' name="Find" class="btn btn-sm btn-primary" title="Add Data"><i class="fa fa-arrow-left"></i> Kembali</a>
  </div>
</div>
  <div class="card-body">
      <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Produk</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Jumlah</th>
                    <th class="text-center">Subtotal</th>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                        $total = 0;
                    @endphp
                    @if (empty($penjualan->detail))
                    <tr><td colspan="6" class="text-center">Data Kosong</td></tr>
                    @else
                    @foreach ($penjualan->detail as $k=>$v)
                    <tr>    
                        <td class="text-center">{{$no++}}</td>
                        <td>{{$v->produk->namaProduk}}</td>
                        <td class="text-right">{{number_format($v->produk->harga,2)}}</td>
                        <td class="text-center">{{$v->jumlahProduk}}</td>
                        <td class="text-right">{{number_format($v->subtotal,2)}}</td>
                    </tr>
                    @php
                        $total += ($v->subtotal);
                    @endphp
                    @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-center font-weight-bold">Total</td>
                        <td class="text-right">{{number_format($total,2)}}</td>
                    </tr>
                </tfoot>
            </table>
      </div>
  </div>
</div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop