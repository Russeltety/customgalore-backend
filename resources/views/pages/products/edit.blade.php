@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Ubah Barang</strong>
            <small>{{ $item->type }}</small>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('products.update', $item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="type" class="form-control-label">Tipe Barang</label>
                    <input type="text"
                           name="type"
                           value="{{ old('type') ? old('type') : $item->type }}"
                           class="form-control @error('name') is-invalid @enderror"/>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Ubah Barang</button>
                </div>
            </form>
        </div>
    </div>
@endsection
