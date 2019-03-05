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
		v-bind:items="{{ json_encode($listItems)}}"
		create="#create" detail="/admin/projects/" edit="/admin/projects/" remove="/admin/projects/" token="{{ csrf_token() }}" order="asc" colorder="1" modal="yes">	
    <div align="center">
      {{ $listItems->links() }}
    </div>
	</table-component>

	<modal-component name="create" title="Criar Projeto">
		    <form-component id="formCreate" css="" action="{{route('projects.store')}}" method="post" enctype="" token="{{ csrf_token() }}">
          <div class="form-group">
            <label for="title">Titulo:</label>
            <input type="text" class="form-control" id="title" placeholder="Titulo do Projeto" name="title" value="{{old('title')}}">
          </div>
          <div class="form-group">
            <label for="type">Tipo:</label>
            <input type="text" class="form-control" id="type" placeholder="Tipo de Projeto" name="type" value="{{old('type')}}">
          </div>
          <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" cols="30" rows="10">{{old('description')}}</textarea>
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
            <label for="deadline">Data de Entrega:</label>
            <input type="datetime-local" class="form-control" id="deadline" placeholder="Data limite do projeto" name="deadline" value="{{old('deadline')}}">
          </div>
          <div class="form-group">
            <label for="installments">Parcelas:</label>
            <input type="number" class="form-control" id="installments" placeholder="Parcelas de pagamento" name="installments" value="{{old('installments')}}">
          </div>
          <div class="form-group">
            <label for="paidOut">Entrada:</label>
            <input type="number" class="form-control" id="paidOut" placeholder="Data limite do projeto" name="paidOut" value="{{old('paidOut')}}">
          </div>
        </form-component>
        <span slot="buttons">
          <button form="formCreate" type="submit" class="btn btn-primary">Criar</button>
        </span>
	</modal-component>

	<modal-component name="edit" title="Editar Projeto">
        <form-component id="formEdit" css="" v-bind:action="'/admin/projects/' + $store.state.item.id" method="put" token="{{ csrf_token() }}">
          <div class="form-group">
            <label for="title">Titulo:</label>
            <input type="text" class="form-control" id="title" placeholder="Nome do Projeto" name="title" v-model="$store.state.item.title">
          </div>
          <div class="form-group">
            <label for="type">Tipo:</label>
            <input type="text" class="form-control" id="type" placeholder="Tipo de Projeto" name="type" v-model="$store.state.item.type">
          </div>
          <div class="form-group">
            <label for="description">Descrição:</label>
            <input type="text" class="form-control" id="description" placeholder="Cliente" name="description" v-model="$store.state.item.description">
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
            <label for="deadline">Data de Entrega:</label>
            <input type="datetime-local" class="form-control" id="deadline" placeholder="Data do Projeto" name="deadline" v-model="$store.state.item.deadline">
          </div>
          <div class="form-group">
            <label for="installments">Parcelas:</label>
            <input type="text" class="form-control" id="installments" placeholder="Preço do Projeto" name="installments" v-model="$store.state.item.installments">
          </div>
          <div class="form-group">
            <label for="paidOut">Entrada:</label>
            <input type="text" class="form-control" id="paidOut" placeholder="Preço do Projeto" name="paidOut" v-model="$store.state.item.paidOut">
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
            <p><strong>Tipo:</strong> </p><p>@{{$store.state.item.type}}</p><hr>
            <p><strong>Descrição:</strong> </p><p>@{{$store.state.item.description}}</p><hr>
            <p><strong>Cliente:</strong> </p><p>@{{$store.state.item.client}}</p><hr>
            <p><strong>Preço:</strong> </p><p>@{{$store.state.item.price}}</p><hr>
            <p><strong>Prazo:</strong> </p><p>@{{$store.state.item.deadline}}</p><hr>
            <p><strong>Parcelas:</strong> </p><p>@{{$store.state.item.installments}}</p><hr>
            <p><strong>Parcelas Pagas:</strong> </p><p>@{{$store.state.item.paidOut}}</p>
          </div>
        </div>
    </modal-component>
@endsection