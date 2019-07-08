<?php
include_once 'config/connection.php';
include_once 'recursosIdioma.php';

function cookies() {
  include 'establecerIdioma.php';
?>
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
  <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
  <script>
    var idioma = "<?php echo $idiomaActual?>";
    var mensaje = "";
    var dismiss = "";
    var link = "";

    if (idioma == "ES") {
      mensaje = "Esta web hace uso de cookies. Si continúa navegando se entiende que acepta el uso de las mismas.";
      dismiss = "Lo entiendo!";
      link = "Leer más.";
    } else if (idioma == "EN") {
      mensaje = "This website uses cookies. If you continue navigating it is understood that you accept the use of cookies.";
      dismiss = "Got it!";
      link = "Read more.";
    } else if (idioma == "PT") {
      mensaje = "Este site faz uso de cookies. Se continuar a navegar, entende-se que aceita a utilização deste cookies.";
      dismiss = "Já percebi!";
      link = "Ler mais.";
    }

    window.addEventListener("load", function(){
      window.cookieconsent.initialise({
        "palette": {
          "popup": {
            "background": "#121010"
          },
          "button": {
            "background": "#e50914"
          }
        },
        "theme": "edgeless",
        "content": {
          "message": mensaje,
          "dismiss": dismiss,
          "link": link,
          "href": "./avisoLegal.php"
        }
      })
    });
  </script>
<?php
}
?>