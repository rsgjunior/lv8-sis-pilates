<div class="col-md-12">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Exames Complementares</h3>
        </div>

        <div class="card-body">
                @forelse ($avaliacao->exames as $exame)
                <div class="col-md-12">
                    <div class="callout callout-info">
                        <div class="row">
                            <div class="col-md-6">
                                <img class="col-md-12" src="{{ url('/storage/exames/' . $exame->id. '/' . $exame->nome_arquivo)}}">
                            </div>

                            <div class="col-md-6">
                                <h5>Exame {{ $loop->index }}</h5>
                                <p>{{ $exame->comentario }}</p>
                            </div>
                        </div>
                    </div>
                </div>    
                @empty
                    <p class="text-muted">Nenhum exame complementar cadastrado</p> 
                @endforelse
                
            
        </div>
    </div>
</div>