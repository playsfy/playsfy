<meta charset="utf-8" />
<title>
    @if (Auth::user()) • {{ Auth::user()->username }} @endif •
    playsfy •
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="playsfy" name="author" />
<meta content="Analyze Rating to your product & organization" name="description" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link rel="icon" href="{{ asset('assets/images/playsfy_white.svg') }}" sizes="any" type="image/svg+xml">

@livewireStyles
