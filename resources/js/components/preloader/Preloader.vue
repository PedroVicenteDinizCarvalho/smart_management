<template>
	<div id="preloader">
        <div class="inner">
            <svg width="200" height="200" viewBox="0 0 40 60"> 
                <polygon class="triangle" fill="none" stroke="#fff" stroke-width="1" points="16,1 32,32 1,32" />
                <text class="loading" x="0" y="45" fill="#fff">Loading...</text>
            </svg>
        </div>    
    </div>
</template>
<script>
	export default{
		
	}
</script>
<style>
.preloader{
    text-align: center;
    background: #262626;
    color: #FFF;
    /* padding: 28%; */
    position: absolute;
    z-index: 9999;
    opacity: .4;
    top: 0;
    width: 100%;
    left: 0;
    height: 100%;
    text-align: center;
}
img.preloader{
    width: 274px;
    height: auto;
    max-width: 100%;
    position: relative;
}
body{
    background: #000 !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    height: 95vh !important;
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