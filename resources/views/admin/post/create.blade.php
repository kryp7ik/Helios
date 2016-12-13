@extends('layouts.app')
@section('title', 'Create A New Post')
@section('content')
    <div class="container col-md-10 col-md-offset-1">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h2>Create a new Post</h2>
            </div>
            <form class="form-horizontal" method="post">
                <div class="panel-body">

                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Title</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" placeholder="Post Title" name="title">
                            <span class="help-block">The title of the post.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Type</label>
                        <div class="col-lg-10">
                            @foreach(config('posts.post_types') as $type => $info)
                                <label class="radio-inline">
                                    <input type="radio" name="type" value="{{ $type }}" @if($type == 'default') checked @endif>
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
                                    <input type="checkbox" name="sticky">
                                    <span class="help-block">Stickied posts will always show up at the top of the list.</span>
                                </label>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <h4><label for="content" class="col-lg-2 control-label">Content</label></h4>
                        <div class="col-lg-8">
                            <textarea id="content" name="content" style="height:280px"></textarea>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="form-group">
                        <div class="col-lg-4 col-lg-offset-8">
                            <a href="/" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
