@extends('app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div class="row">
    @foreach ($viewData['blog'] as $blog )
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card">
            <img src="{{ asset('/storage/'.$blog->getImage()) }}" class="card-img-top img-card">
            <div class="card-body text-center">
                <a href="{{ route('blog.show', ['id'=> $blog->getId()]) }}" class="btn bg-primary text-white">{{ $blog->getName() }}</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
