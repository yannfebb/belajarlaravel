@extends('layouts.app')

@section('content')
<div class="row">

    @foreach ($posts as $id => $post)
    <div class="col-md-4"> <div class="card card-outline card-primary">
            
            <div class="card-header">
                <h3 class="card-title"><strong>{{ $post['judul'] }}</strong></h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <p class="text-muted small">
                    <i class="far fa-clock"></i> {{ $post['waktu_pembuatan']->format('Y-m-d H:i') }}
                </p>
                
                <div class="chart-container mb-3" style="height: 150px;">
                    <canvas id="areaChart-{{ $id }}"></canvas>
                </div>

                <div class="mt-3">
                    <a href="{{ route('blog.show', $id) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-eye"></i> Show
                    </a>
                    <a href="{{ route('blog.edit', $id) }}" class="btn btn-sm btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                </div>
            </div>
            
        </div>
    </div>
    @endforeach

</div>
@endsection