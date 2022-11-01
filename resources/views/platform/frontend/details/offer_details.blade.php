@if($request->has_part)

@include('includes.platform.frontend.offers.parts_holder')

@endif 


@if(!$request->has_part)

@include('includes.platform.frontend.offers.no_parts')

@endif