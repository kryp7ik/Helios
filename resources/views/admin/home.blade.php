@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('admin.partials.post-panel')
            </div>
        </div>
    </div>
    @include('admin.partials.post-modal')
@endsection
@push('scripts')
<script>

    $('.read-more').on('click', function () {
        var id = $(this).attr('data-id');
        $.getJSON('/admin/posts/' + id + '/show', function(data) {
            var post = data;
            $('#title').html(post.title);
            $('#user-name').html(post.user);
            $('#post-content').html(post.content);
            $('#created-at').html(post.created);
            $('#post-id').val(id);
            $('#comments').html('');
            $.each(post.comments, function(key, value) {
                $('#comments').append('<div class="well"><p>' + value.content + '</p><h6>By: ' + value.user + ' - ' + value.date + '<a href="/admin/comment/' + value.id + '/edit"><i class="fa fa-pencil"></i></a></h6></div>')
            })
        });
        $('#post-modal').modal('show');
    });

    $('#post-reply').on('click', function() {
        tinyMCE.triggerSave();
        var replyContent = $('textarea#reply').val();
        $.ajax({
            url: '/admin/posts/' + $('#post-id').val() + '/add-comment',
            type: "POST",
            dataType: "json",
            data: {
                'content' : replyContent
            }
        }).done(function( json ) {
            if(json == 'success') {
                $('#comments').append('<div class="well">' + replyContent + '</div>');
                tinyMCE.activeEditor.setContent('');
            }
        });
    });
</script>
@endpush