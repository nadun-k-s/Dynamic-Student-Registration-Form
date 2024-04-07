<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <?php require 'header.php'?>
  </header>

  <div class="container mt-5">
    <h2 class="mb-4">Student Registration Form</h2>
    <div id="message"></div>
    <form id="studentForm">
      <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Student Name:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="name" name="name" required>
        </div>
      </div>
      <div class="row mb-3">
        <label for="birthday" class="col-sm-2 col-form-label">Birthday:</label>
        <div class="col-sm-3">
          <input type="date" class="form-control" id="birthday" name="birthday" required>
        </div>
      </div>
      <div class="row mb-3">
        <label for="address" class="col-sm-2 col-form-label">Address:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="address" name="address" required>
        </div>
      </div>
      <div class="row mb-3">
        <label for="phone" class="col-sm-2 col-form-label">Phone Number:</label>
        <div class="col-sm-6">
          <input type="tel" class="form-control" id="phone" name="phone" required onchange="validatePhone()">
          <div id="phoneError" class="invalid-feedback"></div>
        </div>
      </div>
      <div class="row mb-3">
        <label for="email" class="col-sm-2 col-form-label">Email:</label>
        <div class="col-sm-6">
          <input type="email" class="form-control" id="email" name="email" required onchange="validateEmail()">
          <div id="emailError" class="invalid-feedback"></div>
        </div>
      </div>
      <div class="row">
          <div class="col-sm-6 offset-sm-2">
              <button type="button" id="submitButton" class="btn btn-primary" >Register</button>
          </div>
      </div>
    </form>


    <hr>

    <h2>Registered Students</h2>
    <table id="studentTable" class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Student Name</th>
                <th scope="col">Birthday</th>
                <th scope="col">Address</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Email</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
  </div>

  <div id="updateModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Update Student Details</h2>
        <form id="updateForm">
            <input type="hidden" id="updateId" name="updateId">
            <div class="row mb-3">
                <label for="updateName" class="col-sm-2 col-form-label">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="updateName" name="updateName" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="updateBirthday" class="col-sm-2 col-form-label">Birthday:</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="updateBirthday" name="updateBirthday" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="updateAddress" class="col-sm-2 col-form-label">Address:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="updateAddress" name="updateAddress" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="updatePhone" class="col-sm-2 col-form-label">Phone Number:</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" id="updatePhone" name="updatePhone" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="updateEmail" class="col-sm-2 col-form-label">Email:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="updateEmail" name="updateEmail" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

  <footer class="footer mt-auto py-3 bg-light">
    <?php require 'footer.php'?>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>
