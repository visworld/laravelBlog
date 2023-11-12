@extends('layouts.appAdmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ttitle</th>
                            <th scope="col">View</th>
                            <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @forelse($posts as $post)
                            <tr>
                            <th scope="row">{{$i}}</th>
                            <td>{{$post->title}}</td>
                            <td>
                                <a href="{{route('post.edit',[$post->id])}}">View</a>
                            </td>
                            <td>
                                <form action="{{route('post.delete',[$post->id])}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            </tr>
                            @php
                            $i++;
                            @endphp

                            @empty
                            @endforelse
 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
