<template>
	<div class="vue-color">
		I'm an example component.
	</div>
</template>

<style type="text/css" scoped>
	.vue-color {
		color: #111;
	}
</style>

<script>
	export default {
		mounted() {
			console.log('Component mounted.')
		}
	}
</script>