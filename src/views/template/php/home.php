<h1>home page</h1>
<?php 
if(!empty($_SESSION)) {
    echo '<pre>' . $_SESSION['lastname'] . '</pre>';
    echo '<pre>' . $_SESSION['firstname'] . '</pre>';
    echo '<pre>' . $_SESSION['idUser'] . '</pre>';

} else {
    header('Location: /onightroof/signIn');
    exit;
}
?>