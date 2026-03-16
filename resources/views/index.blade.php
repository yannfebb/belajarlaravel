@extends('layouts.app')

@section('content')

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

<div class="card-header">
<h3 class="card-title">Daftar Post</h3>
</div>

<div class="card-body">

@forelse($posts ?? [] as $post)

<h4>{{ $post->title }}</h4>

<p>{{ $post->content }}</p>

<small>
Category: {{ optional($post->category)->name }}
</small>

<br>

<small>
{{ optional($post->created_at)->format('d M Y H:i') }}
</small>

<hr>

@empty

<p class="text-muted">Belum ada post.</p>

@endforelse

</div>

</div>
</div>
</div>
</div>
</section>

@endsection
