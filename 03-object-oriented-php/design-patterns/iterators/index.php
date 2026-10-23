<?php

require_once "bootstrap.php";

use Iterators\Interfaces\CountableStudents;
use Iterators\Interfaces\JsonIterator;
use Iterators\Interfaces\ProductCollection;
use Iterators\Interfaces\SampleList;
use Iterators\Interfaces\StudentCollection;

use Iterators\Models\Student;
use Iterators\Models\Product;

echo "<h2>1. Sample List</h2>";

$list = new SampleList([
    "Ana",
    "Marko",
    "Luka",
    "Ivan",
    "Pero"
]);

while($list->valid()){
    echo $list->current()."<br>";
    $list->next();
}

echo "<h3>SORT Z-A</h3>";

$list->addItem("Zlatko");

$list->sortDesc();

while($list->valid()){
    echo $list->current()."<br>";
    $list->next();
}

echo "<br>Broj elemenata: ".$list->countItems();
echo "<br>Prvi element: ".$list->firstItem();
echo "<br>Zadnji element: ".$list->lastItem();
echo "<br>Postoji vrijednost \"Ivan\": ".$list->existingItem("Mali");

$list->printAll();

echo "<h2>2. Student collection</h2>";

$students = new StudentCollection();
$students->add(new Student("Ana",21));
$students->add(new Student("Marko",34));
$students->add(new Student("Boris",42));

$students->printAll();
$students->studentExists("Anaaa");

foreach($students as $student){
    echo "<br>Ime: ".$student->ime;
    echo "<br>Godine: ".$student->godine;
}

echo "<br>Ukupno: ".$students->countStudents();

echo "<h3>Custom student list</h3>";
$students->printAllCustom();

echo "<h2>3. Product collection</h2>";

$products = new ProductCollection();

$products->add(new Product("Monitor",400));
$products->add(new Product("Tipkovnica",500));
$products->add(new Product("Laptop",1500));

foreach($products as $product){
    echo "<br>Product: ".$product->naziv.", cijena: ".$product->cijena;
}

echo "<br>Total price: ".$products->totalPrice();
$products->printAll();

echo "<h2>4. JSON iterator</h2>";

file_put_contents("students.json",
json_encode([   
    new Student("Ana",20),
    new Student("Pero",30),
    new Student("Ivan",17),
    new Student("Mara",24)
],JSON_PRETTY_PRINT));

$json = new JsonIterator("students.json");

foreach($json as $item){
    echo "<br>Podatak: ".$item["ime"].", ".$item["godine"];
}

$oldest = $json->getOldest();

echo "<br>Najstariji student: ";
echo $oldest["ime"]." ".$oldest["godine"];
echo "<br>Prosjek godina: ".$json->averageYears();

echo "<h2>5. Countable iterator</h2>";

$st = new CountableStudents();
$st->add("Pero");
$st->add("Ana");
$st->add("Ivana");

echo "<br>Ukupno: ".$st->count();

echo "<h2>6. Directory iterator</h2>";

$dir = new DirectoryIterator(".");

foreach($dir as $file){
    if(!$file->isDot()){
        if($file->isDir()){
            echo "<br>Direktorij: ".$file->getFilename();
        }
        else
        {
            echo "<br>Datoteka: ".$file->getFilename();
        }
        
        echo "<br>Veličina: ".$file->getSize();
    }
}

?>