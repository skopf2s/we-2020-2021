export function contentLoader(content, navigatorContent) {
	if(navigatorContent) {
		return {
			data: function() {
				return {text: content}
			},
			computed: {
				getNavigator() {
					return this.$route.params.navigator;
				}
			},
			template: `<div id="content">{{ text[getNavigator].content }}</div>`
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
				}
			},
			template: `<div id="content">{{ text[getNavigator][getDropdown].content }}</div>`
		}
	}
}