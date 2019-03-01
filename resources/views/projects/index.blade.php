@extends('layouts.app')

@section('content')
	<page-nav-component size="12" title="Projetos">
    @if($errors->all())
      @foreach ($errors->all() as $key => $value)
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{$value}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
      @endforeach
    @endif
		<breadcrumb-component 
      		v-bind:list="{{$listLinks}}">
    </breadcrumb-component>
	</page-nav-component>

	<table-component 
		v-bind:titles="['#', 'Nome', 'Tipo', 'Cliente', 'Valor', 'Data']"
		v-bind:items="{{$listItems}}"
		create="#create" detail="/admin/projects/" edit="/admin/projects/" remove="/admin/projects/" token="{{ csrf_token() }}" order="asc" colorder="1" modal="yes">	
	</table-component>

	<modal-component name="create" title="Criar Projeto">
		    <form-component id="formCreate" css="" action="{{route('projects.store')}}" method="post" enctype="" token="{{ csrf_token() }}">
          <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" id="name" placeholder="Nome do Projeto" name="title" value="{{old('title')}}">
          </div>
          <div class="form-group">
            <label for="type">Tipo:</label>
            <input type="text" class="form-control" id="type" placeholder="Tipo de Projeto" name="type" value="{{old('type')}}">
          </div>
          <div class="form-group">
            <label for="client">Cliente:</label>
            <input type="text" class="form-control" id="client" placeholder="Cliente" name="client" value="{{old('client')}}">
          </div>
          <div class="form-group">
            <label for="price">Preço:</label>
            <input type="text" class="form-control" id="price" placeholder="Preço do Projeto" name="price" value="{{old('price')}}">
          </div>
          <div class="form-group">
            <label for="publicationDate">Data do Projeto:</label>
            <input type="datetime-local" class="form-control" id="publicationDate" placeholder="Data do Projeto" name="publicationDate" value="{{old('publicationDate')}}">
          </div>
        </form-component>
        <span slot="buttons">
          <button form="formCreate" type="submit" class="btn btn-primary">Criar</button>
        </span>
	</modal-component>

	<modal-component name="edit" title="Editar Projeto">
        <form-component id="formEdit" css="" v-bind:action="'/admin/projects/' + $store.state.item.id" method="put" token="{{ csrf_token() }}">
          <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" id="name" placeholder="Nome do Projeto" name="title" v-model="$store.state.item.title">
          </div>
          <div class="form-group">
            <label for="type">Tipo:</label>
            <input type="text" class="form-control" id="type" placeholder="Tipo de Projeto" name="type" v-model="$store.state.item.type">
          </div>
          <div class="form-group">
            <label for="client">Cliente:</label>
            <input type="text" class="form-control" id="client" placeholder="Cliente" name="client" v-model="$store.state.item.client">
          </div>
          <div class="form-group">
            <label for="price">Preço:</label>
            <input type="text" class="form-control" id="price" placeholder="Preço do Projeto" name="price" v-model="$store.state.item.price">
          </div>
          <div class="form-group">
            <label for="publicationDate">Data do Projeto:</label>
            <input type="datetime-local" class="form-control" id="publicationDate" placeholder="Data do Projeto" name="publicationDate" v-model="$store.state.item.publicationDate">
          </div>
        </form-component>
        <span slot="buttons">
          <button form="formEdit" type="submit" class="btn btn-primary">Editar</button>
        </span>
    </modal-component>

    <modal-component name="detail"
      v-bind:title="$store.state.item.title">
        <p>@{{$store.state.item.type}}</p>
        <p>@{{$store.state.item.client}}</p>
        <p>@{{$store.state.item.price}}</p>
        <p>@{{$store.state.item.publicationDate}}</p>
    </modal-component>
@endsection