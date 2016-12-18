@extends('layouts.app')
@section('title', 'Edit Comment')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h2>Edit Comment</h2>
            </div>
            <form class="form-horizontal" method="post">
                <div class="panel-body">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <h4>Content</h4>
                            <textarea id="content" name="content" style="height:280px">{{ $comment->content }}</textarea>
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
                    <h6>Are you sure you want to delete this comment?</h6>
                </div>
                <div class="modal-footer">
                    <a href="/admin/comment/{{ $comment->id }}/delete" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
@endsection
