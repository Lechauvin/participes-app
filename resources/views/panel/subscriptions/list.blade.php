@extends('panel.master')

@section('panelContent')

<section>
<h1 class="">Mis suscripciones</h1>
<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. In eius ad officia tempora, temporibus repudiandae id ipsum neque deserunt rerum esse delectus consectetur voluptates eveniet quaerat commodi ducimus mollitia dolorem.</p>
 @if(count($subscriptions) > 0)
    @foreach($subscriptions as $objective)
    <div class="card mb-3 shadow-sm">
      <div class="card-body d-flex justify-content-between">
        <div>
        <p class="text-smaller text-muted mb-1">
        @if($objective->hidden)
        <span class="badge badge-warning align-middle"><i class="fas fa-eye-slash"></i>Oculto</span>&nbsp;&nbsp;
        @endif
        <i class="{{$objective->category->icon}}"></i> {{$objective->category->title}} -
        {{$objective->goals()->count()}} Metas</p>
      <h5 class="card-title font-weight-bold mb-1"><a class="text-primary"
          href="{{route('objective.manage.index',['objId' => $objective->id])}}">{{$objective->title}}</a></h5>
      <p>
        @foreach ($objective->tags as $tag)
        <span class="badge badge-light align-middle">{{$tag}}</span>
        @endforeach
      </p>
      <p class="text-muted text-smaller mb-0">{{Str::limit($objective->content, 200, $end=' [...]')}}</p>
      <p class="text-info mb-0">Suscripto el @datetime($objective->pivot->created_at) </p>
        </div>
        <div>
          <div class="mt-1 ml-2 text-center">
            <a onclick="event.preventDefault();document.getElementById('unsub{{$objective->id}}').submit();" class="text-dark is-clickable"><i class="fas fa-times fa-circle fa-2x"></i></a>
            <span class="text-smallest">Desuscribirse</span>
          <form id="unsub{{$objective->id}}" action="{{route('panel.subscriptions.unsubscribe.form',['objId' => $objective->id]) }}" method="POST" style="display: none;">
            @csrf
          </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  @else
    <div class="card mb-3 shadow-sm">
      <div class="card-body text-center">
        <h6 class="card-title mb-2"><i class="far fa-surprise"></i>&nbsp;No estas suscripto a ningun objetivo</h6>
        <p class="text-smaller mb-0">¡Suscribite a tus objetivos favoritos y recibi notificaciones!</p>
      </div>
    </div>
  @endif
  {{ $subscriptions->links() }}

</section>

@endsection