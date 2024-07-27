<div class="modal fade" id="modal-room-detail">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <div class="card">
                    <img src="" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <h5 class="card-title mb-0"></h5>
                        <h5 class="card-sub-title h6"></h5>
                        <pre class="description"></pre>
                        <pre class="remark"></pre>
                        <pre class="term_condition"></pre>
                        <pre class="room_facilities"></pre>
                        @auth
                            <a href="#" class="btn btn-primary btn-reserve" data-dismiss="modal">Reserve</a>
                        @else
                            <a role="button" href="{{route('login')}}" class='btn btn-sm btn-primary'>Reserve</a>
                        @endauth
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>