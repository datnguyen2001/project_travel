@if (isset($slick) && $slick)
    <link rel="stylesheet" href="{{asset('web/slick/slick.css')}}">
@endif

@if (isset($sweetalert) && $sweetalert)
    <link rel="stylesheet" href="{{asset('web/sweetalert2/sweetalert2.min.css')}}">
@endif

@if (isset($select2) && $select2)
    <link rel="stylesheet" href="{{asset('web/select2/css/select2.min.css')}}">
@endif
