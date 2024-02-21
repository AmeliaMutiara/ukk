@extends('adminlte::page')

@section('title', 'Edit Data Produk')

@section('content_header')
    <h1>Edit Data Produk</h1>
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
        <div class="card-header bg-dark clearfix">
            <h5 class="mb-0 float-left">
                Edit
            </h5>
            <div class="form-actions float-right">
                <a href='{{ route('product.index') }}' name="Find" class="btn btn-sm btn-primary" title="Back"><i
                        class="fa fa-arrow-left"></i> Kembali</a>
            </div>
        </div>
        <form action="{{ route('product.edit-process') }}" method="post">
            <div class="card-body">
                @csrf
                <div class="row">
                    <x-adminlte-input name="id" type="hidden" value="{{ $data->id }}"
                        disable-feedback />
                    <x-adminlte-input name="namaProduk" label="Nama Produk" required
                        value="{{ $data->namaProduk }}" placeholder="Nama Produk" fgroup-class="col-md-4 required"
                        disable-feedback required />
                    <x-adminlte-input name="harga" label="Harga" fgroup-class="col-md-4 required"
                        value="{{ $data->harga }}" placeholder="Harga Produk" />
                    <x-adminlte-input name="stok" label="Stok" fgroup-class="col-md-4 required"
                        value="{{ $data->stok }}" placeholder="Stok Produk" />
                </div>
            </div>
            <div class="card-footer text-muted">
                <div class="form-actions float-right">
                    <x-adminlte-button class="btn" type="reset" label="Reset" theme="danger" icon="fas fa-trash" />
                    <x-adminlte-button class="btn" type="submit" label="Submit" theme="success"
                        onclick="$(this).addClass('disabled');$('form').submit();" icon="fas fa-save" />
                </div>
            </div>
        </form>
    </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop