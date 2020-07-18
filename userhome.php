<?php
include('includes/header.php');

$name = $_SESSION["name"] ;
$faculty = $_SESSION["faculty"] ;
$admin = $_SESSION['admin'];

?>
<!DOCTYPE html>
<html>
<head>
    </head>
	<style>  <!-- CSS FOR image slideshow -->
	  

.mySlides {display:none}

/* Slideshow container */
.slideshow-container {
	position: relative;
	
	border-style:inset;
	//border-color:blue;
	border-width:5px;
	border-radius:2px;
  max-width: 660px;
   //max-height: 300px;
   //align:right;
    top:30px;
	right:20px;
   
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
	position:relative;
	top:20px;
left:10px;
  cursor:pointer;
  height: 13px;
  width: 13px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style> <!--end of css for image slideshow -->
 <body background="acesrest.jpg" style=" background-size: 1366px 768px;"></body>
    <body>
        <div class="wrap">
		
			<!--Contents on HOMEPAGE left of slideshow   barfi 00:54AM 14 MAY 17 -->
		
		 <div class="home-right" style="   padding:00px;
    float:left;
    width:53%;">
	<div class="intro">
	<div class="block" style="font-family: Times new roman;
	font-size: 18px;

	font-style: normal;
	font-variant: normal;
	font-weight: 10;
	line-height: 26.4px;
	margin:15px;
	text-align: justify;
    text-justify: inter-word;">
	<h1>Overview</h1>
	<p>The Department of Computer Science & Engineering was started in the year 2001 and the Association of Computer Science Engineering Students was established. The departmental associations ACES conducts various co-curricular activities to widen the students interest in their own domain as well as in allied subjects.</p>
<p>The department has well equipped classrooms and computer laboratories with high-end systems as per the AICTE and Visvesvaraya Technological University (VTU) norms. Computing facility in Laboratories include software and utilities such as Windows Vista, Windows Advanced Server 2003, Windows XP, Widows 2000 Professional, Windows 98, Red Hat LINUX 9.0, MS Office 2010, Oracle 8i, MS Visual Studio, Borland C++, Turbo C++ Assemblers like MASM/TASM, etc.</p>
<p>Free Internet facility is made available from 9.00 am to 6.00 pm during working days through high speed optical fiber 32 Mbps leased line of BSNL.</p>
</p><p><br>ACES President: Anjana Rai<br>
ACES Secretary: Shyam Thejaswi
	</div>
</div>
</div>	
		<!--end of Contents on HOMEPAGE left of slideshow -->
		
	<!--image slideshow -->
		
    <div class="home-left" style="float:right;
    width:45%;
    box-sizing:border-box;
    height:300px;">        
			<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 7</div>
  <img src="img/1.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 7</div>
  <img src="img/2.jpg" style="width:100%">
  
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 7</div>
  <img src="img/3.jpg" style="width:100%">
  
</div>

<div class="mySlides fade">
  <div class="numbertext">4 / 7</div>
  <img src="img/4.jpg" style="width:100%">
  
</div>

<div class="mySlides fade">
  <div class="numbertext">5 / 7</div>
  <img src="img/5.jpg" style="width:100%">
  
</div>

<div class="mySlides fade">
  <div class="numbertext">6 / 7</div>
  <img src="img/6.jpg" style="width:100%">
  
</div>

<div class="mySlides fade">
  <div class="numbertext">7 / 7</div>
  <img src="img/7.jpg" style="width:100%">
  
</div>



<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span>
  <span class="dot" onclick="currentSlide(4)"></span>
  <span class="dot" onclick="currentSlide(5)"></span>
  <span class="dot" onclick="currentSlide(6)"></span>
  <span class="dot" onclick="currentSlide(7)"></span>
</div>
</div>	
	<!-- end of image slideshow -->
  
 <!-- <div class="home-down" style="position:absolute;float:left;margin:15px; top:600px;">
    <h2>EVENTS</h2>
	<p>Upcoming Events:</p>
    <p>  ACES Lagori - 16th May 17 </p>
     <p>  ACES cricket - 17th-19th May 17 </p>
     <p>  Drushti Eye Donation Awarness Camp - 22nd May 17 </p>
     <p>  Farewell for Final Year CSE students - 30th May 17  </p>
</p>   
			
			
	</div>	-->	
            
    </div>
<script>
var slideIndex = 0;
showSlides();

function plusSlides(n) {
  showSlides1(slideIndex += n);
}

function currentSlide(n) {
  showSlides1(slideIndex = n);
}

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 8000); // Change image every 2 seconds
}


function showSlides1(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}

</script>
			
			
			
          
    </body>
</html>
 <?php
			include('includes/footer.php');
           ?>