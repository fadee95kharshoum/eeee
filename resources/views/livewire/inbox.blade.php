<div class="col-lg-8 col-xl-9 col-md-12">
    <div class="card">
        <div class="main-content-body main-content-body-mail card-body">
            <div class="main-mail-header">
                <div>
                    <h4 class="main-content-title mg-b-5">الصندوق الوارد</h4>
                    <p>يمكنك إدارة الرسائل والشكاوي من هنا</p>
                </div>

                <div>
                    <span>1-50 of 1200</span>
                    <span></span>
                    <div class="btn-group" role="group">
                        <button class="btn btn-outline-secondary disabled" type="button">
                            <i class="icon ion-ios-arrow-forward"></i>
                        </button>
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="icon ion-ios-arrow-back"></i>
                        </button>
                    </div>
                </div>
            </div><!-- main-mail-list-header -->
            <div class="main-mail-options">
                <label class="ckbox"><input id="checkAll" type="checkbox"> <span></span></label>
                <div class="btn-group">
                    <button class="btn btn-light"><i class="bx bx-refresh"><a href="#"></a></i>
                    </button>
                    <button class="btn btn-light disabled"><i class="bx bx-archive"></i>
                    </button>
                    <button class="btn btn-light disabled"><i class="bx bx-info-circle"></i>
                    </button>
                    <button class="btn btn-light disabled"><i class="bx bx-trash"></i>
                    </button> <button class="btn btn-light disabled"><i class="bx bx-folder-open"></i>
                    </button>
                    <button class="btn btn-light disabled"><i class="bx bx-purchase-tag-alt"></i>
                    </button>
                </div><!-- btn-group -->
            </div><!-- main-mail-options -->
            <div class="main-mail-list">
                @foreach ($messages as $message)
                    <div class="main-mail-item">
                        <div class="main-mail-checkbox">
                            <label class="ckbox"><input type="checkbox"> <span></span></label>
                        </div>
                        <div class="main-mail-star">
                            <i class="typcn typcn-star"></i>
                        </div>
                        <div class="main-avatar bg-gray-800">
                            {{ $message->name[0] }}
                        </div>
                        <div class="main-mail-body">
                            <div class="main-mail-from">
                                {{ $message->name }}
                            </div>
                            <div class="main-mail-subject">
                                <strong>{{ $message->case }} <br></strong> <span>{{ $message->subject }}</span>
                            </div>
                        </div>
                        <div class="main-mail-date">
                            {{ $message->created_at->diffForHumans() }}
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </div>
    </div>
</div>
