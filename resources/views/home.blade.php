@extends('layouts.app')

@section('content')

<company1></company1>
	<div id="app">
	    <p>@{{ msg }}</p>
		<input type="text" v-model="msg">
	</div>
<script type="text/javascript" src="js/script.js"></script>
@endsection
