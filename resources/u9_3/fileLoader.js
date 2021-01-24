export async function fileLoader() {
	var headers = new Headers();
	headers.append('pragma', 'no-cache');
	headers.append('cache-control', 'no-cache');
	headers.append('mode', 'cors');
	headers.append('Content-Type', 'text/json; charset=UTF-8');
	return JSON.parse(await fetch("content.json", {method: 'GET', headers: headers}).then(content => content.text()));
}