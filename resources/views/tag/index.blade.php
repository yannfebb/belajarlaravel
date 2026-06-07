@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <h1 class="m-0">Manajemen Tags Artikel</h1>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header fw-bold">Tambah Tag Baru</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tag.store') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label>Nama Tag</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Contoh: Wuthering Waves" required>
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Tambah Tag</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header fw-bold">Daftar Tag</div>
                    <div class="card-body p-0">
                        <table class="table table-striped table-hover mb-0">
                            <thead>
                                <tr>
                                    <th style="width: 80px;" class="text-center">No</th>
                                    <th>Nama Tag</th>
                                    <th>Slug</th>
                                    <th style="width: 180px;" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tags as $index => $tag)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td class="text-capitalize fw-bold text-white">{{ $tag->name }}</td>
                                        <td><code>{{ $tag->slug }}</code></td>
                                        <td class="text-center">
                                            <form action="{{ route('tag.destroy', $tag->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus tag ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted">Belum ada tag yang dibuat.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
