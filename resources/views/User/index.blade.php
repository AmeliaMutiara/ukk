@extends('adminlte::page')

@section('title', 'User')

@section('content_header')
    <h1>Daftar User</h1>
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
                Daftar
            </h5>
            <div class="form-actions float-right">
                <a href="{{ route('user.add') }}" name="Find" class="btn btn-sm btn-primary" title="Add Data">
                    <i class="fa fa-plus"></i> Tambah Data
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                {{-- begin::Tbale --}}
                {{ $dataTable->table() }}
                {{-- end::table --}}
                {{-- inject scripts --}}
                @push('js')
                    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
                @endpush
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop