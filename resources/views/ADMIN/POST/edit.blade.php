@extends('layouts.appAdmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Post</div>
                <div class="card-body">
                    <form action="{{route('post.update',[$post->id])}}" method="POST"  enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div style="max-height:200px;max-width:200px">
                            <img src="{{asset($post->file)}}" class="img-fluid" alt="">                            
                        </div>
                        <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupFile01">Upload</label>
                        <input type="file"  name="file" class="form-control" id="inputGroupFile01">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" value="{{$post->title}}" class="form-control" id="title" placeholder="title">
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" name="content" id="summernote" rows="3">{{$post->content}}</textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
