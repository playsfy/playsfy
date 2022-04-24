@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">playsfy</a></li>
                        <li class="breadcrumb-item"><a href="/{{ $user->username }}">~{{ $user->username }}</a></li>
                        <li class="breadcrumb-item"><a href="/{{ $user->username }}/queues">Queues</a></li>
                        <li class="breadcrumb-item active">{{ $queue->identifier }}</li>
                    </ol>
                </div>
                <h4 class="page-title">Rating Queue</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h3>{{ $queue->name }}</h3>
                <hr>
                <ul class="nav nav-tabs tabs-bordered" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-b1-tab" data-toggle="tab" href="#home-b1" role="tab"
                            aria-controls="home-b1" aria-selected="false">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">General</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-b1-tab" data-toggle="tab" href="#profile-b1" role="tab"
                            aria-controls="profile-b1" aria-selected="true">
                            <span class="d-block d-sm-none"><i id="tooltip-html" class="mdi mdi-qrcode-scan"></i></span>
                            <span class="d-none d-sm-block">Link Device</span>
                        </a>
                    </li>
                    @if (Auth::user()->id == $queue->user_id)
                        <li class="nav-item">
                            <a class="nav-link" id="setting-b1-tab" data-toggle="tab" href="#setting-b1" role="tab"
                                aria-controls="setting-b1" aria-selected="false">
                                <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                <span class="d-none d-sm-block">Settings</span>
                            </a>
                        </li>
                    @endif
                </ul>
                <div class="tab-content">
                    <div class="tab-pane  show active" id="home-b1" role="tabpanel" aria-labelledby="home-b1-tab">
                        <div class="row">
                            <div class="col-xl-7 col-md-6">
                                <span class="sub-title text-muted">{{ $queue->description }}</span>

                                <hr>
                                Rating Queue Type : <strong>{{ $queue->type }}</strong>
                                <hr>
                                Rating Interval : <strong>
                                @if ($queue->interval) {{ $queue->interval }} @else 0
                                    @endif
                                </strong>
                            </div>
                            <div class="col-xl-5 col-md-6">
                                @livewire('components.doughnut-chart', ['queue' =>$queue->id])
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="profile-b1" role="tabpanel" aria-labelledby="profile-b1-tab">
                        <div class="row">
                            <div class="col-xl-8 col-md-6">
                                <div class="input-group mt-3">
                                    <span class="input-group-prepend">
                                        <button type="button" class="btn waves-effect waves-light btn-dark"
                                            onclick="window.open('{{ url('/~/' . $queue->identifier) }}', '_blank', 'location=yes,height=770,width=1320,scrollbars=yes,status=yes');">Open
                                            Window</button>
                                    </span>
                                    <input type="text" disabled class="form-control"
                                        value="{{ url('/~/' . $queue->identifier) }}">
                                    <span class="input-group-append">
                                        <button onclick="copyToClipboard('{{ url('/~/' . $queue->identifier) }}')"
                                            type="button" class="btn waves-effect waves-light btn-dark"
                                            data-placement="bottom" data-toggle="tooltip" class="tooltips"
                                            data-original-title="Copy URL"><i class="fas fa-clipboard"></i></button>
                                    </span>
                                </div>
                                <br>
                                <div class="card widget-box-one border border-success bg-soft-success">
                                    <div class="card-body">
                                        <strong>Link Your Device</strong>
                                        <p>Open your device camera to scan this QRCode it will open a browser. Turn on full
                                            screen mode and increase your backlight setting.</p>
                                        <strong class="text-warning">We'll release ios and android apps soon.</strong>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-4 col-md-6">
                                @livewire('components.qr-code', ['uniqueid' => $queue->identifier])
                            </div>
                        </div>
                    </div>
                    @if (Auth::user()->id == $queue->user_id)
                        <div class="tab-pane" id="setting-b1" role="tabpanel" aria-labelledby="setting-b1-tab">

                            <div class="card widget-box-one border border-default bg-soft-default">
                                <div class="card-header bg-light">
                                    <h3 class="card-title mb-0">Update General Info</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <form action="">
                                                <label class="mb-0">Queue name</label>
                                                <div class="input-group mt-1">
                                                    <input type="text" id="qname" name="qname" class="form-control"
                                                        value="{{ $queue->name }}" placeholder="Queue Name" required>
                                                    <span class="input-group-append">
                                                        <button type="submit"
                                                            class="btn waves-effect waves-light btn-dark">Rename</button>
                                                    </span>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-6">
                                            <form action="">
                                                <label class="mb-0">Interval <small>milliseconds (1000ms =
                                                        1second)</small></label>
                                                <div class="input-group mt-1">
                                                    <input type="number" max="60000" min="1000" step="1000" id="interval"
                                                        name="interval" class="form-control"
                                                        value="{{ $queue->interval }}" placeholder="Queue Interval"
                                                        required>
                                                    <span class="input-group-append">
                                                        <button type="submit"
                                                            class="btn waves-effect waves-light btn-dark">Update</button>
                                                    </span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <form action="">
                                                <br>
                                                <div class="form-group">
                                                    <label class="mb-1">Description</label>
                                                    <textarea name="" class="form-control"
                                                        rows="4">{{ $queue->description }}</textarea>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card widget-box-one border border-danger bg-soft-danger">
                                <div class="card-header bg-danger">
                                    <h3 class="card-title text-white mb-0">Danger Zone</h3>
                                </div>
                                <div class="card-body">
                                    <strong>Transfer ownership</strong>
                                    <p>Transfer this queue to another user or to an organization where you have the ability
                                        to
                                        create repositories.</p>
                                    <button data-toggle="modal" data-target="#TransferModal"
                                        class="btn btn-danger btn-sm float-right">Transfer</button>
                                    <br>
                                    <hr>
                                    <strong>Delete this Queue</strong>
                                    <p>Once you delete a queue, there is no going back. Please be certain.</p>
                                    <br>
                                    <button data-toggle="modal" data-target="#DeleteModal"
                                        class="btn btn-danger btn-sm float-right">Delete this queue</button>
                                </div>
                            </div>

                            <div id="TransferModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"
                                style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content p-0 b-0">
                                        <div class="card mb-0">
                                            <div class="card-header bg-secondary">
                                                <h5 class="modal-title font-18 text-white float-left mt-0">Transfer
                                                    ownership
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="card-body">
                                                <form action="/queue/transfer/{{ $queue->id }}" method="post">
                                                    @csrf

                                                    @livewire('components.find-username')

                                                    <button style="submit"
                                                        class="btn btn-sm btn-danger float-right ml-3">Transfer</button>
                                                    <button style="button" data-dismiss="modal"
                                                        class="btn btn-sm btn-dark float-right ml-3">Cancel</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <div id="DeleteModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"
                                style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content p-0 b-0">
                                        <div class="card mb-0">
                                            <div class="card-header bg-secondary">
                                                <h5 class="modal-title font-18 text-white float-left mt-0">Delete Queue
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="card-body">
                                                <form action="/queue/delete/{{ $queue->id }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <h5>Are you absolutely sure?</h5>
                                                    <p>This action cannot be undone. This will permanently delete the
                                                        {{ $queue->name }}, rating related data.</p>

                                                    Please reconsider about
                                                    <strong>{{ Auth::user()->username }}/{{ $queue->identifier }}</strong>
                                                    queue to confirm.

                                                    <br><br>

                                                    <button style="submit"
                                                        class="btn btn-sm btn-danger float-right ml-3">Delete</button>
                                                    <button style="button" data-dismiss="modal"
                                                        class="btn btn-sm btn-dark float-right ml-3">Cancel</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
