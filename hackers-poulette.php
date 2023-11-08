<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hackers Poulette</title>
    <link rel="stylesheet" href="assets/css/style.css" media="screen">
</head>
<body>
<?php

// define the sanitize function outside of the conditional block
function sanitize($data) {
    $data = trim($data);                // Remove leading and trailing whitespaces
    $data = stripslashes($data);        // Remove backslashes (\)
    $data = htmlspecialchars($data);    // Convert special characters to HTML entities
    return $data;
}
// define variables and set to empty values
$nameError = $firstnameError = $emailError = $genderError = $countryError = $descriptionError = "";
$name = $firstname = $email = $gender = $country = $description ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


  //name
  if (empty($_POST["name"])) {
    $nameError = "Name is required";
} else {
    $name = sanitize($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $nameError = "Only letters and white space allowed";
    }
}


  //firstname
  if (empty($_POST["firstname"])) {
    $firstnameError = "Firstname is required";
  } else {
    $firstname = sanitize($_POST["firstname"]);
    // check if firstname only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
      $firstnameError = "Only letters and white space allowed";
    }
  }
  
  //gender
  if (empty($_POST["gender"])) {
    $genderError = "Gender is required";
  } else {
    $gender = sanitize($_POST["gender"]);
  }

  //email
  if (empty($_POST["email"])) {
    $emailError = "Email is required";
  } else {
    $email = sanitize($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailError = "Invalid email format";
    }
  }

  //country
  if (empty($_POST["country"])) {
    $countryError = "Country is required";
  } else {
    $country = sanitize($_POST["country"]);
    // check if country only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$country)) {
      $countryError = "Only letters and white space allowed";
    }
  }

  //description
  if (empty($_POST["message"])) {
    $descriptionError = "Description is required";
  } else {
    $description = sanitize($_POST["message"]);
    // check if description only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$description)) {
      $descriptionError = "Only letters and white space allowed";
    }
  }
  
  print_r ($name);
  print_r($firstname);
  print_r($email);
  print_r($gender);
  print_r($country);
  print_r($description);
}



// si toute les donnees sont valide (cad message d'erreur est vide, on redirige vers la page merci)
// if ($nameError === "" && $firstnameError === "" && $genderError === "" && $emailError === "" && $countryError === ""){
//    header("Location: http://localhost/Projet%20Poulette/thanks.php");
//   exit; // Assurez-vous de terminer le script après la redirection

// ENVOI MAIL
  $to = "admin@wampserver.invalid";
  $subject = "Nouveau formulaire soumis";
  $message = "Nom: $name\nPrénom: $firstname\nGenre: $gender\nE-mail: $email\nPays: $country\nSujet: $subject\nMessage: $description";
  if (mail($to, $subject, $message)) {
  } else {
     echo "Désolé, une erreur s'est produite lors de l'envoi de l'e-mail.";
    }



?>
<header>
    <h1>Welcome to <span>Hackers Poulette</span> contact support</h1>
    <img src="assets/images/hackers-poulette-logo.png" alt="logo de la société hackers poulette">
</header>

<main>
    <h2>To help you as best as possible, fill out the form below.</h2>
    <form method="post" action="">
      <p class="error">* required field</p>

        <div class="nameDiv">
            <label for="name">Name: </label>
                <input id="name" type="text" placeholder="name" name="name">
            <p class="error">* <?php echo $nameError;?></p>
        </div>

        <div class="firstNameDiv">    
            <label for="firstname">Firstname: </label>
                <input id="firstname" type="text" placeholder="firstname" name="firstname">
            <p class="error">* <?php echo $firstnameError;?></p> 
        </div>
        
        <div class="sexeDiv" >
            <p>Gender: </p>
            <label for="gender">Man</label>
                <input id="gender" type="radio" name="gender" value="male">
            <label for="gender">Woman</label>
                <input id="gender" type="radio" name="gender" value="female"> 
            <p class="error">* <?php echo $genderError;?></p>
        </div>
                 
        <div class="emailDiv">
            <label for="email">Email:</label>
                <input type="email" placeholder="default@example.com" id="email" name="email">  <!--pattern=".+@globex\.com" -->
                <br>
                <p class="error">* <?php echo $emailError;?></p>
        </div>
        
        <div class="coutryDiv">
            <label for="country">Country:</label>
                <input id="country" type="text"  placeholder="country">
                <br>
                <p class="error">* <?php echo $countryError;?></p>
        </div>    
        
        <label for="subjets">What's the subject ?</label>
            <select id="subjets" name="subjets">
                <option value="default">Other</option>
                <option value="opt1">Option 1</option>
                <option value="opt2">Option 2</option>
                <option value="opt3">Option 3</option>
            </select>
            <br>

        <div class="descriptionDiv" >
            <label for="message">Description:</label>
            <textarea id="message" name="message"></textarea>
            <p class="error">* <?php echo $descriptionError;?></p>
        </div> 
        
        
        <input class="button" type="submit" name="submit" value="Send">
        
        
        
    </form>
</main>

<footer>

</footer>
</body>
</html>


<!-- tester le nom, le prenom, le genre, PAS le subject (il a une valeur par defaut), et la description  
 afficher le message dans un p vide (crée en html), à coté de l'input qu'on vérifie  -->

 <!-- https://tryphp.w3schools.com/showphp.php?filename=demo_form_validation_complete -->
