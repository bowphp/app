<template>
	<div>
		<h1><span class="f">{{ title }}</span></h1>
		<span class="i" v-html>{{ message }}</span>
	</div>
</template>

<script>
	export default {
		props: ['title', 'message']
	}
</script>