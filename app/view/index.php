<?php
$title = "home";
if (isset($_POST['submit'])) {
    include "app/contro/userContro.php";
    $user = new UserContro(null, null, null, null, null, null, null);
    $user->contact($_POST['name'], $_POST['email'], $_POST['reason']);
}
include "app/view/include/head.php";
?>
<section class="hero-section">
    <div class="hero">
        <h1>Welcome to Astro Health Care</h1>
    </div>
    <div class="afterHero"></div>
</section>
<section>
    <div class="box box-700">
        <div class="contact-us-link">
            <h2>Contact us</h2>
            <a href="/#contact" class="btn blue">contact</a>
        </div>
        <p>If you have any questions or would like to schedule an appointment, please do not hesitate to contact us. Our friendly and knowledgeable staff are available to assist you and provide you with the information you need</p>
    </div>
</section>
<section>
    <h2>about us</h2>
    <div class="grid-1-3">
        <p class="box">Our hospital is committed to providing exceptional healthcare services to our patients</p>
        <p class="box">We have a team of highly skilled and compassionate medical professionals dedicated to your well-being</p>
        <p class="box">At our hospital, we strive to create a safe and comfortable environment for our patients and their families</p>
    </div>
</section>
<section>
    <h2>our services</h2>
    <div class="box box-700">
        <p>range of medical services, from routine check-ups to advanced surgical procedures</p>
        <p>clean and comfortable environment with state-of-the-art facilities</p>
        <p>personalized treatment plan that meets your unique needs</p>
        <p>range of payment options to help you access the care you need</p>
        <p>staff available around the clock to answer any questions you may have</p>
    </div>
</section>
<section>
    <h2>why us</h2>
    <div class="grid-1-3">
        <p class="box">Our hospital has a reputation for providing high-quality medical care and personalized attention to each patient</p>
        <p class="box">We invest in the latest medical technologies and treatments to ensure that our patients receive the best care possible</p>
        <p class="box">Our team of medical professionals is constantly updating their knowledge and skills to provide the latest treatments and techniques to our patients</p>
    </div>
</section>
<section>
    <h2>our mission</h2>
    <p class="box box-700">Our mission at the hospital is to provide exceptional healthcare services that are accessible, affordable, and delivered with compassion and professionalism. We achieve this by offering a comprehensive range of medical services tailored to each patient's unique needs, investing in modern facilities and advanced equipment, and working closely with our patients to create personalized treatment plans. We are dedicated to providing a safe and comfortable environment for our patients and their families, and we constantly strive to improve the quality of our services</p>
</section>
<section class="map">
    <h2>find us</h2>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3509.3088711106166!2d-1.4674256095824239!3d53.37786392117122!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487982831b2243e9%3A0x37add1086f57be4f!2sSheffield%20Hallam%20University!5e0!3m2!1sen!2suk!4v1680567559765!5m2!1sen!2suk" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>
<div class="contact" id="contact">
    <form action="/" method="POST" class="login box" autocomplete="off">
        <h2>contact us</h2>
        <?php if (isset($_SESSION['error'])) { ?>
            <p class="success"><?= $_SESSION['error'] ?></p>
        <?php
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['logged_on'])) { ?>
            <label for="name">name</label>
            <input type="text" id="name" name="name" required minlength="3" maxlength="50" value="<?= $_SESSION['firstName'] . ' ' . $_SESSION['lastName'] ?>">
            <label for="email">email</label>
            <input type="email" id="email" name="email" required minlength="3" maxlength="50" value="<?= $_SESSION['email'] ?>">
        <?php } else { ?>
            <label for="name">name</label>
            <input type="text" id="name" name="name" required minlength="3" maxlength="50">
            <label for="email">email</label>
            <input type="email" id="email" name="email" required minlength="3" maxlength="50">
        <?php } ?>
        <label for="reason">reason</label>
        <textarea name="reason" id="reason" rows="10" required minlength="10" maxlength="999"></textarea>
        <button name="submit" class="btn blue">contact</button>
    </form>
</div>
<?php
include "app/view/include/foot.php";
