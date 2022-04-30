@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">playsfy</a></li>
                        <li class="breadcrumb-item"><a
                                href="/{{ Auth::user()->username }}">~{{ Auth::user()->username }}</a></li>
                        <li class="breadcrumb-item active">album info</li>
                    </ol>
                </div>
                <h4 class="page-title">Album Info</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-lg-6 mt-4">
                        <h4 class="header-title">{{$album->title}}</h4>
                            <small>{{$album->artist}}</small> @
                            <small>{{$album->year}}</small>
                         <p>{{$album->description}}</p>
 

                        <div class="card card-border card-dark">
                            <div class="card-header border-dark bg-transparent"> 
                                <p>Ullam Urukuthaiya...</p>
                                
                            </div>
                        </div>


                    </div>

                    <div class="col-lg-6 mt-4">

                        <div style="position: relative;text-align: center;">
                            <img width="200" class="rounded-circle"
                                src="https://avatar.tobi.sh/tobiaslins.svg?size=180&text=Album">
                            <div class="btn-group show" style="margin-left: -25px;">
                                <button type="button" class="btn btn-secondary dropdown-toggle waves-effect"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i
                                        class="mdi mdi-lead-pencil"></i><i class="mdi mdi-chevron-down"></i></button>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)" data-toggle="modal" data-target="#card-image"
                                            class="dropdown-item" id="uploadbtn">Upload a photo </a></li>
                                </ul>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
@stop
