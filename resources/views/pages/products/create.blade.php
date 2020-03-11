@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Barang</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="type" class="form-control-label">Tipe Barang</label>
                    <input type="text"
                           name="type"
                           value="{{ old('type') }}"
                           class="form-control @error('type') is-invalid @enderror"/>
                           @error('type') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Tambah Barang</button>
                </div>
            </form>
        </div>
    </div>
@endsection
