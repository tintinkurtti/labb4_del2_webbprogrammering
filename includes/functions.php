<?php
class GuestBook
{
    // Constructor for the GuestBook class
    public function __construct() {
    }

    // Print posts from the database
    public function printPosts() {
        global $conn;
        $stmt = $conn->query("SELECT * FROM GuestBookTable ORDER BY date");
        $num_rows = $stmt->rowCount(); // Count the number of rows
        if ($num_rows == 0) {
            echo "Inga inlägg att visa";
        } else {
            // Print all posts from the database
            while ($post = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='post'>";
                echo "<div class='post-content'>";
                echo "<p><strong>{$post['guest']}</strong>: {$post['message']} <strong>Datum:</strong> {$post['date']}</p>";
                echo "</div>";
                //Create a form to delete the post
                echo "<form class='delete-form' method='post'>";
                echo "<input type='hidden' name='delete_index' value='{$post['id']}'>";
                echo "<input type='submit' value='Radera'>";
                echo "</form>";
                echo "</div>";
            }
        }
    }

    // Add a post to the database
    public function makePost($guest, $message) {
        global $conn;
        $date = date("Y-m-d H:i:s");
        $stmt = $conn->prepare("INSERT INTO GuestBookTable (guest, message, date) VALUES (:guest, :message, :date)");
        $stmt->bindParam(':guest', $guest);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
    }

    // Delete a post from the database
    public function deletePost($id) {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM GuestBookTable WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
