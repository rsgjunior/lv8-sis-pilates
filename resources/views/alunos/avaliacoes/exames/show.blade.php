<div class="col-md-12">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Exames Complementares</h3>
        </div>

        <div class="card-body">
            
                
                @forelse ($avaliacao->exames as $exame)
                <div class="row">
                    <div class="callout callout-info">
                        <h5>Exame {{ $loop->index }}</h5>
                        <img class="col-md-6" src="{{ url('/storage/exames/' . $exame->id. '/' . $exame->nome_arquivo)}}">
                        <div class="col-md-6">
                            <textarea class="form-control" name="" id="" cols="30" rows="10">{{ $exame->comentario }}</textarea>
                        </div>
                    </div>
                    
                </div>    
                @empty
                    <p class="text-muted">Nenhum exame complementar cadastrado</p> 
                @endforelse
                
            
        </div>
    </div>
</div>