<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form action="welcome.php" class="needs-validation" method="post" novalidate enctype="multipart/form-data">
            <div class="mb-3">
                <label for="fileToUpload" class="form-label"></label>
                <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
            </div>
            <div class="mb-3">
                <label class="form-label" for="name">Username</label>
                <input class="form-control" type="text" name="name" id="name" required>
                <div class="invalid-feedback">
                    Please choose a username.
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" required>
                <div class="invalid-feedback">
                    Please enter email.
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="gender">Gender</label>
                <input class="form-control" type="text" name="gender" id="gender" required>
                <div class="invalid-feedback">
                    Please choose gender.
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="class">Class</label>
                <input class="form-control" type="text" name="class" id="class" required>
                <div class="invalid-feedback">
                    Please enter class.
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" type="password" name="password" id="password" required>
                <div class="invalid-feedback">
                    Please enter password.
                </div>
            </div>
            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
<script>
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>

</html>