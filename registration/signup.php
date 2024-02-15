<?php include 'header.php'; ?>
<style>
    .success {
        color: blue;
    }

    .error {
        color: red;
    }
</style>
<?php
session_start();
if (isset($_SESSION['error'])) {
    echo '
            <p class="or" style="color:red;">' . $_SESSION["error"] . '</p>
            ';
    unset($_SESSION['error']);
}
?>
<h2>Sign Up</h2>
<form action="registration.php" method="post">
    <input type="text" name="first_name" placeholder="First Name" required>
    <input type="text" name="last_name" placeholder="Last Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" onkeyup="validatePassword(this.value)" id="pwd1" placeholder="Password" required><br>
    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
    <input disabled=valid type="submit" value="Sign Up" name="signup">
</form>
<small>
    <ul class=''>
        <li class="error" id="req-1">At least 8 characters</li>
        <li class="error" id="req-2">Contains upper and lower case</li>
        <li class="error" id="req-3">Contains numbers</li>
        <li class="error" id="req-4">Contains any one of .,/,@,#,$,%,^,&amp;,*</li>
    </ul>
</small>
<div class="separator"><span>OR</span></div>
<p class="or">Already have an account?</p>
<div class="separator"><span><a href="login.php">Login</a></span></div>
</div>
<script>
    valid = false

    function validatePassword(input) {
        if (input.length > 7) {
            document.getElementById("req-1").classList.remove('error')
            document.getElementById("req-1").classList.add('success')
            valid = true
        } else {
            document.getElementById("req-1").classList.remove('success')
            document.getElementById("req-1").classList.add('error')
            valid = false
        }
        if (/[a-z]/.test(input) && /[A-Z]/.test(input)) {
            document.getElementById("req-2").classList.remove('error')
            document.getElementById("req-2").classList.add('success')
            valid = true
        } else {
            document.getElementById("req-2").classList.remove('success')
            document.getElementById("req-2").classList.add('error')
            valid = false
        }

        if (/[0-9]/.test(input)) {
            document.getElementById("req-3").classList.remove('error')
            document.getElementById("req-3").classList.add('success')
            valid = true
        } else {
            document.getElementById("req-3").classList.remove('success')
            document.getElementById("req-3").classList.add('error')
            valid = false
        }
        if (/[./@#$%^&*]/.test(input)) {
            document.getElementById("req-4").classList.remove('error')
            document.getElementById("req-4").classList.add('success')
            valid = true
        } else {
            document.getElementById("req-4").classList.remove('success')
            document.getElementById("req-4").classList.add('error')
            valid = false
        }
    }
</script>
</body>

</html>