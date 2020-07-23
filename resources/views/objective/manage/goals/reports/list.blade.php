@extends('objective.manage.goals.master')

@section('panelContent')

<section>
  <h1 class="">Reportes</h1>
  <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. In eius ad officia tempora, temporibus repudiandae id
    ipsum neque deserunt rerum esse delectus consectetur voluptates eveniet quaerat commodi ducimus mollitia dolorem.
  </p>
  
  @if(count($reports) > 0)
    @foreach($reports as $report)
    <div class="card mb-3 shadow-sm">
      <div class="card-body d-flex justify-content-between">
        <div>
          <h5 class="card-title font-weight-bold m-0">{{$report->title}}</h5>
          <p title="{{$report->date}}" class="text-muted text-smaller">{{$report->date->diffForHumans()}}</p>
          @if($report->type == "progress")
          <p class="text-smaller mb-0">Progreso declarado - {{$report->progress}} ({{$goal->indicator_unit}})</p>
          @elseif($report->type == "milestone")
          <p class="text-smaller mb-0">Completado: Hito {{$report->milestone->order}}#: {{$report->milestone->title}}</p>
          @endif
          <p class="text-smaller mb-0">Cambio de estado:  {{$report->status}}</p>
        </div>
        <div class="text-center" style="min-width: 70px">
          @if($report->type == "post")
          <h6 class="text-secondary m-0"><i class="fas fa-bullhorn fa-lg"></i></h6>
          <p class="text-secondary text-smaller m-0">Novedad</p>
          @elseif($report->type == "progress")
          <h6 class="text-secondary m-0"><i class="fas fa-fast-forward fa-lg"></i></h6>
          <p class="text-secondary text-smaller m-0">Avance</p>
          @elseif($report->type == "milestone")
          <h6 class="text-secondary m-0"><i class="fas fa-medal fa-lg"></i></h6>
          <p class="text-secondary text-smaller m-0">Hito</p>
          @endif
        </div>
      </div>
    </div>
    @endforeach
  @else
    <div class="card mb-3 shadow-sm">
      <div class="card-body">
        <h6 class="card-title">No hay reportes creados</h6>
          <a href="{{ route('objective.manage.goals.reports.add', ['objId' => $objective->id, 'goalId' => $goal->id]) }}" class="card-link"><b>Haga clic para crear un nuevo reporte <i class="fas fa-arrow-right"></i></b></a>
      </div>
    </div>
  @endif
  {{ $reports->links() }}
</section>

@endsection