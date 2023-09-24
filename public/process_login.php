<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAGE D'ADMINISTRATION</title>
    <link rel="icon" type="image/x-icon" href="assets/VikaLogo.ico" />
    <!-- Ajoutez ici vos liens vers les fichiers CSS et JavaScript nécessaires -->
    <link href="../public/css/styles.css" rel="stylesheet">
    <link href="../public/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../public/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../public/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../public/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../public/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../public/build/css/custom.min.css" rel="stylesheet">
</head>
<body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <a class="hiddenanchor" id="oubli"></a>

      <div class="login_wrapper">
    <div class="animate form login_form" id="login-form">
        <section class="login_content">
            <form>
                <h1>Connexion</h1>
                <div>
                    <input type="text" class="form-control" placeholder="Nom d'utilisateur" required="" />
                </div>
                <div>
                    <input type="password" class="form-control" placeholder="Password" required="" />
                </div>
              <<div class="separator">
                  <p class="change_link">Mot de passe oublié?
                      <button data-toggle="modal" data-target="#myModal">Gérer</button>
                  </p>
              </div>


              <div class="separator">
                <p class="change_link">Nouveau sur le site?
                  <a href="#signup" class="to_register"> Créer un compte </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Emmanuel Services!</h1>
                  
                </div>
              </div>
            </form>
          </section>
        </div>

        <div class="animate form registration_form" id="registration-form">
          <section class="login_content">
            <form>
              <h1>Créer un compte</h1>
              <div>
                <input type="text" class="form-control" placeholder="Nom d'utilisateur" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Valider</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Déjà membre ?
                  <a href="#signin" class="to_register"> Se connecter </a>
                </p>
                <div class="clearfix"></div>
                <br />
                <div>
                  <h1><i class="fa fa-paw"></i> Emmanuel Services!</h1>
                  
                </div>

                </form>   
            </section>  
              </div> 
                      <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close" id="close-modal">&times;</span>
            <h1>Mot de passe oublié ?</h1>
                 <p>Entrez votre adresse e-mail pour réinitialiser votre mot de passe.</p>
            <div>
                <input type="email" class="form-control" placeholder="Adresse e-mail" required="" />
            </div>
            <div>
                <a class="btn btn-default submit" href="reset_password.html">Réinitialiser le mot de passe</a>
         </div>
  </div>
</div>
</div> 
      </div>
    </div> 
    <script src="https://www.gstatic.com/firebasejs/10.3.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.3.1/firebase-auth.js"></script>

    <script src="public/js/firebase-config.js"></script>
    <script>
       // Obtenez des références aux éléments du formulaire
    const loginForm = document.getElementById('login-form');
    const registrationForm = document.getElementById('registration-form');
    const forgotPasswordForm = document.getElementById('forgot-password-form');

    // Obtenez des références aux liens de bascule entre les formulaires
    const showLoginFormLink = document.getElementById('show-login-form-link');
    const showRegistrationFormLink = document.getElementById('show-registration-form-link');
    const showForgotPasswordFormLink = document.getElementById('show-forgot-password-form-link');
    const forgotPasswordModal = document.getElementById('forgot-password-modal');
    const modal = document.getElementById('myModal');
const manageLink = document.getElementById('manage-link');
const closeModal = document.getElementById('close-modal');

// Ouvrez la fenêtre modale lorsque l'utilisateur clique sur "Gérer"
manageLink.addEventListener('click', () => {
    modal.style.display = 'block';
});

// Fermez la fenêtre modale lorsque l'utilisateur clique sur le bouton "Fermer"
closeModal.addEventListener('click', () => {
    modal.style.display = 'none';
});

// Fermez également la fenêtre modale si l'utilisateur clique en dehors de la fenêtre modale
window.addEventListener('click', (event) => {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
});
      // Écoutez les événements de clic sur le bouton "Gérer" pour ouvrir la boîte modale
      openForgotPasswordModalButton.addEventListener('click', () => {
            forgotPasswordModal.style.display = 'block';
        });

        // Écoutez les événements de clic sur le bouton "Fermer" pour masquer la boîte modale
        closeForgotPasswordModalButton.addEventListener('click', () => {
            forgotPasswordModal.style.display = 'none';
        });

    // Écoutez les événements de clic sur les liens pour basculer entre les formulaires
    showLoginFormLink.addEventListener('click', () => {
        loginForm.style.display = 'block';
        registrationForm.style.display = 'none';
        forgotPasswordForm.style.display = 'none';
    });

    showRegistrationFormLink.addEventListener('click', () => {
        loginForm.style.display = 'none';
        registrationForm.style.display = 'block';
        forgotPasswordForm.style.display = 'none';
    });

    showForgotPasswordFormLink.addEventListener('click', () => {
        loginForm.style.display = 'none';
        registrationForm.style.display = 'none';
        forgotPasswordForm.style.display = 'block';
    });

        // Ajoutez un gestionnaire d'événements au bouton de connexion
        loginButton.addEventListener('click', () => {
            const username = usernameInput.value;
            const password = passwordInput.value;

            // Utilisez Firebase pour vous connecter
            firebase.auth().signInWithEmailAndPassword(username, password)
                .then((userCredential) => {
                    // Connexion réussie, redirigez vers la page admin.html ou effectuez d'autres actions nécessaires
                    window.location.href = '../public/admin.html';
                })
                .catch((error) => {
                    // Gestion des erreurs d'authentification
                    console.error(error.message);
                });
        });
    </script>
</body>
</html>
