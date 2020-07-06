<?php include '../lib/db.php'; ?>

<?php 

if (isset($_POST['submit'])) {
  require '../lib/validator.class.php';

  $validation = new LoginValidator($_POST);
  $errors = $validation->validateForm();
}

// if (count($errors)) {

// }

$tung = [1];
if ($tung) {
  echo 'tung';
}

?>

<?php include './components/header.php';
$tung = ['name' => 'tung']
?>
  <title>Login</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-6 mx-auto mt-5">
        <h2>Login</h2>
        <?php if (isset($_POST['submit']) && !$errors) {
          echo "
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
              <strong>Registerd successfully!</strong>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
          "; 
        } ?>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
          <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" class="form-control" value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>">
          </div>

          <?php if (isset($errors['username'])) {
            echo "
              <div class='alert alert-danger alert-dismissible fade show text-capitalize' role='alert'>
                <strong>$errors[username]</strong>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>
            ";
          } ?>

          <div class="form-group">
            <label for="password">Password:</label>
            <input type="text" name="password" id="password" class="form-control" value="<?php echo htmlspecialchars($_POST['password'] ?? ''); ?>">
          </div>

          <?php if (isset($errors['password'])) {
            echo "
              <div class='alert alert-danger alert-dismissible fade show text-capitalize' role='alert'>
                <strong>$errors[password]</strong>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>
            ";
          } ?>

          <button class="btn btn-primary  mt-2" name="submit">Login</button>
        </form>
      </div>
    </div>
  </div>

</body>
</html>