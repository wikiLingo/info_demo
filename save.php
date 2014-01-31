<?php
if (isset($_POST['source'])) {
    file_put_contents('demo.wl', $_POST['source']);
    echo 'success';
} else {
    echo 'nothing';
}