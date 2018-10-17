<template>
	<div id="well">
		I'm an example component.
	</div>
</template>

<script>
	export default {
		mounted() {
			console.log('Component mounted.')
		}
	}
</script>

<style>
    #well {
        color: #222;
        text-align: center;
    }
</style>
