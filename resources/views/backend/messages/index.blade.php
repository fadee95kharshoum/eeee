@extends('backend.layouts.master')
@section('css')
    {{-- @livewireStyles() --}}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">بريد الرسائل</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                    جميع الرسائل والمحادثات</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
				<!-- row -->
				<div class="row row-sm main-content-mail">
					<div class="col-lg-4 col-xl-3 col-md-12">
						<div class="card mg-b-20 mg-md-b-0">
							<div class="card-body">
								<div class="main-content-left main-content-left-mail">
									<a class="btn btn-main-primary btn-compose" href="" id="btnCompose">Compose</a>
									<div class="main-mail-menu">
										<nav class="nav main-nav-column mg-b-20">
                                            <a class="nav-link active" href=""><i class="bx bxs-inbox"></i> الصندوق الوارد<span>20</span></a>
                                            <a class="nav-link" wire:model="messages" href=""><i class="bx bx-star"></i> مميزة بنجمة<span>3</span></a>
                                            <a class="nav-link" href="{{ route('getOtherMessage', 'Important') }}"><i class="bx bx-bookmarks"></i> هام <span>10</span></a>
                                            <a class="nav-link" href=""><i class="bx bx-send"></i> المرسلة <span>8</span></a>
											<a class="nav-link" href=""><i class="bx bx-message-error"></i> اعلانات ترويجية<span>128</span></a>
                                                <a class="nav-link" href=""><i class="bx bx-edit"></i> مسودات <span>15</span></a>
                                        </nav>
                                            <label class="main-content-label main-content-label-sm">Label</label>
										<nav class="nav main-nav-column mg-b-20">

                                                <a class="nav-link" href=""><i class="bx bx-trash"></i> سلة المهملات <span>6</span></a>
                                            {{-- <a class="nav-link" href="#"><i class="bx bx-folder-plus"></i> Updates <span>17</span></a> --}}
										</nav>
                                        {{-- <label class="main-content-label main-content-label-sm">Tags</label> --}}
										{{-- <nav class="nav main-nav-column">
											<a class="nav-link" href="#"><i class="bx bxl-twitter"></i> Twitter <span>2</span></a> <a class="nav-link" href="#"><i class="bx bxl-github"></i> Github <span>32</span></a> <a class="nav-link" href="#"><i class="bx bxl-google-plus"></i> Google <span>7</span></a>
										</nav> --}}
									</div><!-- main-mail-menu -->
								</div>
							</div>
						</div>
					</div>
                            {{-- ###########################################3333 --}}
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

					<div class="main-mail-compose">
						<div>
							<div class="container">
								<div class="main-mail-compose-box">
									<div class="main-mail-compose-header">
										<span>New Message</span>
										<nav class="nav">
											<a class="nav-link" href=""><i class="fas fa-minus"></i></a> <a class="nav-link" href=""><i class="fas fa-compress"></i></a> <a class="nav-link" href=""><i class="fas fa-times"></i></a>
										</nav>
									</div>
									<div class="main-mail-compose-body">
										<div class="form-group">
											<label class="form-label">To</label>
											<div>
												<input class="form-control" placeholder="Enter recipient's email address" type="text">
											</div>
										</div>
										<div class="form-group">
											<label class="form-label">Subject</label>
											<div>
												<input class="form-control" type="text">
											</div>
										</div>
										<div class="form-group">
											<textarea class="form-control" placeholder="Write your message here..." rows="8"></textarea>
										</div>
										<div class="form-group mg-b-0">
											<nav class="nav">
												<a class="nav-link" data-toggle="tooltip" href="" title="Add attachment"><i class="fas fa-paperclip"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Add photo"><i class="far fa-image"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Add link"><i class="fas fa-link"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Emoticons"><i class="far fa-smile"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Discard"><i class="far fa-trash-alt"></i></a>
											</nav><button class="btn btn-primary">Send</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div><!-- container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
    <!-- Moment js -->
    <script src="{{ URL::asset('backend/assets/plugins/raphael/raphael.min.js') }}"></script>
    <!--- Internal Check-all-mail js -->
    <script src="{{ URL::asset('backend/assets/js/check-all-mail.js') }}"></script>
    <!--Internal Apexchart js-->
    <script src="{{ URL::asset('backend/assets/js/apexcharts.js') }}"></script>
    {{-- <script>
    $('#modaldemo8').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var user_id = button.data('user_id')
        var username = button.data('username')
        var modal = $(this)
        modal.find('.modal-body #user_id').val(user_id);
        modal.find('.modal-body #username').val(username);
    })
</script> --}}
    {{-- @livewireScripts() --}}
@endsection
