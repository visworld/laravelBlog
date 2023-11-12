@extends('layouts.appAdmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cretae Post</div>
                <div class="card-body">
                    <form action="{{route('post.save')}}" method="POST" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupFile01">Upload</label>
                        <input type="file"  name="file" class="form-control" id="inputGroupFile01">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="title">
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" name="content" id="summernote" rows="3"></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">
                            Create
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
