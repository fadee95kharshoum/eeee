<!-- Sidebar-right-->
<div class="sidebar sidebar-left sidebar-animate">
    <div class="panel panel-primary card mb-0 box-shadow">
        <div class="tab-menu-heading border-0 p-3">
            <div class="card-title mb-0">Achievements</div>
            <div class="card-options mr-auto">
                <a href="#" class="sidebar-remove"><i class="fe fe-x"></i></a>
            </div>
        </div>
        <div class="panel-body tabs-menu-body latest-tasks p-0 border-0">
            <div class="tabs-menu ">
                <!-- Tabs -->
                <ul class="nav panel-tabs">
                    <li><a href="#side1" class="active" data-toggle="tab"><i
                                class="ion ion-md-notifications tx-18  ml-2"></i> Pendding Requests</a></li>
                    <li class=""><a href="#side2" data-toggle="tab"><i
                                class="ion ion-md-chatboxes tx-18 ml-2"></i>Messages</a></li>

                </ul>
            </div>
            <div class="tab-content">

                <div class="tab-pane active " id="side1">
                    @if (!empty($countPenddingUploadedCards))
                        @foreach ($countPenddingUploadedCards as $uploaded)
                            <div class="list d-flex align-items-center border-bottom p-3">
                                <div>
                                    <span class="avatar bg-danger brround avatar-md">{{ $uploaded->type->name }}</span>
                                </div>
                                <a class="wrapper w-100 mr-3" href="#">
                                    <p class="mb-0 d-flex text-dark">
                                        <b>Your {{ $uploaded->type->card->name }} Card Under Processing </b>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-clock text-muted ml-1"></i>
                                            <small
                                                class="text-muted ml-auto">{{ $uploaded->created_at->diffForHumans() }}</small>
                                            <p class="mb-0"></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="tab-pane" id="side2">
                    @if (!empty($messages))
                        @foreach ($messages as $message)
                            <div class="list-group list-group-flush ">
                                <div class="text-muted small text-left ml-4">
                                    <p class="badge badge-success">From Admin</p>
                                </div>
                                <div class="list-group-item d-flex align-items-center">
                                    <div class="ml-3">
                                        <span class="avatar avatar-lg brround cover-image"
                                            data-image-src="{{ URL::asset('backend/assets/img/faces/12.jpg') }}">
                                            <span class="avatar-status bg-success"></span>
                                        </span>
                                    </div>
                                    <div>
                                        <p>{{ $message}}</p>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!--/Sidebar-right-->
