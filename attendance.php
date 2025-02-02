<?php
      $correctNumber = 12; // Default value
      include "update_correct_number.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Attendance Check</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <div class="container">
      <h1>Attendance Check</h1>
      <div id="numbers"></div>
      <label for="numberInput">Enter the Correct Number :</label>
      <input type="number" id="numberInput" />
      <button type="submit" onclick="checkAttendance()">Check Attendance</button>
      <p id="result"></p>
    </div>

    <script>

      function generateNumbers() {
        let randomNumber1 = Math.floor(Math.random() * 100);
        let randomNumber2 = Math.floor(Math.random() * 100);
        let correctNumber = <?php echo $correctNumber; ?>;

        const numbers = [correctNumber, randomNumber1, randomNumber2];

        for (let i = numbers.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [numbers[i], numbers[j]] = [numbers[j], numbers[i]];
        }

        return numbers;
        }

        document.addEventListener("DOMContentLoaded", function () {
          const numbers = generateNumbers();
          displayNumbers(numbers);
        });

        function displayNumbers(numbers) {
          const numbersContainer = document.getElementById("numbers");
          numbersContainer.innerHTML = "Pick a number : ";
          numbers.forEach((number) => {
            numbersContainer.innerHTML += number + " ";
          });
        }

        function getQueryParameter(name) {
          const urlParams = new URLSearchParams(window.location.search);
          return urlParams.get(name);
        }

        let correctNumber = <?php echo $correctNumber; ?>;

        if (correctNumber) {
          const numbersContainer = document.getElementById("numbers");
          numbersContainer.innerText =
            "Generated Numbers: " + generateNumbers().join(", ");
          numbersContainer.innerHTML += "<br>Correct Number: " + correctNumber;
        }

       
        function checkAttendance() {
    const enteredNumber = parseInt(document.getElementById("numberInput").value);
    if (!enteredNumber || isNaN(enteredNumber)) {
        alert("Please enter a valid number.");
        return;
    }

    if (enteredNumber == correctNumber) {
        // Display form for present students
        document.getElementById("result").innerHTML = 
            <h2>Mark Presence</h2>
            <form id="presentForm">
                <label for="name">Enter your full name:</label>
                <input type="text" id="name" name="name" required>
                <label for="id">Enter your ID:</label>
                <input type="number" id="id" name="id" required>
                <button type="submit" onclick="markPresent(event)">Mark Present</button>
            </form>
       
    } else {
        // Display form for absent students
        document.getElementById("result").innerHTML = 
            <h2>Mark Absence</h2>
            <form id="absentForm">
                <label for="name">Enter your full name:</label>
                <input type="text" id="name" name="name" required>
                <label for="id">Enter your ID:</label>
                <input type="number" id="id" name="id" required>
                <button type="submit" onclick="markAbsent(event)">Mark Absent</button>
            </form>
       
    }
}


function markPresent(event) {
    event.preventDefault();
    const name = document.getElementById("name").value;
    const id = document.getElementById("id").value;

    // Submit form data to present.php
    const form = document.createElement("form");
    form.method = "post";
    form.action = "present.php";

    const nameInput = document.createElement("input");
    nameInput.type = "hidden";
    nameInput.name = "name";
    nameInput.value = name;
    form.appendChild(nameInput);

    const idInput = document.createElement("input");
    idInput.type = "hidden";
    idInput.name = "id";
    idInput.value = id;
    form.appendChild(idInput);

    document.body.appendChild(form);
    form.submit();
}

function markAbsent(event) {
    event.preventDefault();
    const name = document.getElementById("name").value;
    const id = document.getElementById("id").value;

    // Submit form data to absent.php
    const form = document.createElement("form");
    form.method = "post";
    form.action = "absent.php";

    const nameInput = document.createElement("input");
    nameInput.type = "hidden";
    nameInput.name = "name";
    nameInput.value = name;
    form.appendChild(nameInput);

    const idInput = document.createElement("input");
    idInput.type = "hidden";
    idInput.name = "id";
    idInput.value = id;
    form.appendChild(idInput);

    document.body.appendChild(form);
    form.submit();
}



    function markPresent(event) {
        event.preventDefault();
        const name = document.getElementById("name").value;
        const id = document.getElementById("id").value;

        // Submit form data to present.php
        const form = document.createElement("form");
        form.method = "post";
        form.action = "present.php";

        const nameInput = document.createElement("input");
        nameInput.type = "hidden";
        nameInput.name = "name";
        nameInput.value = name;
        form.appendChild(nameInput);

        const idInput = document.createElement("input");
        idInput.type = "hidden";
        idInput.name = "id";
        idInput.value = id;
        form.appendChild(idInput);

        document.body.appendChild(form);
        form.submit();
    }

    function markAbsent(event) {
        event.preventDefault();
        const name = document.getElementById("name").value;
        const id = document.getElementById("id").value;

        // Submit form data to absent.php
        const form = document.createElement("form");
        form.method = "post";
        form.action = "absent.php";

        const nameInput = document.createElement("input");
        nameInput.type = "hidden";
        nameInput.name = "name";
        nameInput.value = name;
        form.appendChild(nameInput);

        const idInput = document.createElement("input");
        idInput.type = "hidden";
        idInput.name = "id";
        idInput.value = id;
        form.appendChild(idInput);

        document.body.appendChild(form);
        form.submit();
    }









    </script>
  </body>
</html>
