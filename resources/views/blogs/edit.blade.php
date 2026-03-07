@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <h1 class="m-0">Edit Post: {{ $post['judul'] }}</h1>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form action="#" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" value="{{ $post['judul'] }}">
                    </div>
                    <div class="form-group">
                        <label>Isi Konten</label>
                        <textarea class="form-control" rows="4">{{ $post['isi'] }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-warning">Update</button>
                    <a href="{{ url('blogs') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection