@extends('layouts.app')

@section('content')
<div class="row">

@foreach ($posts as $id => $post)

<div class="col-md-3">
    <div class="card">
        <img src="https://picsum.photos/300/200?random={{ $id }}" class="card-img-top">

            <div class="card card-primary">

<div class="card-header">
<h3 class="card-title">Area Chart</h3>

<div class="card-tools">

<button type="button" class="btn btn-tool" data-card-widget="collapse">
<i class="fas fa-minus"></i>
</button>

<button type="button" class="btn btn-tool" data-card-widget="maximize">
<i class="fas fa-expand"></i>
</button>

<button type="button" class="btn btn-tool" data-card-widget="remove">
<i class="fas fa-times"></i>
</button>

</div>
</div>

<div class="card-body">
<canvas id="areaChart"></canvas>
</div>

</div>

        <div class="card-body">
            <h5 class="card-title">{{ $post['judul'] }}</h5>

            <p class="text-muted">
                {{ $post['waktu_pembuatan']->format('Y-m-d H:i') }}
            </p>

            <a href="{{ route('blog.show',$id) }}" class="btn btn-sm btn-primary">
                Show
            </a>

            <a href="{{ route('blog.edit',$id) }}" class="btn btn-sm btn-warning">
                Edit
            </a>
        </div>
    </div>
</div>

@endforeach

</div>

@endsection
