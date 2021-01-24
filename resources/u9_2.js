import Vue from 'https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.esm.browser.js';

Vue.component('menu-list', {
	data: function () {
		return {
			objects: {
				html: {name: "HTML"},
				css: {name: "CSS"},
				javascript: {name: "JavaScript"}
			}
		};
	},
	props: ["flow"],
	template: '<table><tbody v-if="flow == \'vertical\'"><tr v-for="object in objects"><td>{{ object.name }}</td></tr></tbody><tbody v-else><tr><td v-for="object in objects">{{ object.name }}</td></tr></tbody></table>'
});

new Vue({el: '#menu'});