@extends('layouts.main')

@section('title', 'Registrar nuevo usuario') 

@section('content')

@if(session()->has('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>{{ session()->get('error') }}</strong>
  </div>
@endif


<div class="container">
      
      form action="{{ url('/usuarios/guardar') }}" method="post">
      <input name="_token" type="hidden" value="{{ csrf_token() }}" />
      <div class="row">
      <legend>Datos de la o el participante</legend>
        <div class="col-md-4 mb-3">
          <label for="firstname" class="col-8 col-form-label">Apellido Paterno</label> 
          <div class="mb-3">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-address-card"></i>
              </div> 
              <input id="firstname" name="firstname" type="text" class="form-control" value="{{ old('firstname') }}">
            </div>
            @if ($errors->has('firstname'))
              <small class="text-danger">
                {{ $errors->first('firstname') }}
              </small> 
          @else
              <small class="text-muted">
                Campo requerido, minimo 3 caracteres maximo 60
              </small> 
          @endif
          </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="lastname" class="col-8 col-form-label">Apellido Materno</label> 
            <div class="mb-3">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-address-card"></i>
                </div> 
                <input id="lastname" name="lastname" type="text" class="form-control" value="{{ old('lastname') }}">
              </div>
              @if ($errors->has('lastname'))
                <small class="text-danger">
                   {{ $errors->first('lastname') }}
                </small> 
             @else
                <small class="text-muted">
                   Campo requerido, minimo 3 caracteres maximo 60
                </small> 
             @endif
            </div>
        </div>
        <div class="col-md-4 mb-3">
          <label for="name" class="col-4 col-form-label">Nombres</label> 
          <div class="mb-3">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-address-card"></i>
              </div> 
              <input id="name" name="name" type="text" class="form-control" value="{{ old('name') }}">
            </div>
            @if ($errors->has('name'))
              <small class="text-danger">
                 {{ $errors->first('name') }}
              </small> 
           @else
              <small class="text-muted">
                 Campo requerido, minimo 3 caracteres maximo 60
              </small> 
           @endif
          </div>
        </div>
      </div>
      <div class="row">
          <legend>Lugar de nacimiento</legend>
          <div class="col-md-6 mb-3">
              <label for="birth_country" class="col-4 col-form-label">Pais</label> 
              <div class="mb-3">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-address-card"></i>
                  </div> 
                  <input id="birth_country" name="birth_country" type="text" class="form-control" value="{{ old('birth_country') }}">
                </div>
           @if ($errors->has('birth_country'))
              <small class="text-danger">
                 {{ $errors->first('birth_country') }}
              </small> 
           @else
              <small class="text-muted">
                 Campo requerido, minimo 3 caracteres maximo 60
              </small> 
           @endif
              </div>
          </div>
          <div class="col-md-6 mb-3">
              <label for=" birth_department" class="col-4 col-form-label">Departamento</label> 
              <div class="mb-3">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-address-card"></i>
                  </div> 
                  <input id="birth_department" name="birth_department" type="text" class="form-control" value="{{ old('birth_department') }}">
                </div>
           @if ($errors->has('birth_department'))
              <small class="text-danger">
                 {{ $errors->first('birth_department') }}
              </small> 
           @else
              <small class="text-muted">
                 Campo requerido, minimo 3 caracteres maximo 60
              </small> 
           @endif
              </div>
          </div>
      </div>
          <div class="form-group row">
            <div class="col-md-6 mb-3">
                <label for="birth_province" class="col-4 col-form-label">Provincia</label> 
                <div class="mb-3">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-address-card"></i>
                    </div> 
                    <input id="birth_province" name="birth_province" type="text" class="form-control" value="{{ old('birth_province') }}">
                  </div>
             @if ($errors->has('birth_province'))
                <small class="text-danger">
                   {{ $errors->first('birth_province') }}
                </small> 
             @else
                <small class="text-muted">
                   Campo requerido, minimo 3 caracteres maximo 60
                </small> 
             @endif
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="birth_locality" class="col-4 col-form-label">Localidad</label> 
                <div class="mb-3">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-address-card"></i>
                    </div> 
                    <input id="birth_locality" name="birth_locality" type="text" class="form-control" value="{{ old('birth_locality') }}">
                  </div>
             @if ($errors->has('birth_locality'))
                <small class="text-danger">
                   {{ $errors->first('birth_locality') }}
                </small> 
             @else
                <small class="text-muted">
                   Campo requerido, minimo 3 caracteres maximo 60
                </small> 
             @endif
                </div>
            </div>
          </div>
      <div class="form-group row">
      <legend>Documento de identidad</legend>
      <div class="col-md-6 mb-3">
          <label for="ci" class="col-4 col-form-label">CI</label> 
          <div class="mb-3">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-address-card"></i>
              </div> 
              <input id="ci" name="ci" type="text" class="form-control" value="{{ old('ci') }}">
            </div>
           @if ($errors->has('ci'))
              <small class="text-danger">
                 {{ $errors->first('ci') }}
              </small> 
           @else
              <small class="text-muted">
                 Campo requerido, minimo 3 caracteres maximo 60
              </small> 
           @endif
          </div>
      </div>
      <div class="col-md-6 mb-3">
          <label for="date" class="col-5 col-form-label">Fecha de Nacimiento</label> 
          <div class="mb-3">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-address-card"></i>
              </div> 
              <input id="birthdate" name="birthdate" type="date" class="form-control" value="{{ old('birthdate') }}">
            </div>
            @if ($errors->has('birthdate'))
              <small class="text-danger">
                 {{ $errors->first('birthdate') }}
              </small> 
           @else
              <small class="text-muted">
                 Seleccione su fecha de nacimiento
              </small> 
           @endif
          </div>
        </div>
      </div>
      
      
      
      <div class="col-md-8 row">
        <label class="col-4">Estado Civil</label> 
        <div class="mb-3">
          <label class="custom-control custom-radio">
            <input name="civil_status" type="radio" class="custom-control-input" value="Casado" @if(old('civil_status') == 'Casado') {{'checked'}} @endif> 
            <span class="custom-control-indicator"></span> 
            <span class="custom-control-description">Casado</span>
          </label>
          <label class="custom-control custom-radio">
            <input name="civil_status" type="radio" class="custom-control-input" value="Soltero" @if(old('civil_status') == 'Soltero') {{'checked'}} @endif> 
            <span class="custom-control-indicator"></span> 
            <span class="custom-control-description">Soltero</span>
          </label>
          <label class="custom-control custom-radio">
            <input name="civil_status" type="radio" class="custom-control-input" value="Viudo" @if(old('civil_status') == 'Viudo') {{'checked'}} @endif> 
            <span class="custom-control-indicator"></span> 
            <span class="custom-control-description">Viudo</span>
          </label>
          <label class="custom-control custom-radio">
            <input name="civil_status" type="radio" class="custom-control-input" value="Convive" @if(old('civil_status') == 'Convive') {{'checked'}} @endif> 
            <span class="custom-control-indicator"></span> 
            <span class="custom-control-description">Convive</span>
          </label>
          <label class="custom-control custom-radio">
            <input name="civil_status" type="radio" class="custom-control-input" value="Divorciado" @if(old('civil_status') == 'Divorciado') {{'checked'}} @endif> 
            <span class="custom-control-indicator"></span> 
            <span class="custom-control-description">Divorciado</span>
          </label>
        </div>
        @if ($errors->has('civil_status'))
            <small class="text-danger">
               {{ $errors->first('civil_status') }}
            </small> 
         @else
            <small class="text-muted">
               Seleccione una opcion
            </small> 
         @endif
      </div>
      <div class="col-md-4 row">
        <label class="col-4">Genero</label> 
        <div class="mb-3">
          <label class="custom-control custom-radio">
            <input name="gender" type="radio" class="custom-control-input" value="Masculino" @if(old('gender') == 'Masculino') {{'checked'}} @endif> 
            <span class="custom-control-indicator"></span> 
            <span class="custom-control-description">Masculino</span>
          </label>
          <label class="custom-control custom-radio">
            <input name="gender" type="radio" class="custom-control-input" value="Femenino" @if(old('gender') == 'Femenino') {{'checked'}} @endif> 
            <span class="custom-control-indicator"></span> 
            <span class="custom-control-description">Femenino</span>
          </label>
        </div>
        @if ($errors->has('gender'))
            <small class="text-danger">
               {{ $errors->first('gender') }}
            </small> 
         @else
            <small class="text-muted">
               Seleccione una opcion
            </small> 
         @endif
      </div>
      
      <div class="form-group row">
          <legend>Direccion actual del participante</legend>
        <div class="col-md-6 mb-3">
            <label for="address_department" class="col-4 col-form-label">Departamento</label> 
            <div class="mb-3">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-address-card"></i>
                </div> 
                <input id="address_department" name="address_department" type="text" class="form-control" value="{{ old('address_department') }}">
              </div>
             @if ($errors->has('address_department'))
                <small class="text-danger">
                   {{ $errors->first('address_department') }}
                </small> 
             @else
                <small class="text-muted">
                   Campo requerido, minimo 3 caracteres maximo 60
                </small> 
             @endif
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for=" address_province" class="col-4 col-form-label">Provincia</label> 
            <div class="mb-3">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-address-card"></i>
                </div> 
                <input id="address_province" name="address_province" type="text" class="form-control" value="{{ old('address_province') }}">
              </div>
             @if ($errors->has('address_province'))
                <small class="text-danger">
                   {{ $errors->first('address_province') }}
                </small> 
             @else
                <small class="text-muted">
                   Campo requerido, minimo 3 caracteres maximo 60
                </small> 
             @endif
            </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-6 mb-3">
            <label for="address_municipality" class="col-4 col-form-label">Municipio</label> 
            <div class="mb-3">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-address-card"></i>
                </div> 
                <input id="address_municipality" name="address_municipality" type="text" class="form-control" value="{{ old('address_municipality') }}">
              </div>
             @if ($errors->has('address_municipality'))
                <small class="text-danger">
                   {{ $errors->first('address_municipality') }}
                </small> 
             @else
                <small class="text-muted">
                   Campo requerido, minimo 3 caracteres maximo 60
                </small> 
             @endif
            </div>
        </div>
        <div class="col-md-6 mb-3">
          <label for=" address_locality" class="col-4 col-form-label">Localidad</label> 
          <div class="mb-3">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-address-card"></i>
              </div> 
              <input id="address_locality" name="address_locality" type="text" class="form-control" value="{{ old('address_locality') }}">
            </div>
          @if ($errors->has('address_locality'))
              <small class="text-danger">
                {{ $errors->first('address_locality') }}
              </small> 
          @else
              <small class="text-muted">
                Campo requerido, minimo 3 caracteres maximo 60
              </small> 
          @endif
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
            <label for="address_zone" class="col-4 col-form-label">Zona/Barrio</label> 
            <div class="mb-3">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-address-card"></i>
                </div> 
                <input id="address_zone" name="address_zone" type="text" class="form-control" value="{{ old('address_zone') }}">
              </div>
             @if ($errors->has('address_zone'))
                <small class="text-danger">
                   {{ $errors->first('address_zone') }}
                </small> 
             @else
                <small class="text-muted">
                   Campo requerido, minimo 3 caracteres maximo 60
                </small> 
             @endif
            </div>
          </div>
            <div class="col-md-6 mb-3">
                <label for="address_street" class="col-4 col-form-label">Avenida/Calle</label> 
                <div class="mb-3">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-address-card"></i>
                    </div> 
                    <input id="address_street" name="address_street" type="text" class="form-control" value="{{ old('address_street') }}">
                  </div>
                 @if ($errors->has('address_street'))
                    <small class="text-danger">
                       {{ $errors->first('address_street') }}
                    </small> 
                 @else
                    <small class="text-muted">
                       Campo requerido, minimo 3 caracteres maximo 60
                    </small> 
                 @endif
                </div>
            </div>
      </div>
      <div class="form-group row">
        <div class="col-md-3 mb-3">
            <label for="telephone" class="col-4 col-form-label">Telefono</label> 
            <div class="mb-3">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-address-card"></i>
                </div> 
                <input id="telephone" name="telephone" type="text" class="form-control" value="{{ old('telephone') }}">
              </div>
              @if ($errors->has('telephone'))
                <small class="text-danger">
                   {{ $errors->first('telephone') }}
                </small> 
             @else
                <small class="text-muted">
                   Campo requerido, minimo 3 caracteres maximo 30
                </small> 
             @endif
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <label class="col-4 col-form-label" for="cellphone">Celular</label> 
            <div class="mb-3">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-address-card"></i>
                </div> 
                <input id="cellphone" name="cellphone" type="text" class="form-control" value="{{ old('cellphone') }}">
              </div>
              @if ($errors->has('cellphone'))
                <small class="text-danger">
                   {{ $errors->first('cellphone') }}
                </small> 
             @else
                <small class="text-muted">
                   Campo requerido, minimo 3 caracteres maximo 30
                </small> 
             @endif
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label class="col-9 col-form-label" for="cellphone">Número de hijos</label> 
            <div class="mb-3">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-address-card"></i>
                </div> 
                <input id="sons" name="sons" type="number" class="form-control" value="{{ old('sons') }}">
              </div>
              @if ($errors->has('sons'))
                <small class="text-danger">
                   {{ $errors->first('sons') }}
                </small> 
             @else
                <small class="text-muted">
                   Campo requerido, minimo 0
                </small> 
             @endif
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <label class="col-4 col-form-label" for="district">Distrito</label> 
            <div class="mb-3">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-address-card"></i>
                </div> 
                <select name="district" id="district" class="form-control">
                  <option value="1" @if(old('district') == '1') {{'selected'}} @endif>1</option>
                  <option value="2" @if(old('district') == '2') {{'selected'}} @endif>2</option>
                  <option value="3" @if(old('district') == '3') {{'selected'}} @endif>3</option>
                  <option value="4" @if(old('district') == '4') {{'selected'}} @endif>4</option>
                  <option value="5" @if(old('district') == '5') {{'selected'}} @endif>5</option>
                  <option value="6" @if(old('district') == '6') {{'selected'}} @endif>6</option>
                  <option value="7" @if(old('district') == '7') {{'selected'}} @endif>7</option>
                  <option value="8" @if(old('district') == '8') {{'selected'}} @endif>8</option>
                  <option value="9" @if(old('district') == '9') {{'selected'}} @endif>9</option>
                  <option value="10" @if(old('district') == '10') {{'selected'}} @endif>10</option>
                  <option value="11" @if(old('district') == '11') {{'selected'}} @endif>11</option>
                  <option value="12" @if(old('district') == '12') {{'selected'}} @endif>12</option>
                  <option value="13" @if(old('district') == '13') {{'selected'}} @endif>13</option>
                </select>
              </div>
              @if ($errors->has('district'))
                <small class="text-danger">
                   {{ $errors->first('district') }}
                </small> 
             @else
                <small class="text-muted">
                   Campo requerido, minimo 3 caracteres maximo 30
                </small> 
             @endif
            </div>
          </div>
      </div>
      

      <div class="form-group row">
        <legend>Referencia</legend>
        <div class="col-md-6 mb-3">
            <label class="col-5 col-form-label" for="reference_name">Nombre y Apellido</label> 
            <div class="mb-3">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-address-card"></i>
                </div> 
                <input id="reference_name" name="reference_name" type="text" class="form-control" value="{{ old('reference_name') }}">
              </div>
              @if ($errors->has('reference_name'))
                <small class="text-danger">
                   {{ $errors->first('reference_name') }}
                </small> 
             @else
                <small class="text-muted">
                   Campo requerido, minimo 3 caracteres maximo 120
                </small> 
             @endif
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label class="col-4 col-form-label" for="reference_cellphone">Celular</label> 
            <div class="mb-3">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-address-card"></i>
                </div> 
                <input id="reference_cellphone" name="reference_cellphone" type="text" class="form-control" value="{{ old('reference_cellphone') }}">
              </div>
              @if ($errors->has('reference_cellphone'))
                <small class="text-danger">
                   {{ $errors->first('reference_cellphone') }}
                </small> 
             @else
                <small class="text-muted">
                   Campo requerido, minimo 3 caracteres maximo 30
                </small> 
             @endif
            </div>
          </div>         
      </div>
      

     



      <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude') }}">
      <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude') }}">
      <div id="map-canvas"></div>
      @if ($errors->has('latitude') || $errors->has('longitude'))
            <small class="text-danger">
               La ubicación es necesaria
            </small> 
         @else
            <small class="text-muted">
               Toque en el mapa para marcar el lugar
            </small> 
      @endif



   

      <div class="form-group row">
        <div class="offset-4 col-8">
          <button name="submit" type="submit" class="btn btn-primary">Enviar</button>
        </div>
      </div>
    </form>
  </div>




@endsection



<style>
	#map-canvas{
		width: 100%;
		height: 100%;
	}
</style>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA067JxEI4b5npPWQ-8ehhWBOTtUlwb104&callback=initMap"  type="text/javascript" async></script>

		
<script>

   var map;
   var markersArray = [];

   function initMap(){

      




   map = new google.maps.Map(document.getElementById('map-canvas'),{
         center:{ lat: -21.5276188, lng: -64.7466191 },
         zoom:15
      });
      
      map.addListener('click', function (e) {
               deleteMarkers();
               addMarker(e.latLng);
            });

      var tmpLat = document.getElementById('latitude').value;
      var tmpLng = document.getElementById('longitude').value;

      if(tmpLat !== '' && tmpLng !== ''){
         var tmpLocation = new google.maps.LatLng(parseFloat(tmpLat), parseFloat(tmpLng))
         addMarker(tmpLocation);
      }      
   }

   function addMarker(location) {

         document.getElementById('latitude').value = location.lat();
         document.getElementById('longitude').value = location.lng();

         marker = new google.maps.Marker({
            position: location,
            map: map
         });
         markersArray.push(marker);
      }


      function deleteMarkers() {
         if (markersArray) {
            for (i in markersArray) {
               markersArray[i].setMap(null);
            }
            markersArray.length = 0;
         }
      }

	
</script>

