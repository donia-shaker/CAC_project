@extends('admin.layout.dashboard')
@section('content')


<section>
  <div class="dash-header col-lg-11  col-10 m-auto mt-5 d-flex justify-content-center align-items-center">

 
<div class="dash-header1 col-8">
<h4 class=" p-3"><em class="text-warning">مرحبا!!</em> {{Auth::user()->name}} </h4>
<h5> التقارير اليومية للموقع </h5>
</div>

<div class="dash-header2 col-4">

  <p class="hour ">
    @php
    print_r( date('H:i:s'))
  
  @endphp
  
  </p>
  <p>
@php
   print_r( date('Y-m-d'))

@endphp
</p>


</div>
 </div>

<div class="dash-content d-flex flex-wrap">
<div>

</div>
</div>


</section>


@endsection
                