<template>
	<div>
		<h1><span class="f">{{ title }}</span></h1>
        <span class="i"><slot></slot></span>
	</div>
</template>

<script>
	export default {
		props: ['title']
	}
</script>
