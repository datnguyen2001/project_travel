@if (isset($slick) && $slick)
    <script src="{{asset('web/slick/slick.min.js')}}"></script>
@endif

@if (isset($sweetalert) && $sweetalert)
    <script src="{{asset('web/sweetalert2/sweetalert2.min.js')}}"></script>
@endif

@if (isset($select2) && $select2)
    <script src="{{asset('web/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('web/select2/js/i18n/vi.js')}}"></script>
@endif



