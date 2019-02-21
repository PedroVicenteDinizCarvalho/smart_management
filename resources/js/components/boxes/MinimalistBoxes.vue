<template>
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<a class="link" v-bind:href="url">
				<span v-bind:class="defineColorBox"><i v-bind:class="icon"></i></span>
			    <div class="info-box-content">
			      <span class="info-box-text">{{ title }}</span>
			      <span class="info-box-number">{{ number }}<small>%</small></span>
			   	</div>
			    <!-- /.info-box-content -->
			</a>
		</div>
	</div>
</template>
<script>
	export default{
		props: ['icon', 'color', 'title', 'number', 'url'],
		computed: {
			defineColorBox: function(){
				return "info-box-icon "+ this.color; 
			},
		}
	}
</script>
<style>
a.link{
	text-decoration: none;
}
.info-box {
    display: block;
    min-height: 90px;
    background-color: #fff;
	width: 100%;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    border-radius: 2px;
    margin-bottom: 15px;
}

/* Define Color Box */
.bg-aqua {
    background-color: #00c0ef !important;
    color: #fff !important;
}
.bg-dark {
	background-color: #000 !important;
	color: #fff !important;
}
.bg-green {
	background-color: #28b329 !important;
	color: #fff !important;
}
.bg-purple {
	background-color: #8f23d8 !important;
	color: #fff !important;
}
.bg-orange {
	background-color: #ff4c1c !important;
	color: #fff !important;
}

.info-box-icon {
    border-top-left-radius: 2px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 2px;
    display: block;
    float: left;
    height: 90px;
    width: 90px;
    text-align: center;
    font-size: 45px;
    line-height: 90px;
    background: rgba(0,0,0,0.2);
}
.ion{
    display: inline-block;
    font-family: "Ionicons";
    speak: none;
    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    text-rendering: auto;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.info-box-content {
    padding: 5px 10px;
    margin-left: 90px;
}
.info-box-text {
    text-transform: uppercase;
    display: block;
    font-size: 14px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.info-box-number {
    display: block;
    font-weight: bold;
    font-size: 18px;
}
.info-box small {
    font-size: 14px;
}
</style>
