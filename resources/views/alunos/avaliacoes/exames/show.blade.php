<div class="col-md-12">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Exames Complementares</h3>
        </div>

        <div class="card-body" style="display: block;">
            <div class="row">
                @forelse ($avaliation->exams as $exam)
                    <img src="{{ url('/storage/exames/' . $exam->id. '/' . $exam->filename)}}" alt="" >
                @empty
                    <p class="text-muted">Nenhum exame complementar cadastrado</p> 
                @endforelse
                
            </div>
        </div>
    </div>
</div>