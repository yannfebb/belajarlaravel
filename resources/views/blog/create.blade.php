@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <h1 class="m-0">Buat Post Baru</h1>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form action="#" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" placeholder="Contoh: Cara Hack NASA pakai CSS">
                    </div>
                    <div class="form-group">
                        <label>Konten</label>
                        <textarea class="form-control" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ url('blog') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection