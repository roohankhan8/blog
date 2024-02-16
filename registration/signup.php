<?php include 'header.php'; ?>
<style>
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
<h4>Sign Up</h4>
<form action="registration.php" method="post">
    <input type="text" name="first_name" placeholder="First Name" required>
    <input type="text" name="last_name" placeholder="Last Name" required>
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" onkeyup="validatePassword(this.value)" id="pwd1" placeholder="Password" required><br>
    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
    <input type="submit" name="signup" id="signUpBtn" value="Sign Up" disabled>
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
    x = 0
    signUpBtn = document.getElementById('signUpBtn')
    req_1=document.getElementById("req-1")
    req_2=document.getElementById("req-2")
    req_3=document.getElementById("req-3")
    req_4=document.getElementById("req-4")

    function validatePassword(input) {
        if (input.length > 7) {
            req_1.classList.remove('error')
            req_1.classList.add('success')
            x += 1
        } else {
            req_1.classList.remove('success')
            req_1.classList.add('error')
        }
        if (/[a-z]/.test(input) && /[A-Z]/.test(input)) {
            req_2.classList.remove('error')
            req_2.classList.add('success')
            x += 1
        } else {
            req_2.classList.remove('success')
            req_2.classList.add('error')
        }
        if (/[0-9]/.test(input)) {
            req_3.classList.remove('error')
            req_3.classList.add('success')
            x += 1
        } else {
            req_3.classList.remove('success')
            req_3.classList.add('error')
        }
        if (/[./@#$%^&*]/.test(input)) {
            req_4.classList.remove('error')
            req_4.classList.add('success')
            x += 1
        } else {
            req_4.classList.remove('success')
            req_4.classList.add('error')
        }
        if (x == 4) {
            signUpBtn.disabled = false;
        }
    }
</script>
</body>

</html>