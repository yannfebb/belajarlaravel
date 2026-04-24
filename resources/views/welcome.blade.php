@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
<link rel="stylesheet" href="{{ asset('/public/dist/css/adminlte.css') }}">    
  </head>
<div class="content-header">
    <div class="container-fluid">
        <h1 class="m-0">Dashboard</h1>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
    <div class="div-card">
      <div class="div-card-header">
        <div class="text">Blog (singkatan dari weblog) adalah situs web atau halaman online yang berisi kumpulan catatan, artikel, opini, atau pengalaman yang diperbarui secara rutin. Kontennya diurutkan secara kronologis terbalik (terbaru di atas) dan dapat mencakup teks, foto, hingga video.</div>
      </div>
      
                <li class="nav-item menu-open">
                    <a href="{{ route('blog.index') }}" class="nav-link active">
                       <i class="bi bi bi-substack"></i>
                        <p>
                            BLOG
                        </p>
                    </a>
                </li>
                </li>
            </ul>
        </nav>

</section>

@endsection
