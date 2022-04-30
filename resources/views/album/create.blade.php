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
                        <li class="breadcrumb-item active">new album</li>
                    </ol>
                </div>
                <h4 class="page-title">Create Album</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-lg-6 mt-4">
                        <h4 class="header-title">Set up your Album</h4>
                        <form action="/album/create" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="Album"><i class="mdi mdi-tag-multiple"></i> Album Name</label>
                                <input type="text" class="form-control" name="albumname" id="Album" autocomplete="off">
                                <span class="sub-header"></span>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="Artist"><i class="mdi mdi-account"></i> Artist</label>
                                        <input type="text" class="form-control" name="artistname" id="Artist" autocomplete="off">
                                        <span class="sub-header"></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="Year"><i class="mdi mdi-calendar"></i> Year</label>
                                        <input type="text" class="form-control" name="year" id="Year" autocomplete="off">
                                        <span class="sub-header"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" style="display:none;">
                                <label for="album-art"><i class="mdi mdi-calendar"></i> Album Art</label>
                                <input type="file" class="form-control" name="albumart" id="album-art">
                                <span class="sub-header"></span>
                            </div>
                            <div class="form-group">
                                <label for="description"><i class="mdi mdi-white-balance-incandescent"></i>
                                    Description</label>
                                <textarea class="form-control" name="description" id="description"></textarea>
                                <span class="sub-header">Describe something about your album</span>
                            </div> 
                            <p class="sub-header">
                                By creating an <strong>Album</strong>, you agree to the Terms of Service. For more information about playsfy privacy practices, see the playsfy Privacy Statement.
                            </p>

                            <button type="submit" class="btn btn-dark waves-effect waves-light">Submit</button>
                        </form>
                    </div>

                    <div class="col-lg-6 mt-4">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <div style="position: relative;text-align: center;margin-top: 6em;">
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
                    <script>
                        $('#uploadbtn').click(function(){
                            $('#album-art').click();
                        })
                    </script>
                </div>
            </div>
        </div>
    </div>
@stop
