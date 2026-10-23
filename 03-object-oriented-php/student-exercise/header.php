<!DOCTYPE html>
<html>
<head>
<style>
body {
  margin: 0;
  padding: 0;
  font-family: arial, sans-serif;
}

h2, p {
  margin: 10px;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #38444d;
}

li {
  float: left;
}

li a, .dropbtn {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

li.dropdown {
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
  display: block;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 60%;
  padding: 20px;
  margin: 20px;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

form{
    width: 50%;
    padding: 20px;
}

form label{
    display: block;
    margin-top: 10px;
}
</style>
</head>
<body>
 <ul>
  <li><a href="index.php">Home</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Prijave ispita</a>
    <div class="dropdown-content">
      <a href="pregledPrijava.php">Pregled prijava</a>
      <a href="prijavaForm.php">Nova prijava</a>
    </div>
  </li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Studenti</a>
    <div class="dropdown-content">
      <a href="pregledStudenata.php">Pregled studenata</a>
      <a href="studentForm.php">Novi student</a>
    </div>
  </li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Ispiti</a>
    <div class="dropdown-content">
      <a href="pregledIspita.php">Pregled ispita</a>
      <a href="ispitForm.php">Novi ispit</a>
    </div>
  </li>
</ul>