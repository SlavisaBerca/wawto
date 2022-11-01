@if($request->has_part)

@include('includes.platform.frontend.requests.part_holder')

@endif


@if(!$request->has_part)

@include('includes.platform.frontend.requests.no_parts')


@endif