@extends('admin.layout.dashboard')
@section('content')


<section>
  <div class="dash-header col-11 m-auto mt-5 d-flex justify-content-center align-items-center">

 
<div class="dash-header1 col-6">
<p class="fs-4 p-3"><em class="text-warning">مرحبا!!</em> {{Auth::user()->name}} </p>
<p> التقارير اليومية للموقع </p>
</div>

<div class="dash-header2 col-4">
  <p>
@php
   print_r( date('Y-m-d'))

@endphp
</p>
<p>
  @php
  print_r( date('H:i:s'))

@endphp

</p>

</div>
 </div>

</section>


@endsection
                