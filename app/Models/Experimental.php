<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experimental extends Model
{
    use HasFactory;

    protected $table = 'experimentais';

    protected $guarded = [];

    // Relacionamentos
    public function aluno() {
        return $this->belongsTo(Aluno::class, 'aluno_id');
    }
}
