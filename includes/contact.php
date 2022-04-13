<div class="column right">
    <?php
    if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $subject = mysqli_real_escape_string($conn, $_POST['subject']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        if (!empty("name") && !empty($email) && !empty($subject) && !empty($message)) {
            $sql = "INSERT INTO `message` (`id`, `name`, `email`, `subject`, `message`) VALUES (NULL, '$name', '$email', '$subject', '$message');";
            if (mysqli_query($conn, $sql)) {
                echo "<script> window.location = 'index.php#contact';</script>";
                echo " <h3 style='color: green;'>Your message was sent,you will be answered soon!</h3>";
            }
        } else {
            echo "<script> window.location = 'index.php#contact';</script>";
            echo "<h3 style='color: red;' >Please fill all the fields!</h3>";
        }
    }
    ?>
    <div class="text">Message me</div>
    <form method="POST">
        <div class="fields">
            <div class="field name">
                <input type="text" name="name" placeholder="Name" required>
            </div>
            <div class="field email">
                <input type="email" name="email" placeholder="Email">
            </div>
        </div>
        <div class="field">
            <input type="text" name="subject" placeholder="Subject" required>
        </div>
        <div class="field textarea">
            <textarea cols="30" rows="10" name="message" placeholder="Message.." required></textarea>
        </div>
        <div class="button-area">
            <button type="submit" name="submit">Send message</button>
        </div>
    </form>
</div>