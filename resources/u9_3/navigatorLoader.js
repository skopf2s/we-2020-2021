export function navigatorLoader(content) {
	return {
		data: function() {
			return {navigator: content};
		},
		template: `<div id="navigator"><ul><li v-for="(navigatorItem, index) of navigator"><router-link :to="'/' + index">{{ navigatorItem.name }}</router-link></li></ul></div>`
	};
}