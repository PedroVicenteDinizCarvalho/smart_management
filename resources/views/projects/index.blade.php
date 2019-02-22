@extends('layouts.app')

@section('content')
	<page-nav-component size="12" title="Projetos">
		<breadcrumb-component 
      		v-bind:list="{{$listLinks}}">
    	</breadcrumb-component>
	</page-nav-component>
	<table-component 
		v-bind:titles="['#', 'Nome', 'Tipo', 'Cliente', 'Valor']"
		v-bind:items="{{$listItems}}"
		create="#create" detail="#detail" edit="#edit" remove="#remove" toke="1828238183" order="asc" colorder="1" modal="yes">	
	</table-component>

	<modal-component name="create" title="Criar Projeto">
		    <form id="formCreate" css="" action="#" method="put" enctype="" token="">
          <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" id="name" placeholder="Nome do Projeto" name="name">
          </div>
          <div class="form-group">
            <label for="type">Tipo:</label>
            <input type="text" class="form-control" id="type" placeholder="Tipo de Projeto" name="type">
          </div>
          <div class="form-group">
            <label for="client">Cliente:</label>
            <input type="text" class="form-control" id="client" placeholder="Cliente" name="client">
          </div>
          <div class="form-group">
            <label for="price">Preço:</label>
            <input type="text" class="form-control" id="price" placeholder="Preço do Projeto" name="price">
          </div>
        </form>
        <span slot="buttons">
          <button form="formCreate" type="button" class="btn btn-primary">Criar</button>
        </span>
	</modal-component>

	<modal-component name="edit" title="Editar Projeto">
        <form id="formEdit" css="" action="#" method="put" enctype="" token="">
          <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" id="name" placeholder="Nome do Projeto" name="name">
          </div>
          <div class="form-group">
            <label for="type">Tipo:</label>
            <input type="text" class="form-control" id="type" placeholder="Tipo de Projeto" name="type">
          </div>
          <div class="form-group">
            <label for="client">Cliente:</label>
            <input type="text" class="form-control" id="client" placeholder="Cliente" name="client">
          </div>
          <div class="form-group">
            <label for="price">Preço:</label>
            <input type="number" class="form-control" id="price" placeholder="Preço do Projeto" name="price">
          </div>
        </form>
        <span slot="buttons">
          <button form="formEdit" type="button" class="btn btn-primary">Editar</button>
        </span>
    </modal-component>

    <modal-component name="detail"
      v-bind:title="$store.state.item.name">
        <p>@{{$store.state.item.type}}</p>
        <p>@{{$store.state.item.client}}</p>
        <p>@{{$store.state.item.price}}</p>
    </modal-component>
@endsection