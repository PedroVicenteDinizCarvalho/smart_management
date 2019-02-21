@extends('layouts.app')

@section('content')
		<page-nav-component size="12" title="Dashboard">
			<basic-nav-component title="menu">
				<li class="nav-item">
        			<a class="nav-link" href="#">Pedro</a>
	      		</li>
	      		<li class="nav-item">
	        		<a class="nav-link" href="#">Pedro</a>
	      		</li>
	      		<li class="nav-item">
	        		<a class="nav-link" href="#">Pedro</a>
	      		</li>
			</basic-nav-component>

			<div class="row">
				<minimalist-box-component 
					title="Clientes" number="30" icon="ion ion-ios-gear-outline" color="bg-aqua">
				</minimalist-box-component>
				<minimalist-box-component
					title="Clientes" number="30" icon="ion ion-ios-gear-outline" color="bg-dark">
				</minimalist-box-component>
				<minimalist-box-component 
					title="Clientes" number="30" icon="ion ion-ios-gear-outline" color="bg-dark">
				</minimalist-box-component>
				<minimalist-box-component 
					title="Clientes" number="30" icon="ion ion-ios-gear-outline" color="bg-dark">
				</minimalist-box-component>
			</div>

		</page-nav-component>
        <dashboard-component>
        	
        </dashboard-component> 
@endsection
