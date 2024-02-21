@extends('adminlte::page')

@section('title', 'Tambah Pelanggan')

@section('content_header')
    <h1>Tambah Pelanggan</h1>
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
                Tambah
            </h5>
            <div class="form-actions float-right">
                <a href='{{ route('customer.index') }}' name="Find" class="btn btn-sm btn-primary" title="Back"><i
                        class="fa fa-arrow-left"></i> Kembali</a>
            </div>
        </div>
        <form action="{{route('customer.add-process')}}" method="post">
        <div class="card-body">
            @csrf
                <div class="row">
                    <x-adminlte-input name="namaPelanggan" label="Nama Pelanggan" onchange="function_elements_add(this.name,this.value)" value="{{$sessiondata['namaPelanggan']??''}}" placeholder="Nama Pelanggan"
                        fgroup-class="col-md-6 required" disable-feedback/>
                    <x-adminlte-input name="nomorTelp" label="Nomor Telepon" onchange="function_elements_add(this.name,this.value)" value="{{$sessiondata['nomorTelp']??''}}" placeholder="Nomor Telepon"
                        fgroup-class="col-md-6 required" disable-feedback/>
                    <x-adminlte-textarea name="alamat" label="Alamat" fgroup-class="col-md-12 required" placeholder="Masukan Alamat..."/>
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
    <script>
        function function_elements_add(name, value) {
            $.ajax({
                type: "POST",
                url: "{{ route('customer.add-elements') }}",
                data: {
                    'name': name,
                    'value': value,
                    '_token': '{{ csrf_token() }}'
                },
                success: function(msg) {}
            });
        }
    </script>
@stop