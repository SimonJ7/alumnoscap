@extends('layouts.main')

@section('content')

<div class="container">
   <div class="row">
      {!! $districtsReport->render() !!}
   </div>
   <div class="row">
      {!! $genderReport->render() !!}
   </div>
   <div class="row">
      {!! $specialtiesReport->render() !!}
   </div>

   <div class="row">
      {!! $short_coursesReport->render() !!}
   </div>

   <div class="row">
      {!! $coursesTypeReport->render() !!}
   </div>


   
</div>


@endsection


@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
@endsection