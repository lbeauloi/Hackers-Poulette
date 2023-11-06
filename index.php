<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hackers Poulette</title>
</head>
<body>
    <form method="POST" action="">
        <label for="nom">Name: </label>
            <input id="nom" type="text" placeholder="name" required>
            <br>
        <label for="prenom">Firstname: </label>
            <input id="prenom" type="text" placeholder="firstname" required>
            <br>
        <fieldset>
            <legend>Gender:</legend> 
                <label for="genre">Man</label>
                    <input id="genre" type="radio" name="genre" value="male" checked>
                <label for="genre">Woman</label>
                    <input id="genre" type="radio" name="genre" value="female"> 
                    <br>
        </fieldset>

        <label for="email">Email:</label>
            <input type="email" placeholder="default@example.com" id="email" pattern=".+@globex\.com" required>   
            <br>
        <label for="country">Country:</label>
            <input id="country" type="text"  placeholder="country" required>
            <br>
        <label for="subjets">What's the subject ?</label>
            <select id="subjets" name="subjets">
                <option value="opt1">Option 1</option>
                <option value="opt2">Option 2</option>
                <option value="opt3">Option 3</option>
            </select>
            <br>
        <label for="message">Description:</label>
            <textarea id="message" name="message" required></textarea>
            <br>
        <input class="button" type="submit" name="submit" value="Send">
    </form>
</body>
</html>

<!-- <?php
//  if (isset($_POST['nom'])) {
//         if
//         else
//     }
//     if (isset($_POST['prenom'])) {
//         if
//         else
//     }   
//     if (isset($_POST['genre'])) {
//         if
//         else
//     }
//     if (isset($_POST['prenom'])) {
//         if
//         else
//     }
?> -->


