<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hide Input2 if Input1 is not Equal to 1</title>
</head>
<body>

<select id="input1">
  <option value="1">Option 1</option>
  <option value="2">Option 2</option>
  <option value="3">Option 3</option>
</select>

<input type="text" id="input2" placeholder="This will be hidden">

<script>
  // Get references to the input elements
  const input1 = document.getElementById('input1');
  const input2 = document.getElementById('input2');

  // Function to handle the input1 change event
  function handleInputChange() {
    // If input1 value is not equal to "1", hide input2; otherwise, display it
    if (input1.value !== '1') {
      input2.style.display = 'none';
    } else {
      input2.style.display = 'inline-block';
    }
  }

  // Attach the handleInputChange function to the input1 change event
  input1.addEventListener('change', handleInputChange);

  // Call handleInputChange initially to set the initial state
  handleInputChange();
</script>

</body>
</html>