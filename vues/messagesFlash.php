<?php
    if (!empty($_SESSION['message'])) {
    $mesMessages = $_SESSION['message'];
    foreach ($mesMessages as $key => $message) {
    echo "<div class='alert alert-" . $key . "  role=' alert'>" . $message .
        "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    }
    $_SESSION['message'] = [];
    }
