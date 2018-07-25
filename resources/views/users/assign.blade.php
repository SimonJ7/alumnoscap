@extends('layouts.main')

@section('title', 'Asignar curso') 

@section('content')

@if(session()->has('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>{{ session()->get('error') }}</strong>
  </div>
@endif



<form action="{{ url('/usuarios/grabar') }}" method="post">
      <input name="_token" type="hidden" value="{{ csrf_token() }}" />
      <input name="id_user" type="hidden" value="{{ \Crypt::encrypt($id_user) }}" />
      
      <section>
         <h2>Especialidades</h2>
         <div class="row">
            @foreach($specialties as $key => $spe)
               <div class="col-sm-3">
                  <div class="form-group">
                     <label class="checkbox-inline">
                     <input type="checkbox" name="courses[]" value="{{\Crypt::encrypt($spe->id)}}" @if($spe->assign === true) {{'checked'}} @endif>
                        {{$spe->name}}
                        <span id="specialtiesHelpBlock" class="help-block">Centro: {{$spe->center}}</span>
                     </label>
                  </div>
               </div>
            @endforeach
         </div>   
      </section> 
   
      <section>
         <h2>Cursos cortos</h2>
         <div class="row">
            @foreach($short_courses as $key => $sh)
               <div class="col-sm-3">
                  <div class="form-group">
                     <label class="checkbox-inline">
                     <input type="checkbox" name="courses[]" value="{{\Crypt::encrypt($sh->id)}}" @if($sh->assign === true) {{'checked'}} @endif>
                        {{$sh->name}}
                        <span id="specialtiesHelpBlock" class="help-block">Centro: {{$sh->center}}</span>
                     </label>
                  </div>
               </div>
            @endforeach
         </div>   
      </section>

   



      <div class="form-group row">
        <div class="offset-4 col-8">
          <button name="submit" type="submit" class="btn btn-primary">Grabar</button>
        </div>
      </div>
    </form>




@endsection



