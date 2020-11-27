<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: home");
}

function getContent($args) {
	return '<h1>Aufgabe 3.2 – Responsiv mit Grid Mobile-First</h1>
	<p><b>Implementieren Sie <a href="https://kaul.inf.h-brs.de/we/assets/img/landing.png">folgende</a> Landing Page responsiv mit Grid Layout. Vermeiden Sie außerdem das Erscheinen von Scrollbars so weit wie möglich.</b></p>
	<p>Der notwendige Code dafür sieht so aus:</p>
	<p><pre>&lt;!DOCTYPE html>
&lt;html>
&lt;head>
&lt;style>
html {
	padding-top: 100px;
	padding-bottom: 220px;
	min-height: calc(100% - 320px);
	position: relative;
}

body {
	font-size: 150%;
	background: #EBEAE6;
	height: 100%;
	text-align: center;
}

span {
	margin: 10px;
}

p {
	margin: 50px;
}

img {
	border: 2px solid #525252;
	border-radius: 10px;
}

button {
	background: #F88E37;
	border: none;
	color: white;
	border-radius: 5px;
	padding: 10px;
	padding-left: 70px;
	padding-right: 70px;
	font-size: 100%;
}

.head {
	position: fixed;
	top: 0;
	left: 0;
	right: 0;
	width: auto;
	height: 100px;
	background: #363636;
	border-bottom: 1px solid #585857;
	color: #EBEAE6;
}

.head span {
	line-height: 100px;
}

@media only screen and (min-width: 900px) {
	.content {
		display: grid;
		grid-template-rows: auto auto;
		grid-template-columns: 50% 50%;
	}

	.content div:first-child {
		grid-column-end: span 2;
	}
}

@media only screen and (max-width: 899px) {
	.content {
		display: grid;
		grid-template-rows: auto auto auto;
		grid-template-columns: 100%;
	}
}

.foot {
	position: absolute;
	height: 220px;
	bottom: 0;
	left: 0;
	right: 0;
	background: #011826;
	border-top: #54636A;
	color: #EBEAE6;
}
&lt;/style>
&lt;/head>
&lt;body>
&lt;div class="head">
&lt;span>The book series&lt;/span>
&lt;span>Testimonials&lt;/span>
&lt;span>The Author&lt;/span>
&lt;span>Free resources&lt;/span>
&lt;/div>
&lt;div class="content">
&lt;div>&lt;h2>You don\'t know JavaScript&lt;/h2>&lt;/div>
&lt;div>&lt;img src="https://kaul.inf.h-brs.de/we/assets/img/landing-img.png" alt="landing-img" height="500px"/>&lt;/div>
&lt;div>
&lt;p>Don\'t just drift through Javascript.&lt;/p>
&lt;p>Understand how Javascript works&lt;/p>
&lt;p>Start your journey through the bumpy side of Javascript&lt;/p>
&lt;button>ORDER YOUR COPY NOW&lt;/button>
&lt;/div>
&lt;/div>
&lt;div class="foot">
&lt;p>The first ebook in the book series is absolutely free.&lt;/p>
&lt;button>FIND OUT MORE ABOUT THIS OFFER&lt;/button>
&lt;/div>
&lt;/body>
&lt;/html></pre></p>
	<p>Das Ergebnis sieht dann etwa so aus (Aufgrund technischer Limitierungen muss auf die Anzeige des Headers verzichtet werden):</p>
	<div class="solution-only">
	<div id="solution-html">
	<div id="solution-body">
<!--<div class="head">
<span>The book series</span>
<span>Testimonials</span>
<span>The Author</span>
<span>Free resources</span>
</div>-->
<div class="content">
<div><h2>You don\'t know JavaScript</h2></div>
<div><img src="https://kaul.inf.h-brs.de/we/assets/img/landing-img.png" alt="landing-img" height="500px"/></div>
<div>
<p>Don\'t just drift through Javascript.</p>
<p>Understand how Javascript works</p>
<p>Start your journey through the bumpy side of Javascript</p>
<button>ORDER YOUR COPY NOW</button>
</div>
</div>
<div class="foot">
<p>The first ebook in the book series is absolutely free.</p>
<button>FIND OUT MORE ABOUT THIS OFFER</button>
</div>
</div>
</div>
</div>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 3.2",
	"style"=>".solution-only #solution-html {
	padding-top: 100px;
	padding-bottom: 220px;
	min-height: calc(100% - 320px);
	position: relative;
}

.solution-only #solution-body {
	font-size: 150%;
	background: #EBEAE6;
	height: 100%;
	text-align: center;
}

.solution-only span {
	margin: 10px;
}

.solution-only p {
	margin: 50px;
}

.solution-only img {
	border: 2px solid #525252;
	border-radius: 10px;
}

.solution-only button {
	background: #F88E37;
	border: none;
	color: white;
	border-radius: 5px;
	padding: 10px;
	padding-left: 70px;
	padding-right: 70px;
	font-size: 100%;
}

.solution-only .head {
	position: fixed;
	top: 0;
	left: 0;
	right: 0;
	width: auto;
	height: 100px;
	background: #363636;
	border-bottom: 1px solid #585857;
	color: #EBEAE6;
}

.solution-only .head span {
	line-height: 100px;
}

@media only screen and (min-width: 900px) {
	.solution-only .content {
		display: grid;
		grid-template-rows: auto auto;
		grid-template-columns: 50% 50%;
	}

	.solution-only .content div:first-child {
		grid-column-end: span 2;
	}
}

@media only screen and (max-width: 899px) {
	.solution-only .content {
		display: grid;
		grid-template-rows: auto auto auto;
		grid-template-columns: 100%;
	}
}

.solution-only .foot {
	position: absolute;
	height: 220px;
	bottom: 0;
	left: 0;
	right: 0;
	background: #011826;
	border-top: #54636A;
	color: #EBEAE6;
}");
}
?>