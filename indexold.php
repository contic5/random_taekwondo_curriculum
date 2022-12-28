<html>
<head>

</head>
<body>
<?php
$myfile=file("il_so_soik.txt");
$myfile_array = json_encode($myfile);
?>
<h1>Random Curriculum</h1>
<p>
<button onclick='next()' id='nextbutton'>Next</button>
<button onclick='previous()' id='previousbutton' disabled>Previous</button>
</p>
<p><button onclick='random()'>Random</button></p>
<p>
<button onclick='shuffle()'>Shuffle Order</button>
<button onclick='original()' disabled>Original Order</button>
</p>

<h2 id='result'>Result</h2>
<p id='elements'>Elements</p>

<script>
<?php
echo "var myfile_array = ". $myfile_array . ";\n";
?>
function next()
{
  loc+=1;
  document.getElementById('previousbutton').disabled=false;
  if(loc==end-1)
  {
    document.getElementById('nextbutton').disabled=true;
  }
  display();
}
function previous()
{
  loc-=1;
  document.getElementById('nextbutton').disabled=false;
  if(loc==0)
  {
    document.getElementById('previousbutton').disabled=true;
  }
  display();
}
function random()
{
  loc=Math.floor(Math.random()*end);
  display();
}
function shuffle()
{
  for(i = myfile_array.length - 1; i > 0; i--)
  {
    j = Math.floor(Math.random() * i);
    temp = myfile_array[i];
    myfile_array[i] = myfile_array[j];
    myfile_array[j] = temp;
  }
  document.getElementById('elements').innerHTML=myfile_array;
  loc=0;
  document.getElementById('previousbutton').disabled=true;
  display();
}
function original()
{
  myfile_array=original;
  document.getElementById('elements').innerHTML=myfile_array;
  loc=0;
  document.getElementById('previousbutton').disabled=true;
  display();
}
function display()
{
  document.getElementById('result').innerHTML=myfile_array[loc];
}
var original=myfile_array;
document.getElementById('elements').innerHTML=myfile_array;
var loc=0;
var end=myfile_array.length;
display();
</script>
</body>
</html>
