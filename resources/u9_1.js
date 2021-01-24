import Vue from 'https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.esm.browser.js';

Vue.component('word-counter', {
	data: function () {
		return {
			input: '',
			letters: 0,
			spaces: 0,
			words: 0
		};
	},
	watch: {
		input: function() {
			this.letters = this.input.replace(/\s+/g, '').length;
			this.spaces = (this.input.match(/\s/g) || []).length;
			this.words = this.input.trim() == "" ? 0 : this.input.trim().split(/\s/g).length;
		}
	},
	template: '<div><textarea v-model="input"></textarea> <span>Buchstaben: {{ letters }}</span> <span>Leerzeichen: {{ spaces }}</span> <span>Wörter: {{ words }}</span></div>'
});

new Vue({el: '#word-counter'});