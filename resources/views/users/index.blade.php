@extends('layouts.app')

@section('content')
	<page-nav-component size="12" title="Usuarios">
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
		v-bind:titles="['#', 'Nome', 'email']"
		v-bind:items="{{ json_encode($listItems)}}"
		create="#create" detail="/admin/users/" edit="/admin/users/" remove="/admin/users/" token="{{ csrf_token() }}" order="asc" colorder="1" modal="yes">	
    <div align="center">
      {{ $listItems->links() }}
    </div>
	</table-component>

	  <modal-component name="create" title="Criar Usuario">
		    <form-component id="formCreate" css="" action="{{route('users.store')}}" method="post" enctype="" token="{{ csrf_token() }}">
          <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" id="name" placeholder="Nome do Usuário" name="name" value="{{old('name')}}">
          </div>
          <div class="form-group">
            <label for="email">Tipo:</label>
            <input type="email" class="form-control" id="email" placeholder="Email do Usuário" name="email" value="{{old('email')}}">
          </div>
          <div class="form-group">
            <label for="password">Senha:</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Senha do Usuário" value="{{old('password')}}">
          </div>
        </form-component>
        <span slot="buttons">
          <button form="formCreate" type="submit" class="btn btn-primary">Criar</button>
        </span>
	  </modal-component>

	  <modal-component name="edit" title="Editar Projeto">
        <form-component id="formEdit" css="" v-bind:action="'/admin/users/' + $store.state.item.id" method="put" token="{{ csrf_token() }}">
          <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" id="name" placeholder="Nome do Usuário" name="name" v-model="$store.state.item.name">
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Email do Usuário" name="email" v-model="$store.state.item.email">
          </div>
          <div class="form-group">
            <label for="password">Senha:</label>
            <input type="password" class="form-control" id="password" placeholder="Senha do Usuário" name="password">
          </div>
        </form-component>
        <span slot="buttons">
          <button form="formEdit" type="submit" class="btn btn-primary">Editar</button>
        </span>
    </modal-component>

    <modal-component name="detail"
      v-bind:title="$store.state.item.title">
        <div class="card">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <p><strong>Nome:</strong> @{{$store.state.item.name}}</p><hr>
            <p><strong>Email:</strong> @{{$store.state.item.email}}</p><hr>
          </div>
        </div>
    </modal-component>
@endsection