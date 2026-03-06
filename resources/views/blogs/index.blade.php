@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Daftar Blog NASA Hacker</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ url('blogs/create') }}" class="btn btn-primary">Tambah Post</a>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Waktu Pembuatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $id => $post)
                        <tr>
                            <td>{{ $post['judul'] }}</td>
                            <td>{{ $post['waktu_pembuatan'] }}</td>
                            <td>
                                <a href="{{ route('blogs.show', $id) }}" class="btn btn-info btn-sm">Show</a>
                                <a href="{{ route('blogs.edit', $id) }}" class="btn btn-warning btn-sm">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection