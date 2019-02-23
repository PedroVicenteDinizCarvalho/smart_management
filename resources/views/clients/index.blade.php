@extends('layouts.app')

@section('content')
	<page-nav-component size="12" title="Clientes">
		<breadcrumb-component 
      		v-bind:list="{{$listLinks}}">
    	</breadcrumb-component>
	</page-nav-component>
	<table-component 
		v-bind:titles="['#', 'Nome', 'Idade', 'Email']"
		v-bind:items="{{$listItems}}"
		create="#create" detail="#detail" edit="#edit" remove="#remove" toke="1828238183" order="asc" colorder="1" modal="yes">	
	</table-component>

	<modal-component name="create" title="Criar Cliente">
		    <form id="formCreate" css="" action="{{route('clients.store')}}" method="post" enctype="">
          <input type="hidden" name="_token" value="{{csrf_token() }}">
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
        </form>
        <span slot="buttons">
          <button form="formCreate" type="submit" class="btn btn-primary">Criar</button>
        </span>
	</modal-component>

	<modal-component name="edit" title="Editar">
        <form id="formEdit" css="" action="#" method="put" enctype="" token="">
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
        </form>
        <span slot="buttons">
          <button type="button" class="btn btn-primary">Atualizar</button>
        </span>
    </modal-component>

    <modal-component name="detail"
      v-bind:title="$store.state.item.name">
        <p>@{{$store.state.item.age}}</p>
        <p>@{{$store.state.item.email}}</p>
    </modal-component>
@endsection