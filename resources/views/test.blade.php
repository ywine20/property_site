<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laravel multiple select</title>
</head>
<style>
.multiselect {
  width: 200px;
}
.selectBox {
  position: relative;
}
.selectBox select {
  width: 100%;
  font-weight: bold;
}
.overSelect {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}
#checkboxes {
  display: none;
  border: 1px solid #ccc;
}
#checkboxes label {
  display: block;
  margin: 8px 0;
}


</style>

<body>
<div class="multiselect">
    <div class="selectBox" onclick="showCheckboxes()">
        <select>
            <option>Select options</option>
        </select>
        <div class="overSelect"></div>
    </div>
    <div id="checkboxes">
        <input type="text" id="myInput" onkeyup="filterFunction()" placeholder="Search...">
        <ul>
            <li><label for="option1"><input type="checkbox" id="option1" name="option1" value="option1" />laravel</label></li>
            <li><label for="option2"><input type="checkbox" id="option2" name="option2" value="option2" />php</label></li>
            <li><label for="option3"><input type="checkbox" id="option3" name="option3" value="option3" />js</label></li>
        </ul>
    </div>
</div>


<script>
  // Show checkboxes when select box is clicked
function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (checkboxes.style.display === "block") {
    checkboxes.style.display = "none";
  } else {
    checkboxes.style.display = "block";
  }
}

// Filter function for search input
function filterFunction() {
  var input, filter, ul, li, label, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  ul = document.getElementsByTagName("ul")[0];
  li = ul.getElementsByTagName("li");
  for (i = 0; i < li.length; i++) {
    label = li[i].getElementsByTagName("label")[0];
    txtValue = label.textContent || label.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
</script>
</body>

</html>
