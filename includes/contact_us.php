<?php
///Code..
if (isset($_POST['send-contact'])) {
    //Selecting the values...
    $email = $_POST['email'];
    $title = $_POST['subject'];
    $content = $_POST['content'];

    //Setting Values to headers also..
    $to = "s.engineer63@gmail.com";
    $subject = wordwrap($content, 70);
    $body = $content;
    // $header = "From: " . $email;

    //Configuring to send mail from localhost local php server...
    ini_set("SMTP", "aspmx.l.google.com");
    ini_set("sendmail_from", $email);
    $body = "The mail message was sent with the following mail setting:\r\nSMTP = aspmx.l.google.com\r\nsmtp_port = 25\r\nsendmail_from = " . $email;

    ///Header to configuring and added somethings..
    $header  = 'MIME-Version: 1.0' . "\r\n";
    $header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $header .= 'From: '.$email."\r\n";

    //Send With Mail Function PHP...
    $send_mail = mail($to, $subject, $body, $header);

    //Checking email sends here...
    if (!$send_mail) {
        echo "<h5 class='text-center text-danger'>There is problem with mail couldn't send it!</h5>";
    } else {
        echo "<h5 class='text-center text-success'>Mail Sended Successfully!</h5>";
    }
}
?>

<!-- Page Content -->
<!-- The Registration Page Here -->
<div class="container">
    <section id="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-xs-8 col-xs-offset-2 well">
                    <div class="form-wrap">
                        <form action="" role="form" method="POST">
                            <h2 class="text-center">Contact Us</h2>

                            <!-- Contact Email -->
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="to-email">To Us: </label>
                                    <input type="email" class="form-control" name="toEmail" value="s.engineer63@gmail.com" disabled>
                                </div>
                            </div>

                            <!-- Contact Title -->
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="from-email">From You:</label>
                                    <input type="email" placeholder="Your Email.." class="form-control" name="email">
                                </div>
                            </div>

                            <!-- Content Subject -->
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="subject">Subject: </label>
                                    <input type="text" placeholder="Subject.." class="form-control" name="subject">
                                </div>
                            </div>

                            <!-- Contact Content -->
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="content">Content: </label>
                                    <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Write Content.."></textarea>
                                </div>
                            </div>

                            <!-- Submit Content -->
                            <div class="col-xs-12">
                                <input type="submit" name="send-contact" class="form-control btn btn-warning text-uppercase" value="Submit Contact">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>