<template>
	<div class="k-section k-section-icons">
		<header class="k-field-header">
			<k-label>{{ label }}</k-label>
		</header>
		<k-items :items="items"></k-items>	
	</div>
</template>

<script>
export default {
	data() {
		return {
			label: null,
			items: [],
		}
	},
	async created() {
		const response = await this.load();
		this.label = response.label;
		this.items = response.items.map((item) => {
			item.buttons[0].click = function() {
				navigator.clipboard.writeText(item.text);
			}
			return item;
		});
	}
};
</script>
