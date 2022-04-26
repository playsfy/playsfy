<div class="row">
    <div class="col-xl-12">
        <div class="input-group">
            <span class="input-group-prepend">
                <button type="button" class="btn waves-effect waves-light btn-dark"><i
                        class="fas fa-search"></i></button>
            </span>
            <input type="text" wire:model="search" class="form-control" placeholder="Search">
            <span class="input-group-append">
                <a href="/album/new" class="btn waves-effect waves-light btn-dark"><i
                        class="mdi mdi-shield-star-outline"></i> New Album</a>
            </span>
        </div>
    </div><br><br><br>
    @forelse ($albums as $album)
        <div class="col-xl-4 col-md-6">
            <div class="card widget-box-three border border-dark">
                <div class="card-body">
                    <a href="/{{ $user->username }}/albums/{{ $album->identifier }}">
                        <div class="bg-icon float-left avatar-lg text-center bg-light rounded-circle">
                            @if($album->art)

                            @else
                            <i class="ti-star h2 text-warning m-0 avatar-title"></i>
                            @endif
                        </div>
                        <div class="text-right">

                            <p class="font-weight-medium text-dark text-truncate">{{ $album->title }}</p>

                            <span class="sub-title text-muted">{{ substr($album->description, 0, 30) . '...' }}</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-xl-12 col-md-12">
            <div class="card widget-box-three">
                <div class="card-body">
                    <center>
                        <h6>~{{ $user->username }} doesn’t have any Albums. (that match) </h6>
                    </center>
                </div>
            </div>
        </div>
    @endforelse
</div>
