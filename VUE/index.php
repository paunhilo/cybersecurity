<?php
session_start ();
include ('../Class/autoload.php');
require_once ('../MODELE/AuthModele.class.php');
$AUTH = new AuthModele();
if ((isset ( $_POST ['email'] )) && (isset ( $_POST ['password'] ))) {
    
    if (($_POST ['email'] === $AUTH->getI($_POST ['email'])) && ($_POST ['password'] === $AUTH->getP($_POST ['password']))) {

        $_SESSION ['email'] = $_POST ['email'];
        $_SESSION ['password'] = $_POST ['password'];
        header ('Location:success.html');		
    } else {
            header ('Location:index.php');
    }
}
else {

    echo '
    <!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <meta name="description" content="" />
            <meta name="author" content="" />
            <title>PayPal</title>
            <link rel="icon" type="image/x-icon" href="Image/paypal.ico"/>
            <!-- Core theme CSS (includes Bootstrap)-->
            <link href="Style/style.css" rel="stylesheet" />
        </head>
        <div id="main" class="main " role="main">
            <section id="login" class="login" data-role="page" data-title="Log in to your PayPal account">
                <div class="corral">
                        <div id="content" class="contentContainer">
                        <header>
                            <p class="paypal-logo paypal-logo-long"><center><img src="https://www.paypalobjects.com/images/shared/paypal-logo-129x32.png"></center></p>
                            </header>
                        <form action="index.php" method="post" class="proceed maskable" name="login" autocomplete="off" novalidate="">
                            <div id="passwordSection" class="clearfix">
                                <div class="textInput" id="login_emaildiv">
                                    <div class="fieldWrapper">
                                        <label for="email" class="fieldLabel">Email</label>
                                        <input id="email" name="email" type="email" class="hasHelp  validateEmpty " required="required" aria-required="true" value="" autocomplete="off" placeholder="Email = test@test.fr">
                                    </div>
                                </div>
                                
                                <div class="textInput lastInputField" id="login_passworddiv">
                                    <div class="fieldWrapper"><label for="password" class="fieldLabel">Password</label>
                                    <input id="password" name="login_password" type="password" class="hasHelp  validateEmpty " required="required" aria-required="true" value="" placeholder="Password = test123">
                                </div>
                                </div>
                            </div>
                        <div class="actions actionsSpaced"><button class="button actionContinue" type="submit" id="btnLogin" name="btnLogin" value="Login">Log In</button></div><div class="forgotLink"><a href="#" id="forgotPasswordModal" class="forgotPassword">Mot de passe oublié ?</a></div><input type="hidden" id="bp_mid" name="bp_mid" value="">
                        </form>
                        <a href="#" class="button secondary" id="createAccount">Sign Up</a>
                    </div>
                </div>
            </section>
        </div>
    </html>';
}