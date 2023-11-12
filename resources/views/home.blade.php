@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

            @forelse($posts as $post)
            <div class="card px-0 col-md-4 mx-5" style="max-height:600px;overflow: hidden;">
            <div class="card-header">
               {{ $post->title}}
            </div>
            <div class="card-body ">
            <div style="max-height:200px;max-width:200px">
                            <img src="{{asset($post->file)}}" class="img-fluid" alt="">                            
                        </div>
            {!!$post->content!!}
            </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>
</div>
@endsection
