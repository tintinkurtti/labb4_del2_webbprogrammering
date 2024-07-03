<?php
$page_title = "Visitors";
include("includes/header.php");
include("includes/functions.php");
//Create a new instance of the GuestBook class
$posts = new GuestBook();
//If the delete_index is set, call the deletePost method with the delete_index as a parameter
if (isset($_POST['delete_index'])) {
   $posts->deletePost($_POST['delete_index']);
}
//If the publish button is clicked, call the makePost method with the guest and message as parameters
if (isset($_POST["publish"])) {
    $guest = $_POST["guest"];
    $message = $_POST["message"];
    $posts->makePost($guest, $message);
}
?>
    <h2>Gästbok</h2>
<?php
//Call the printPost method to print all posts
$posts->printPosts();
?>
<!--Create a form to make a new post-->
    <h3>Skapa inlägg</h3>
    <form method="post">
        <label for="guest"><b>Namn:</b></label><br>
        <input type="text" name="guest" id="guest" required><br>
        <label for="message"><b>Meddelande:</b></label><br>
        <textarea name="message" id="message" rows="4" cols="50" required></textarea><br>
        <input type="submit" name="publish" value="Publicera">
    </form>

<?php
include("includes/footer.php");
?>