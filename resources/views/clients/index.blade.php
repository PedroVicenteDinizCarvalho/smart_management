@extends('layouts.app')

@section('content')
	<page-nav-component size="12" title="Clientes">
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
		v-bind:titles="['#', 'Nome', 'Idade', 'Email']"
		v-bind:items="{{$listItems}}"
		create="#create" detail="/admin/clients/" edit="/admin/clients/" remove="#remove" token="1828238183" order="asc" colorder="1" modal="yes">	
	</table-component>

	<modal-component name="create" title="Criar Cliente">
		    <form-component id="formCreate" css="" action="{{route('clients.store')}}" method="post" enctype="" token="{{csrf_token() }}">
          <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" id="name" placeholder="Nome do Cliente" name="name">
          </div>
          <div class="form-group">
            <label for="age">Idade:</label>
            <input type="number" class="form-control" id="age" placeholder="Idade do Cliente" name="age">
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" placeholder="Email do Cliente" name="email">
          </div>
        </form-component>
        <span slot="buttons">
          <button form="formCreate" type="submit" class="btn btn-primary">Criar</button>
        </span>
	</modal-component>

	<modal-component name="edit" title="Editar">
        <form-component id="formEdit" css="" v-bind:action="'/admin/clients/' + $store.state.item.id" method="put"  token="{{csrf_token() }}">
          <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" id="name" placeholder="Nome do Cliente" name="name" 
              v-model="$store.state.item.name">
          </div>
          <div class="form-group">
            <label for="age">Idade:</label>
            <input type="number" class="form-control" id="age" placeholder="Idade do Cliente" name="age"
              v-model="$store.state.item.age">
          </div>
		  <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" placeholder="Email do Cliente" name="email"
              v-model="$store.state.item.email">
          </div>
        </form-component>
        <span slot="buttons">
          <button form="formEdit" type="submit" class="btn btn-primary">Atualizar</button>
        </span>
    </modal-component>

    <modal-component name="detail"
      v-bind:title="$store.state.item.name">
        <p>@{{$store.state.item.id}}</p>
        <p>@{{$store.state.item.age}}</p>
        <p>@{{$store.state.item.email}}</p>
    </modal-component>
@endsection