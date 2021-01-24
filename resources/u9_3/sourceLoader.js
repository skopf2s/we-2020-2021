export function sourceLoader(content, navigatorContent) {
	if(navigatorContent) {
		return {
			data: function() {
				return {text: content}
			},
			computed: {
				getNavigator() {
					return this.$route.params.navigator;
				},
				getSources() {
					return this.text[this.getNavigator].references;
				}
			},
			template: `<div id="sources"><h2>Quellen:</h2><ul><li v-for="source in getSources"><a v-bind:href="source">{{ source }}</a></li></ul></div>`
		}
	} else {
		return {
			data: function() {
				return {text: content}
			},
			computed: {
				getNavigator() {
					return this.$route.params.navigator;
				},
				getDropdown() {
					return this.$route.params.dropdown;
				},
				getSources() {
					return this.text[this.getNavigator][this.getDropdown].references;
				}
			},
			template: `<div id="sources"><h2>Quellen:</h2><ul><li v-for="source in getSources"><a v-bind:href="source">{{ source }}</a></li></ul></div>`
		}
	}
}