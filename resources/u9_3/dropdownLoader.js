export function dropdownLoader(content) {
	return {
		data: function() {
			return {dropdown: content};
		},
		computed: {
			getNavigator() {
				return this.$route.params.navigator;
			},
			getDropdownItems() {
				let res = {};
				
				for(let index of Object.keys(this.dropdown[this.getNavigator])) {
					if(typeof this.dropdown[this.getNavigator][index] === 'object' && Array.isArray(this.dropdown[this.getNavigator][index]) == false) {
						res[index] = this.dropdown[this.getNavigator][index];
					}
				}
				
				return res;
			}
		},
		template: `<div id="dropdown"><ul><li v-for="(dropdownItem, index) of getDropdownItems"><router-link :to="'/' + getNavigator + '/' + index">{{ dropdownItem.name }}</router-link></li></ul></div>`
	};
}