<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobierz dane z formularza
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    // Sprawdź poprawność e-maila
    if (!$email) {
        echo "Invalid email address.";
        exit;
    }

    // Ustawienia e-maila
    $to = "phantompulse12@gmail.com"; // Zmień na swój adres
    $subject = "New message from your portfolio";
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Treść wiadomości
    $body = "Name: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Message:\n$message\n";

    // Wyślij e-mail
    if (mail($to, $subject, $body, $headers)) {
        echo "✅ Message sent successfully!";
    } else {
        echo "❌ Error sending message. Please try again later.";
    }
}
?>
