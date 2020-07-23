@php
$checked = Str::contains(Auth::user()->notification_preferences,"mail")
@endphp

@extends('panel.master')

@section('panelContent')

<section>
  <h1 class="">Preferencias de envio</h1>
  <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. In eius ad officia tempora, temporibus repudiandae id
    ipsum neque deserunt rerum esse delectus consectetur voluptates eveniet quaerat commodi ducimus mollitia dolorem.
  </p>
  <hr>
   @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  <h5 class="font-weight-bold"><i class="far fa-envelope"></i> ¿Desea recibir notificaciones por correo electronico?</h5>
  <p>Habilitando la opción, usted será notificado de los siguientes eventos:</p>
  <ul>
    <li>Cuando se crea un nuevo reporte en algun objetivo del cual este suscripto</li>
    <li>Cuando recibe una respuesta de su comentario</li>
  </ul>
  <p>Nota: Independientemente de su elección, seguirá recibiendo notificaciones a través del sistema</p>
  <form action="{{ route('panel.account.notifications.form') }}" method="POST">
    @method('PUT')
    @csrf
    <div class="form-group">
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" name="mailable" id="mailable" {{$checked ? 'checked' : ''}} value="true">
        <label class="custom-control-label" for="mailable">Recibir correos electronicos</label>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>

</section>

@endsection