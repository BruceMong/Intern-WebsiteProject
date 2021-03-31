

        
<?php 
    // use the phpmailer we installed via composer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

    if (array_key_exists('to', $_POST)) {
    $err = false;
    $msg = '';
    $email = '';

    $type=$_POST['to'];
    
    //Apply some basic validation and filtering to the query
    if (array_key_exists('reason', $_POST)) {
        //Limit length and strip HTML tags
        $reason = substr(strip_tags($_POST['reason']), 0, 16384);
    } else {
        $reason = '';
        $msg = 'No feedback provided!';
        $err = true;
    }
    

    //Apply some basic validation and filtering to the name
    if (array_key_exists('username', $_POST)) {
        //Limit length and strip HTML tags
        $username = substr(strip_tags($_POST['username']), 0, 255);
    } else {
        $username = '';
    }
    //Validate to address
    //Never allow arbitrary input for the 'to' address as it will turn your form into a spam gateway!
    //Substitute appropriate addresses from your own domain, or simply use a single, fixed address
    $entreprise='hadrien.piboteau@gmail.com';
    if (array_key_exists('to', $_POST)) {
        $to =  $entreprise;
    } else {
        $to = $entreprise;
    }
    //Make sure the address they provided is valid before trying to use it
    if (array_key_exists('email', $_POST) and PHPMailer::validateAddress($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $msg .= "Error: invalid email address provided";
        $err = true;
    }
    if (array_key_exists('attachment1', $_FILES)) {
        $img_name = $_FILES['attachment1']['name'];
        $upload1 = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['attachment1']['name']));
        
        //to sure image upload goes to root directory add a link in my own case my project folder is Mail
        
        $uploadfile1 = $_SERVER['DOCUMENT_ROOT'].'/GIT/TESTSPHPMAILER/cache'.$img_name;
    }else{
        $err=true;
    }
    if (array_key_exists('attachment', $_FILES)) {
        $img_name = $_FILES['attachment']['name'];
        $upload = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['attachment']['name']));
        
        //to sure image upload goes to root directory add a link in my own case my project folder is Mail
        
        $uploadfile = $_SERVER['DOCUMENT_ROOT'].'/GIT/TESTSPHPMAILER/cache'.$img_name;
        if (move_uploaded_file($_FILES['attachment']['tmp_name'], $uploadfile)) {
            if (!$err) {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                // SMTPDebug turns on error display mssg 
                // $mail->SMTPDebug = 3;
                $mail->SMTPSecure = 'tls';
                $mail->Host = 'smtp.gmail.com';
                // set a port
                $mail->Port = 587;
                $mail->SMTPAuth = true;
                // set login detail for gmail account
                $mail->Username = 'hadrien.piboteau@gmail.com';
                $mail->Password = 'Niktamerpd1';
                $mail->CharSet = 'utf-8';
                // set subject
                $mail->setFrom($email, $username);
                $mail->addAddress($to);
                $mail->addReplyTo($email, $username);
                $mail->addAttachment($uploadfile, 'CV');
                $mail->addAttachment($uploadfile1, 'Lettre de Motivation');

                $mail->IsHTML(true);
                $mail->Subject = "$type de stage";
                $mail->Body = $reason;
                if (!$mail->send()) {
                    $msg .= "Mailer Error: " . $mail->ErrorInfo;
                } else {
                    $msg .= "Message sent!";
                }
            }
        } else {
                    $msg .= 'Failed to move file to ' . $uploadfile;
        }
    }
}   
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sending Feedback Phpmailer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    
    <!-- Button trigger modal -->
    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
        Postuler a l'offre
    </button>
    
      <!-- Modal -->
    <?php if(empty($msg)){ ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" enctype="multipart/form-data" class="container" id="needs-validation" novalidate>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Candidature</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" placeholder="Nom et prénom">
                                    <div class="invalid-feedback">
                                        Merci de rentrer votre nom et prénom.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="E-mail">
                                    <div class="invalid-feedback">
                                        Merci de rentrer un email valide.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select name="to" class="form-control">
                                        <option value="Candidature à l'offre" selected="selected">Candidature à l'offre</option>
                                        <option value="Candidature spontanée">Candidature spontanée</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="reason" rows="2" required="" placeholder="Message pour l'entreprise"></textarea>
                                    <div class="invalid-feedback">
                                        Merci de rentrer un message pour le contenu du mail.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <p>CV</p>
                                    <input type="file" name="attachment">
                                    <div class="invalid-feedback">
                                        Merci d'attacher votre CV.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <p>Lettre de motivation</p>
                                    <input type="file" name="attachment1">
                                    <div class="invalid-feedback">
                                        Merci d'attacher votre lettre de motivation. 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary" name="feedback">Envoyer candidature</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php }else{ 
        echo $msg;
    } ?>
    
        
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
            var form = document.getElementById('needs-validation');
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    
                event.preventDefault();
                event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
            }, false);
        })();
    </script>
</body>
</html> 