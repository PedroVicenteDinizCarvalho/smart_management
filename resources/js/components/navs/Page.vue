<template>
	<div class="container">
		<div class="row justify-content-center">
			<div v-bind:class="defineSize">
				<h1>{{title}}</h1>
      			<hr>
                <slot></slot>

                <hr>
            </div>
		</div>
	</div>
</template>
<script>
	export default{
		props: ['size', 'title'],
		computed:{
			defineSize: function(){
				if(this.size >= 10){
					return "col-md-12";
				}
				if(this.size <= 6){
					return "col-md-8";
				}
				if(this.size <= 2){
					return "col-md-4"
				}
			}
		}
	}
</script>