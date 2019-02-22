<template>
	<svg width="200" height="200" viewBox="0 0 40 60" id="svg"> 
		<polygon class="triangle" fill="none" stroke="#fff" stroke-width="1" points="16,1 32,32 1,32" />
		<text class="loading" x="0" y="45" fill="#fff">Loading...</text>
	</svg>
</template>
<script>
	export default {
		mounted: function(){
    		document.getElementById('svg').style.display = "none";
    	}
	}
</script>
<style>
#svg{
	display: "block";
}
.loading{
	font-family: 'Orbitron', sans-serif;
	font-size: 7px;
	animation: blink .9s ease-in-out infinite;
}
.triangle{
	stroke-dasharray: 17;
	animation: dash 2.5s cubic-bezier(0.35, 0.04, 0.63, 0.95) infinite;
}
@keyframes dash{
	to{
		stroke-dashoffset: 136;
	}
}
@keyframes blink{
	50%{
		opacity: 0;
	}
}	
</style>