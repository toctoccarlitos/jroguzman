<?php
    require_once "data.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require_once(DATA::PATH . '/Composer/PHPMailer/src/Exception.php');
    require_once(DATA::PATH . '/Composer/PHPMailer/src/PHPMailer.php');
    require_once(DATA::PATH . '/Composer/PHPMailer/src/SMTP.php');

    try
    {
        $nombre = $_POST["name"];
        $apellido = $_POST["sec-name"];
        $telefono = $_POST["phone"];
        $email = $_POST["email"];
        $mensaje = $_POST["message"];

        $mail = new PHPMailer(true);
        $mail->CharSet = "UTF-8";

        $mail->isSMTP();
        $mail->Mailer = "smtp";
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.gmail.com';
        $mail->Username = "jroguzmanweb@gmail.com";
        $mail->Password = "ezjiqwigozfajzuz";
        $mail->SMTPSecure = "tls";
        $mail->Port       = 587;
        $mail->isHTML(true);
        $mail->setFrom('jroguzmanweb@gmail.com', 'Jessica Romero Web');
        $mail->AddReplyTo('jroguzmanweb@gmail.com', 'Reply to name');
        $mail->addAddress('jalexrg@hotmail.com');
        $mail->addCC('toctoccarlitos@gmail.com');
        $mail->Subject = "(JROGUZMAN.COM) - " . $nombre ." ". $apellido;

        $mail->Body = '<!DOCTYPE html>
        <html>
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <!--FONT-->
                <link href="https://fonts.googleapis.com/css?family=Advent+Pro:700|Open+Sans" rel="stylesheet">
                <style type="text/css">
                body
                {
                    margin: 0;
                    background-color: #e7ecf2;
                    color: #333;
                    font-family: "Open Sans2", sans-serif;
                }
                .encabezado
                {
                    border-bottom: 7px solid #757487;
                    background-color: #b8b7d4;
                }
                .logo_
                {
                    width: 250px;
                    margin-top: 1.2em;
                }
                .logoPosition
                {
                    margin: 0;
                    text-align: center;
                }
                .formulario
                {
                    margin-top: 20px;
                    padding: 0 40px 20px;
                    background-color: #b8b7d4;
                    border:2px solid #757487;
                }
                .titulo_pantalla
                {
                    color: #32323a;
                    font-family: "Advent Pro", sans-serif;
                    font-size: 1.6em;
                    font-weight: 500;
                    text-transform: uppercase;
                }
                .text-right
                {
                    text-align: right;
                    margin-right: 1em;
                }
                </style>
            </head>
            <body>
                    <header class="container-fluid encabezado">
                    <div class="logoPosition">
                    <img src="https://jroguzman.com/images/logo-default-392x116.png" alt="logo del sistema ACCEDE" class="logo_">
                </div>
                    </header>
                <div class="container">
                    <div class="formulario">
                        <h2 class="titulo_pantalla">Información de contacto</h2>
                        <p><strong>Datos de contacto:</strong></p>
                        <ul>
                            <li><strong>Nombre:</strong> '.($nombre ." ". $apellido).'</li>
                            <li><strong>Teléfono:</strong> '.$telefono.'</li>
                            <li><strong>email:</strong> '.$email.'</li>
                            <li><strong>Mensaje:</strong> '.$mensaje.'</li>
                        </ul>
                    </div>
                    <br>
                    <div class="text-right">
                        <p><strong>Jessica Romero | Market Partner Independiente </strong></p>
                    </div>
                </div>
            </body>
        </html>';

        if($mail->send())
        {
            $res = "MF000";
        }
        else
        {
            $res = "MF255";
        }

    }
    catch (Exception $e)
    {
        $res = $e->getMessage();
    }

    echo $res;
?>