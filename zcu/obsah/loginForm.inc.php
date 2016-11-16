<?php
    echo "Vše OK <br>";
?>
<link rel="stylesheet" href="styles/login_style.css"></link>
<h2>Registrace</h2>

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

<div id="id01" class="modal">

  <form class="modal-content animate" action="action_page.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>
      <img src="images/logo_avatar.png" alt="Avatar" class="avatar">
    <div class="containerLog">
      <label><b>Uživatelské jméno</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label><b>Heslo</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

        <button type="button" class="btn btn-success">Přihlásit</button>
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="btn btn-danger">Zrušit</button>
    </div>
  </form>
</div>
<script>

// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
