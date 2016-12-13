<div class="post-modal modal fade" id="post-modal" tabindex="-1" role="dialog" aria-labelledby="post-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>
                    <span id="title"> </span>
                    <small class="text-right">
                        By <span id="user-name"></span>
                    </small>
                    <small class="pull-right">
                        <span><i class="fa fa-calendar"></i>
                            <span id="created-at"> </span>
                        </span>
                    </small>
                </h3>
            </div>
            <div class="modal-body">
                <div id="post-content"></div>
                <div id="comments"></div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 well">
                        <input id="post-id" type="hidden" value="" />
                        <textarea rows="4" id="reply"></textarea>
                        <button id="post-reply" class="btn btn-block btn-raised btn-info">Add Comment</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>