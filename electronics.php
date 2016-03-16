<!Doctype html>
<html>
<head>
<style type="text/css">

.gallerycontainer{
position: relative;
/*Add a height attribute and set to largest image's height to prevent overlaying*/
}

.thumbnail img{
border: 1px solid white;
margin: 0 5px 5px 0;
}

.thumbnail:hover{
background-color: transparent;
}

.thumbnail:hover img{
border: 1px solid blue;
}






</style>

</head>
<body>
<h3 class="black-text">Electronics available in the store</h3>
<div class="gallerycontainer">
<div class="row">
<a class="thumbnail col s6" target="_blank" href="images/computer.jpg"><img src="images/computer.jpg" width=80% height="80px" border="0" /><span>COMPUTER</span></a>

<a class="thumbnail col s6" target="_blank" href="images/calculator.png"><img src="images/calculator.png" width="168px" height="80px" border="0" /><span>CALCULLATOR</span></a>
</div>

<div class="row">
<a class="thumbnail col s6" target="_blank" href="images/projector.jpg"><img src="images/projector.jpg" width=80% height="80px" border="0" /><span>PROJECTOR</span></a> 

<a class="thumbnail col s6" target="_blank" href="images/punching.jpg"><img src="images/punching.jpg" width="168px" height="80px" border="0" /><span>PUNCHING MACHINE</span></a>

<br />
</div>

</div>

</body>
</html>