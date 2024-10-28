<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FantasyFootball</title>
   
    <style media="screen">
    body {font-size: 120%;
       }

       .border { border-color: green;
                 }

#banner { display: 20%;
    display: block;
  margin-left: auto;
  margin-right: auto;
          
}

h1 {color: orangered;}
h2 {color: green;}
h3 {color: green;}
p {color: blue;}

form {color: red;}
li {font-weight: bold;}
table {
        border: 5px solid blue;
        float: left;
        
         }
th, td { 
        border: 1px solid black; 
        padding: 2px; 
        text-align: left; }

td {color: blue;}


#voti {color: orangered;}
#finale {color: red;}
#score {color:orangered;}



a:hover, a:active {
    text-decoration: underline;
    color: orangered;
    background-color:rgb(55, 121, 244); 
    border: 2px solid #FCA800; 
    color: #FF8800;               
    font-weight: bold;}

button{
        background-color:rgb(55, 121, 244); 
        border: 2px solid #FCA800; 
        color: #FF8800;               
        font-weight: bold;}

input:hover {
        text-decoration:underline white;}

#submit { 
        background-color: #FF8800; 
        border: 2px solid rgb(55, 121, 244); 
        color: rgb(55, 121, 244);               
        font-weight: bold;}

#submit1 {
        background-color:rgb(55, 121, 244); 
        border: 2px solid #FCA800; 
        color: #FF8800;               
        font-weight: bold;}


#delete:hover{  
             
            border: 2px solid ; 
            color: orangered;               
            font-weight: bold;}



svg {
                 
width: 100%;

position: absolute;
top: 0;
left: 0;
z-index: -1;
}
stop.begin {
stop-color: lightblue;
}
stop.end {
stop-color: blue;
}
body.invalid stop.end
{ stop-color: red;
}
#err {
display: none;
}
body.invalid #err {
display: inline;
}

    </style>
    
</head>

<body>
<svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 50 100"
preserveAspectRatio="xMidYMid slice">

<linearGradient id="gradient">
<stop class="begin" offset="0%"/>
<stop class="end" offset="100%"/>
</linearGradient>
<rect x="0" y="0" width="200" height="100" style="fill:url(#gradient)"/>
<circle cx="50" cy="50" r="45" style="fill:url(#gradient)"/>
</svg>

    <img src="images/fanta1.2.png" id="banner" style="margin-left: auto; margin-right: auto" >
   
    <br>
    <a href="index.php"><button>Home</button></a> -
    <?php if (!isset($_SESSION["gebruiker"])) { ?>
        <a href="publicpage.php"><button>Public Page</button></a> -
        <a href="login.php"><button>Login</button></a> -
        <a href="register.php"><button>Registreren</button></a> -
    <?php } else { ?>
        <a href="privatepage.php"><button>FantasyFootball</button></a> -
        <a href="logout.php"><button>Logout</button></a>
    <?php } ?>