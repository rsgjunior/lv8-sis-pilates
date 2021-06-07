
  <!-- The timeline -->
  <div class="timeline timeline-inverse">
    <div>
        <i class="fa fa-plus-circle bg-primary"></i>

        <div class="timeline-item">

        

        <div class="timeline-body">
            <a href="{{ route('observacoes.create', $aluno) }}" class="btn btn-primary">
                <i class="fa fa-plus-circle"></i>
                Nova Observação
            </a>
        </div>
        
        </div>
    </div>

    <!-- timeline item -->
    @php($ultimo_dia = 32)
    @foreach ($observacoes as $observacao)
        @if(intval(date('d', strtotime($observacao->created_at))) < $ultimo_dia)
            <!-- timeline time label -->
            <div class="time-label">
                <span class="bg-danger">
                {{ date('d F', strtotime($observacao->created_at)) }}
                </span>
            </div>
            <!-- /.timeline-label -->
            @php($ultimo_dia = intval(date('d', strtotime($observacao->created_at))))
        @endif
        <div>
            <i class="{{ $observacao->categoriaHtmlClass }}"></i>

            <div class="timeline-item">
            <span class="time">
                <i class="far fa-clock"></i> 
                {{ date('H:i', strtotime($observacao->created_at)) }}
                @if($observacao->created_at != $observacao->updated_at)
                (Editado em {{ date('d/m/y, H:i', strtotime($observacao->updated_at)) }})
                @endif
            </span>

            <h3 class="timeline-header">{{ $observacao->titulo }}</h3>

            <div class="timeline-body">
                {{ $observacao->descricao }}
            </div>
            
            </div>
        </div>
    @endforeach
    <!-- END timeline item -->
    <div>
      <i class="far fa-clock bg-gray"></i>
    </div>
  </div>