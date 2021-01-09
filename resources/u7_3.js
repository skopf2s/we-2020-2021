// adds two new input fields along with a button to remove said fields
function addInput() {
	var listElement = document.createElement("li");
	var input1 = document.createElement("input");
	var input2 = document.createElement("input");
	var button = document.createElement("button");
	
	input1.type = "text";
	input1.placeholder = "predecessor";
	
	input2.type = "text";
	input2.placeholder = "successor";
	
	button.setAttribute("onclick", "removeInput(this)");
	button.textContent = "Beziehung entfernen";
	
	listElement.appendChild(input1);
	listElement.appendChild(input2);
	listElement.appendChild(button);
	
	document.getElementById("input").appendChild(listElement);
}

// removes related input fields along with the calling button itself
function removeInput(element) {
	element.parentNode.remove();
}

// reads input, sorts topologically and inserts result below inputs
function evaluateInput() {
	var arr = [];
	var length = 0;
	var predecessors = {};
	var sortedArray = [];
	
	var nodes = Array.from(document.getElementById("input").childNodes);
	Array.prototype.forEach.call(nodes, (node) => {
		arr.push([node.childNodes[0].value, node.childNodes[1].value]);
	});
	
	for(var i in arr) {
		if(predecessors[arr[i][0]] == null) {
			predecessors[arr[i][0]] = 0;
			length++;
		}
		
		if(predecessors[arr[i][1]] == null) {
			predecessors[arr[i][1]] = 1;
			length++;
		} else {
			predecessors[arr[i][1]]++;
		}
	}
	
	while(length > 0) {
		for(var i in predecessors) {
			if(predecessors[i] === 0) {
				sortedArray.push(i);
				
				for(var j in arr) {
					if(arr[j][0] === i) {
						predecessors[arr[j][1]]--;
					}
				}
				
				delete predecessors[i];
				length--;
			}
		}
	}
	
	document.getElementById("output").textContent = sortedArray.join(", ");
}