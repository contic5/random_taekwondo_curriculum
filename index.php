 <html>
<head>
<style type='text/css'>
h1
{
  font-size: 80px;
}
h2
{
  font-size: 36px;
}
select
{
  font-size: 18px;
}
button
{
  font-size: 24px;
}
body
{
  border: lightgray solid 10px;
  background-color: #C8A165;
  background-image: url('DD-Wood-Background-77567-Preview.jpg');
}
#content
{
  background-color: #99999980;
}
</style>
</head>
<body>
<div id='content'>
<h2>Random Curriculum</h2>
<h2>Select Curriculum</h2>
<select id='options' onchange="getfile()">
<option value='ten_basic_motions'>Ten Basic Motions</option>
<option value='kicking_combinations'>Kicking Combinations</option>
<option value='kicking_combinations_1st_dan'>Kicking Combinations 1st Dan</option>
<option value='kicking_combinations_2nd_dan'>Kicking Combinations 2nd Dan</option>
<option value='kicking_combinations_3rd_dan'>Kicking Combinations 3rd Dan</option>
<option value='form'>Form Color Belt</option>
<option value='form_black_belt'>Form Black Belt</option>
<option value='il_so_soik'>Il So Soik Color Belt</option>
<option value='il_so_soik_1st_dan'>Il So Soik 1st Dan</option>
<option value='il_so_soik_2nd_dan'>Il So Soik 2nd Dan</option>
<option value='il_so_soik_3rd_dan'>Il So Soik 3rd Dan</option>
<option value='self_defense'>Self Defense Color Belt</option>
<option value='self_defense_1st_dan'>Self Defense 1st Dan</option>
<option value='self_defense_2nd_dan'>Self Defense 2nd Dan</option>
<option value='self_defense_3rd_dan'>Self Defense 3rd Dan</option>
</select>

<p>
<button onclick='next()' id='nextbutton'>Next</button>
<button onclick='previous()' id='previousbutton' disabled>Previous</button>
</p>
<p><button onclick='random()'>Random</button></p>
<p>
<button onclick='shuffle()'>Shuffle Order</button>
<button onclick='original()'>Original Order</button>
</p>
<br>
<h1 id='title'>Title</h1>
<h2 id='numberon'>1 of X</h2>
<h1 id='result'>Result</h1>
<p><button id='toggleorder' onclick='toggleorder()'>Hide Order</button></p>
<p id='order'>Order</p>
<p><a href="https://www.vecteezy.com/free-vector/wood">Wood Vectors by Vecteezy</a></p>
<script>
var myfile_array=[];
var original_array=myfile_array;
var loc=0;
var end=0;
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
  document.getElementById('previousbutton').disabled=false;
  document.getElementById('nextbutton').disabled=false;
  if(loc==0)
  {
    document.getElementById('previousbutton').disabled=true;
  }
  if(loc==end-1)
  {
    document.getElementById('nextbutton').disabled=true;
  }
  display();
}
function displayorder()
{
  res='';
  for(i = 0;i<myfile_array.length; i++)
  {
    res+=myfile_array[i]+'<br>';
  }
  document.getElementById('order').innerHTML=res;
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
  displayorder();
  loc=0;
  document.getElementById('previousbutton').disabled=true;
  display();
}
function original()
{
  myfile_array=original_array;
  alert(myfile_array);
  displayorder();
  loc=0;
  document.getElementById('previousbutton').disabled=true;
  display();
}
function display()
{
  document.getElementById('result').innerHTML=myfile_array[loc];
  document.getElementById('numberon').innerHTML=(loc+1)+' of '+end;
}
function setup()
{
  original_array=JSON.parse(JSON.stringify(myfile_array));
  displayorder();
  loc=0;
  end=myfile_array.length;

  document.getElementById('previousbutton').disabled=false;
  document.getElementById('nextbutton').disabled=false;
  document.getElementById('numberon').innerHTML=(loc+1)+' of '+end;
  if(loc==0)
  {
    document.getElementById('previousbutton').disabled=true;
  }
  if(loc==end-1)
  {
    document.getElementById('nextbutton').disabled=true;
  }

  display();
}
function start(firstname)
{
  document.getElementById('title').innerHTML='Ten Basic Motions';
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
      if (this.readyState == 4 && this.status == 200)
      {
        myfile_array=JSON.parse(this.responseText);
        setup();
      }
  };
  xmlhttp.open("POST", "getcurriculum.php?filename=" + firstname, true);
  xmlhttp.send();
}
function getfile()
{
  myoptions=document.getElementById('options');
  filename=myoptions.value;
  titlename=myoptions.options[myoptions.selectedIndex].text;
  document.getElementById('title').innerHTML=titlename;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {
      if (this.readyState == 4 && this.status == 200)
      {
        myfile_array=JSON.parse(this.responseText);
        setup();
      }
  };
  xmlhttp.open("POST", "getcurriculum.php?filename=" + filename, true);
  xmlhttp.send();
}
function toggleorder()
{
  order=document.getElementById('order');
  toggleorderelem=document.getElementById('toggleorder');
  if (order.style.display === "none")
  {
    order.style.display = "block";
    toggleorderelem.innerHTML='Hide Order';
  }
  else
  {
    order.style.display = "none";
    toggleorderelem.innerHTML='Show Order';
  }
}
start('ten_basic_motions');
</script>
</div>
</body>
</html>
