@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">playsfy</a></li>
                        <li class="breadcrumb-item"><a href="/{{ $user->username }}">~{{ $user->username }}</a></li>
                        <li class="breadcrumb-item active">albums</li>
                    </ol>
                </div>
                <h4 class="page-title">Albums</h4>
            </div>
        </div>
    </div>
    @livewire('album.album-list', ['userid' => $user->id])
@stop
