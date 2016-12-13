<div class="panel panel-default">
    <div class="panel-heading">
        <h2>
            <i class="fa fa-newspaper-o" aria-hidden="true"></i> Posts
            <a href="/admin/posts/create" class="btn btn-success btn-raised pull-right">
                <i class="fa fa-plus-square" aria-hidden="true"></i> Create New Post
            </a>
        </h2>
    </div>

    <div class="panel-body">
        @foreach($posts['sticky'] as $post)
            <div class="well">
                <div class="media">
                    <div class="pull-left" href="#">
                        <i class="fa fa-thumb-tack fa-2x" aria-hidden="true"></i>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">
                            {{ $post->title }}
                            <small class="text-right">
                                By {{ $post->user->name }}
                                @if(Auth::user()->id == $post->user_id || Auth::user()->hasRole('admin'))
                                    <a href="/admin/posts/{{ $post->id }}/edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                @endif
                            </small>
                            <small class="pull-right">
                                <span><i class="fa fa-calendar"></i>
                                    {{ DateHelper::timeElapsed($post->created_at) }}
                                </span>
                            </small>
                        </h3>
                        <p>{!! str_limit(strip_tags($post->content), 600) !!}</p>
                        <ul class="list-inline list-unstyled">
                            <li><span><i class="fa fa-calendar"></i> {{ DateHelper::timeElapsed($post->created_at) }} </span></li>
                            <li>|</li>
                            <span>
                                <button data-id="{{ $post->id }}" class="read-more">
                                    <i class="fa fa-comment"></i> {{ $post->comments->count() }} comments
                                </button>
                            </span>
                            <li>|</li>
                            <li>
                                <button data-id="{{ $post->id }}" class="read-more">Read More...</button>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        @endforeach

        @foreach($posts['standard'] as $post)
            <div class="well">
                <div class="media">
                    <div class="pull-left" href="#">
                        <i class="{{ config('posts.post_types')[$post->type]['icon'] }}" aria-hidden="true"></i>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">
                            {{ $post->title }}
                            <small class="text-right">
                                By {{ $post->user->name }}
                                @if(Auth::user()->id == $post->user_id || Auth::user()->hasRole('admin'))
                                    <a href="/admin/posts/{{ $post->id }}/edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                @endif
                            </small>

                        </h3>
                        <p>{!! str_limit(strip_tags($post->content), 600) !!}</p>
                        <ul class="list-inline list-unstyled">
                            <li><span><i class="fa fa-calendar"></i> {{ DateHelper::timeElapsed($post->created_at) }} </span></li>
                            <li>|</li>
                            <span>
                                <button data-id="{{ $post->id }}" class="read-more">
                                    <i class="fa fa-comment"></i> {{ $post->comments->count() }} comments
                                </button>
                            </span>
                            <li>|</li>
                            <li>
                                <button data-id="{{ $post->id }}" class="read-more">Read More...</button>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="well">
            {{ $posts['standard']->links() }}
        </div>
    </div>
</div>