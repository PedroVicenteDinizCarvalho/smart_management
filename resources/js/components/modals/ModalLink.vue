<template>
	<div class="">
		<span v-if="item">
			<button type="button" data-toggle="modal" 
				v-on:click="filForm()" 
				v-if="!type || (type != 'button' && type != 'link')"   
				v-bind:class="css || 'btn btn-primary'" 
				v-bind:data-target="'#' + name">
	        	{{title}}
	    	</button>

			<button type="button" data-toggle="modal" 
				v-on:click="filForm()" 
				v-if="type == 'button'" 
				v-bind:class="css || 'btn btn-primary'" 
				v-bind:data-target="'#' + name">
	        	{{title}}
	    	</button>

	    	<a href="" data-toggle="modal" 
	    		v-on:click="filForm()" 
	    		v-if="type == 'link'" 
	    		v-bind:class="css || ''" 
	    		v-bind:data-target="'#' + name">
	    		{{title}}
	    	</a>
		</span>

		<span v-if="!item">
			<button v-if="!type || (type != 'button' && type != 'link')" type="button" data-toggle="modal"  
				v-bind:class="css || 'btn btn-primary'" 
				v-bind:data-target="'#' + name">
	        	{{title}}
	    	</button>

			<button v-if="type == 'button'" type="button" data-toggle="modal" 
				v-bind:class="css || 'btn btn-primary'" 
				v-bind:data-target="'#' + name">
	        	{{title}}
	    	</button>

	    	<a v-if="type == 'link'" href="" data-toggle="modal" 
	    		v-bind:class="css || ''" 
	    		v-bind:data-target="'#' + name">
	    		{{title}}
	    	</a>
		</span>
	</div>
</template>
<script>
	export default {
		props: ['type', 'name', 'title', 'css', 'item'],
		
		methods:{
			filForm: function(){
				this.$store.commit('setItem', this.item);
			}
		},
	}
</script>