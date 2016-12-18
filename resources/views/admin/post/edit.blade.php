@extends('layouts.app')
@section('title', 'Edit Post')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h2>Edit Post</h2>
            </div>
            <form class="form-horizontal" method="post">
                <div class="panel-body">

                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Title</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                            <span class="help-block">The title of the post.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Type</label>
                        <div class="col-lg-10">
                            @foreach(config('posts.post_types') as $type => $info)
                                <label class="radio-inline">
                                    <input type="radio" name="type" value="{{ $type }}" @if($post->type == $type)checked @endif >
                                    <i class="{{ $info['icon'] . ' ' . $info['color'] }}" aria-hidden="true"></i>
                                    {{ ucfirst($type) }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                    @if(Auth::user()->hasRole('admin'))
                        <div class="form-group">
                            <label for="sticky" class="col-lg-2 control-label">Sticky?</label>
                            <div class="togglebutton col-lg-10">
                                <label>
                                    <input type="checkbox" name="sticky" @if($post->sticky)checked @endif >
                                    <span class="help-block">Stickied posts will always show up at the top of the list.</span>
                                </label>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <h4>Content</h4>
                            <textarea id="content" name="content" style="height:280px">{{ $post->content }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="form-group">
                        <div class="col-lg-5 col-lg-offset-7">
                            <a href="/" class="btn btn-default btn-raised">Cancel</a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="confirm-modal">
                                Delete
                            </button>
                            <button type="submit" class="btn btn-primary btn-raised">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog" aria-labelledby="confirm-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Confirm Delete</h3>
                </div>
                <div class="modal-body">
                    <h6>Are you sure you want to delete this Post?</h6>
                </div>
                <div class="modal-footer">
                    <a href="/admin/posts/{{ $post->id }}/delete" class="btn btn-raised btn-danger pull-right">Delete</a>
                </div>
            </div>
        </div>
    </div>
@endsection
