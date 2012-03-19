// Test Rock Paper Scissors game for Luchalink
// @author dlederle
// @date 3/10/12
// @course cpsc350

//Library
var ctx;
var WIDTH
var HEIGHT;

//$(document).ready(function() {
	init()
//});

function drawText(text, element) {
	$("#" + element).replaceWith("<h3 id=" + element + ">" + text + "</h3>");
}

function enemyRoll() {
	var rand = Math.floor(Math.random() * (3));
	var roll;
	if(rand === 0) {
		roll = "rock";
	}
	if(rand === 1) {
		roll = "paper";
	}
	if(rand == 2) {
		roll = "shotgun";
	}
	return roll;
}

//Returns the string of who wins
function compare(player, enemy) {
	var output = "error";
	if(player === "rock") {
		if(enemy === "rock") {output = "Nobody";}
		if(enemy === "paper") {output = "Opponent";}
		if(enemy === "shotgun") {output = "You";}
	} else if(player === "paper") {
		if(enemy === "rock") {output = "You";}
		if(enemy === "paper") {output = "Nobody";}
		if(enemy === "shotgun") {output = "Opponent";}
	} else if(player === "shotgun") {
		if(enemy === "rock") {output = "Opponent";}
		if(enemy === "paper") {output = "You";}
		if(enemy === "shotgun") {output = "Nobody";}
	}
	return output;
}

function init() {
	//alert("test");
	ctx = $("#canvas")[0].getContext("2d");
	WIDTH = $("#canvas").width();
	HEIGHT = $("#canvas").height();

	$("button").click(function () {
		var input = this.id;
		var enemy = enemyRoll();
		drawText("You chose " + input, "input");
		drawText("They chose " + enemy, "opponent");
		drawText(compare(input, enemy) + " wins!", "output");
	});
}

