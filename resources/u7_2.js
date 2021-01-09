var interval = null;

// Add new speaker
document.getElementById("form").onsubmit = function(event) {
	event.preventDefault();
	
	var listElement = document.createElement("li");
	var name = document.createElement("span");
	var timer = document.createElement("span");
	var start = document.createElement("button");
	var stop = document.createElement("button");
	
	name.textContent = document.getElementById("newEntry").value;
	
	timer.dataset.value = 0;
	timer.textContent = formatTimeStamp(0);
	
	start.setAttribute("name", "start");
	start.setAttribute("onclick", "start(this.parentNode)");
	start.textContent = "Start!";
	
	stop.setAttribute("name", "stop");
	stop.setAttribute("onclick", "stop()");
	stop.textContent = "Stopp!";
	
	listElement.appendChild(name);
	listElement.appendChild(timer);
	listElement.appendChild(start);
	listElement.appendChild(stop);
	
	document.getElementById("list").appendChild(listElement);
	
	window.start(document.getElementById("list").lastElementChild);
}

// stop timer for all speakers
function stop() {
	clearInterval(interval);
	Array.prototype.forEach.call(document.getElementsByName("stop"), x => x.style.display = "none");
	Array.prototype.forEach.call(document.getElementsByName("start"), x => x.style.display = "inline-block");
}

// regularly executed function
function run(element) {
	element.childNodes[1].dataset.value++;
	element.childNodes[1].textContent = formatTimeStamp(element.childNodes[1].dataset.value);
}

// start a timer for a speaker
function start(element) {
	stop();
	element.childNodes[2].style.display = "none";
	element.childNodes[3].style.display = "inline-block";
	interval = setInterval(function() {run(element);}, 1000);
}

// format timestamp to xx:xx:xx
function formatTimeStamp(timestamp) {
	const date = new Date(timestamp * 1000);
	date.setTime(date.getTime() + date.getTimezoneOffset()*60*1000);
	return date.getHours().toString().padStart(2, "0")
		+ ":" + date.getMinutes().toString().substr(-2).padStart(2, "0")
		+ ":" + date.getSeconds().toString().substr(-2).padStart(2, "0");
}