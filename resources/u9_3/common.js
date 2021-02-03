import {fileLoader as loadFile } from './fileLoader.js';
import {navigatorLoader as loadNavigator} from './navigatorLoader.js';
import {dropdownLoader as loadDropdown} from './dropdownLoader.js';
import {contentLoader as loadContent} from './contentLoader.js';
import {sourceLoader as loadSources} from './sourceLoader.js';

async function load() {
	let content = await loadFile();
	
	const router = new VueRouter({
		routes: [
			{
				path: '/:navigator',
				components: {
					navigator: loadNavigator(content),
					dropdown: loadDropdown(content),
					content: loadContent(content, true),
					sources: loadSources(content, true)
				}
			},
			{
				path: '/:navigator/:dropdown',
				components: {
					navigator: loadNavigator(content),
					dropdown: loadDropdown(content),
					content: loadContent(content, false),
					sources: loadSources(content, false)
				}
			},
			{
				path: '*',
				redirect: '/html'
			}
		]
	});
	
	const app = new Vue({router}).$mount('#frame');
}

load();