@extends('layouts.app')

@section('content')
		<page-nav-component size="12" title="Dashboard">
			<breadcrumb-component 
				v-bind:list="{{$listLinks}}">	
			</breadcrumb-component>

			<div class="row">
				<minimalist-box-component 
					title="Clientes" number="30" icon="ion ion-person-stalker" color="bg-aqua" url="admin/clients">
				</minimalist-box-component>
				<minimalist-box-component
					title="Projetos" number="30" icon="ion ion-soup-can" color="bg-green" url="admin/projects">
				</minimalist-box-component>
				<minimalist-box-component 
					title="Marketing" number="30" icon="ion ion-speakerphone" color="bg-purple" url="">
				</minimalist-box-component>
				<minimalist-box-component 
					title="Financeiro" number="30" icon="ion ion-calculator" color="bg-orange" url="">
				</minimalist-box-component>
				<minimalist-box-component 
					title="Usuários" number="30" icon="ion ion-calculator" color="bg-orange" url="admin/users">
				</minimalist-box-component>
			</div>

		</page-nav-component>
@endsection
