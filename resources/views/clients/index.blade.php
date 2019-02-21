@extends('layouts.app')

@section('content')
	<page-nav-component size="12" title="Clientes">
		<breadcrumb-component 
      v-bind:list="{{$listLinks}}">
    </breadcrumb-component>
	</page-nav-component>
@endsection