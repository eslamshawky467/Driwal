@foreach($dat as $item)
    {{--    {{var_dump($item)}}--}}
    {{$item->location}}
    <br>
    {{$item->lang}}
    <br>
    {{$item->lat}}
    <br>
    https://www.google.com/maps/place/30%C2%B017'56.7%22N+31%C2%B035'22.0%22E/@ {{$item->lang}}, {{$item->lat}},17z/data=!3m1!4b1!4m5!3m4!1s0x0:0xd0978a16a4c85c94!8m2!3d30.2990688!4d31.5894509


    <br>

@endforeach

{{--<h1>--}}
{{--    @foreach( $dat[0] as $item)--}}
{{--    {{($dat[0]->location)}}--}}
{{--        @foreach()--}}
{{--</h1>--}}
{{--<h1>--}}
{{--    --}}{{--    @foreach( $dat[0] as $item)--}}
{{--    {{($dat[0]->lang)}}--}}
{{--    --}}{{--        @foreach()--}}
{{--</h1>--}}
{{--<h1>--}}
{{--    --}}{{--    @foreach( $dat[0] as $item)--}}
{{--    {{($dat[0]->lat)}}--}}
{{--    --}}{{--        @foreach()--}}
{{--</h1>--}}
