<html>
<?php
  function runMyFunction() {
    echo 'I just ran a php function';
  }

  if (isset($_GET['hello'])) {
    runMyFunction();
  }
?>

Hello there!
<a href='view.php?hello=true'>Run PHP Function</a>
</html>