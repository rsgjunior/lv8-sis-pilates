<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

// Home > Alunos
Breadcrumbs::for('alunos.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Alunos', route('alunos.index'));
});

// Home > Alunos > Criar
Breadcrumbs::for('alunos.create', function (BreadcrumbTrail $trail) {
    $trail->parent('alunos.index');
    $trail->push('Cadastrar novo', route('alunos.create'));
});

// Home > Alunos > $aluno
Breadcrumbs::for('alunos.show', function (BreadcrumbTrail $trail, $aluno) {
    $trail->parent('alunos.index');
    $trail->push($aluno->nome, route('alunos.show', $aluno));
});

// Home > Alunos > $aluno > Editar
Breadcrumbs::for('alunos.edit', function (BreadcrumbTrail $trail, $aluno) {
    $trail->parent('alunos.show', $aluno);
    $trail->push('Editar', route('alunos.edit', $aluno));
});

// Home > Alunos > $aluno > Nova avaliação
Breadcrumbs::for('avaliacoes.create', function (BreadcrumbTrail $trail, $aluno) {
    $trail->parent('alunos.show', $aluno);
    $trail->push('Nova avaliação', route('avaliacoes.create', $aluno));
});

// Home > Alunos > $aluno > $avaliacao
Breadcrumbs::for('avaliacoes.show', function (BreadcrumbTrail $trail, $avaliacao) {
    $trail->parent('alunos.show', $avaliacao->aluno);
    $trail->push('Avaliação #' . $avaliacao->id, route('avaliacoes.show', $avaliacao));
});


// Home > Alunos > $aluno > $avaliacao > Editar
Breadcrumbs::for('avaliacoes.edit', function (BreadcrumbTrail $trail, $avaliacao) {
    $trail->parent('avaliacoes.show', $avaliacao);
    $trail->push('Editar', route('avaliacoes.edit', $avaliacao));
});

// Home > Alunos > $aluno > Nova Observacao
Breadcrumbs::for('observacoes.create', function (BreadcrumbTrail $trail, $aluno) {
    $trail->parent('alunos.show', $aluno);
    $trail->push('Nova observação', route('observacoes.create', $aluno));
});

// Home > Professores
Breadcrumbs::for('professores.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Professores', route('professores.index'));
});

// Home > Professores > Criar
Breadcrumbs::for('professores.create', function (BreadcrumbTrail $trail) {
    $trail->parent('professores.index');
    $trail->push('Cadastrar novo', route('professores.create'));
});

// Home > Professores > $professor
Breadcrumbs::for('professores.show', function (BreadcrumbTrail $trail, $professor) {
    $trail->parent('professores.index');
    $trail->push($professor->nome, route('professores.show', $professor));
});

// Home > Professores > $professor > Editar
Breadcrumbs::for('professores.edit', function (BreadcrumbTrail $trail, $professor) {
    $trail->parent('professores.show', $professor);
    $trail->push('Editar', route('professores.edit', $professor));
});

// Home > Turmas
Breadcrumbs::for('turmas.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Turmas', route('turmas.index'));
});

// Home > Turmas > Nova
Breadcrumbs::for('turmas.create', function (BreadcrumbTrail $trail) {
    $trail->parent('turmas.index');
    $trail->push('Nova', route('turmas.create'));
});

// Home > Turmas > $turma
Breadcrumbs::for('turmas.show', function (BreadcrumbTrail $trail, $turma) {
    $trail->parent('turmas.index');
    $trail->push($turma->nome, route('turmas.show', $turma));
});

// Home > Turmas > $turma > Edit
Breadcrumbs::for('turmas.edit', function (BreadcrumbTrail $trail, $turma) {
    $trail->parent('turmas.show', $turma);
    $trail->push('Editar', route('turmas.edit', $turma));
});

// Home > Experimentais
Breadcrumbs::for('experimentais.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Experimentais', route('experimentais.index'));
});

// Home > Experimentais > Nova
Breadcrumbs::for('experimentais.create', function (BreadcrumbTrail $trail, $aluno) {
    $trail->parent('experimentais.index');
    $trail->push($aluno->nome, route('experimentais.create', $aluno));
});

// Home > Experimentais > $experimental
Breadcrumbs::for('experimentais.show', function (BreadcrumbTrail $trail, $experimental) {
    $trail->parent('experimentais.index');
    $trail->push($experimental->aluno->nome, route('experimentais.show', $experimental));
});

// Home > Experimentais > $experimental > Edit
Breadcrumbs::for('experimentais.edit', function (BreadcrumbTrail $trail, $experimental) {
    $trail->parent('experimentais.show', $experimental);
    $trail->push('Editar', route('experimentais.edit', $experimental));
});

// Home > Experimentais > $experimental > Atualizar
Breadcrumbs::for('experimentais.atualizarStatus', function (BreadcrumbTrail $trail, $experimental) {
    $trail->parent('experimentais.show', $experimental);
    $trail->push('Atualizar', route('experimentais.atualizarStatus', $experimental));
});

// Home > Calendário
Breadcrumbs::for('calendario.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Calendário', route('calendario.index'));
});