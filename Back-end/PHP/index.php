<?php
require_once 'C:\xampp\htdocs\Accidentes-en-moto\Back-end\PHP\db.php';

$sql = "SELECT 
    id, 
    marca, 
    modelo, 
    tipo, 
    certificacion, 
    precio, 
    imagen_url 
FROM cascos 
ORDER BY id DESC";


$resultado = $conn->query($sql);

$cascos = []; // Inicialización: ¡Esto crea la variable $cascos!
if ($resultado && $resultado->num_rows > 0) {
    while($fila = $resultado->fetch_assoc()) {
        $cascos[] = $fila;
    }
}

// 3. Cierre de conexión
$conn->close();
?>

<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rinos en Movimiento — Frontend</title>
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    :root{
      --accent:#0d6efd;
      --muted:#6c757d;
      --card-bg: #ffffffdd;
    }
    body{
      background: linear-gradient(180deg,#f8fafc, #eef2ff);
      min-height:100vh;
      font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
      color:#222;
    }
    .brand{font-weight:700; letter-spacing:0.2px}
    .hero{
      background: linear-gradient(90deg, rgba(13,110,253,0.08), rgba(13,110,253,0.02));
      border-radius:14px;
      padding:2.5rem;
    }
    .nav-link.active{font-weight:600}
    .module-card{transition:transform .15s ease, box-shadow .15s ease}
    .module-card:hover{transform:translateY(-6px); box-shadow:0 8px 24px rgba(13,110,253,0.08)}

    /* Left vertical divider for hero image on large screens */
    .hero-image{background:linear-gradient(135deg,#e9f0ff, #f6fbff); border-radius:12px; padding:1rem}

    /* Simple responsive utility for SPA sections */
    .page{display:none}
    .page.active{display:block}

    footer{font-size:14px}

    /* Forms */
    .form-card{border-radius:12px; padding:1.25rem; background:var(--card-bg)}

    @media(min-width:992px){
      .hero{display:flex; gap:1.5rem; align-items:center}
      .hero .hero-body{flex:1}
      .hero .hero-image{width:380px; flex-shrink:0}
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-2" href="#">
        <img src="https://via.placeholder.com/40x40.png?text=R" alt="logo" class="rounded-circle">
        <div>
          <div class="brand">Rinos en Movimiento</div>
          <small class="text-muted">Responsabilidad sobre ruedas</small>
        </div>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link active" href="#" data-target="inicio">Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="#" data-target="practicas">Prácticas Seguras</a></li>
          <li class="nav-item"><a class="nav-link" href="#" data-target="cascos">Tipos de Cascos</a></li>
          <li class="nav-item"><a class="nav-link" href="#" data-target="normativa">Normativa</a></li>
          <li class="nav-item"><a class="nav-link" href="#" data-target="accidentes">Accidentes</a></li>
          <li class="nav-item"><a class="nav-link" href="#" data-target="faq">FAQ</a></li>
          <li class="nav-item"><a class="nav-link" href="#" data-target="contacto">Contacto</a></li>
          <li class="nav-item"><a class="nav-link" href="#" data-target="login">Login</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="container my-5">

    <!-- INICIO -->
    <section id="inicio" class="page active">
      <div class="hero mb-4">
        <div class="hero-body">
          <h1 class="display-6">Rinos en Movimiento</h1>
          <p class="lead text-muted">Promovemos prácticas seguras de conducción para motociclistas — información, normativa y herramientas para reducir riesgos en la vía.</p>
          <div class="mt-4 d-flex gap-2">
            <button class="btn btn-primary" data-target="practicas">Ver prácticas seguras</button>
            <button class="btn btn-outline-primary" data-target="contacto">Compromiso</button>
          </div>

          <div class="row mt-4">
            <div class="col-md-4">
              <div class="card p-3 module-card">
                <h6 class="mb-1">Educación</h6>
                <p class="text-muted small">Guías y consejos sobre conducción defensiva.</p>
              </div>
            </div>
            <div class="col-md-4 mt-3 mt-md-0">
              <div class="card p-3 module-card">
                <h6 class="mb-1">Normativa</h6>
                <p class="text-muted small">Leyes y reglamentos de tránsito para motociclistas.</p>
              </div>
            </div>
            <div class="col-md-4 mt-3 mt-md-0">
              <div class="card p-3 module-card">
                <h6 class="mb-1">Registro de Casos</h6>
                <p class="text-muted small">Datos sobre accidentes, causas y prevención.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="hero-image text-center d-none d-lg-block">
          <img src="https://via.placeholder.com/340x220.png?text=Rinoceronte+en+movimiento" alt="imagen" class="img-fluid rounded">
        </div>
      </div>

      <div class="row gy-4">
        <div class="col-md-6">
          <div class="card p-3">
            <h5>Objetivo del proyecto</h5>
            <p class="text-muted">Desarrollar módulos informativos y administrativos que promuevan prácticas seguras de conducción para motociclistas, utilizando tecnologías web modernas.</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card p-3">
            <h5>Acceso rápido</h5>
            <div class="d-flex gap-2 flex-wrap">
              <button class="btn btn-outline-secondary btn-sm" data-target="cascos">Cascos</button>
              <button class="btn btn-outline-secondary btn-sm" data-target="accidentes">Accidentes</button>
              <button class="btn btn-outline-secondary btn-sm" data-target="faq">FAQ</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- PRACTICAS -->
    <section id="practicas" class="page">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Prácticas Seguras de Conducción</h3>
        <small class="text-muted">Contenido educativo</small>
      </div>

      <div class="row g-3">
        <div class="col-md-6">
          <div class="card p-3">
            <h5>Posición y equilibrio</h5>
            <p class="text-muted">Mantén siempre una postura estable y vista despejada para anticipar obstáculos.</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card p-3">
            <h5>Velocidad adecuada</h5>
            <p class="text-muted">Adapta la velocidad a las condiciones del camino y del clima.</p>
          </div>
        </div>
        <div class="col-12">
          <div class="card p-3">
            <h5>Lista de chequeo antes de salir</h5>
            <ul class="mb-0">
              <li>Revisar neumáticos</li>
              <li>Frenos y luces</li>
              <li>Uso correcto del casco</li>
              <li>Documentación vigente</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- CASCOS (Listado ejemplo) -->
    <section id="cascos" class="page">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Tipos de Cascos</h3>
      </div>
      <div>
        <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f9;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            vertical-align: top; /* Para alinear el contenido de las celdas arriba */
        }
        th {
            background-color: #3f51b5; /* Azul oscuro */
            color: white;
            text-transform: uppercase;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2; /* Color para filas pares */
        }
        .casco-img {
            max-width: 150px; /* Tamaño máximo para las imágenes */
            height: auto;
            display: block;
            margin: 0 auto;
            border-radius: 5px;
        }
    </style>
</head>

<body>

  <h1>🏍️ Tipos Comunes de Cascos de Motocicleta</h1>

    <table>
        <thead>
            <tr>
                <th>Tipo de Casco</th>
                <th>Imagen</th>
                <th>Descripción (Utilidad Ideal)</th>
                <th>Nivel de Seguridad General</th>
            </tr>
        </thead>
        <tbody>
            
            <tr>
                <td>Integral (Full Face)</td>
                <td>
                    <img src="data:image/jpeg;base64,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" alt="Imagen de Casco Integral" class="casco-img">
                </td>
                <td>
                    <p>Cubre toda la cabeza, incluyendo la barbilla y la cara. Ofrece la máxima protección. </p>
                    <p> **Utilidad Ideal:** Carretera, alta velocidad, conducción deportiva y uso diario.</p>
                </td>
                <td>⭐ Máximo (5/5)</td>
            </tr>

            <tr>
                <td>Modular (Flip-Up)</td>
                <td>
                    <img src="data:image/jpeg;base64,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" alt="Imagen de Casco Modular" class="casco-img">
                </td>
                <td>
                    <p>La sección frontal se puede levantar. Es práctico para hablar o beber sin quitarse el casco.</p>
                    <p> **Utilidad Ideal:** Turismo, viajes largos, ciudad (comodidad).</p>
                </td>
                <td>⭐⭐⭐⭐ Alto (4/5)</td>
            </tr>

            <tr>
                <td>Jet (Abierto / Open Face)</td>
                <td>
                    <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxAQEBIPERISEBUVEBAVEBUVEBUPFRAXFRUWFhUSFhUYHSggGBolGxUWITEhJSkrLi4uFx8zODMtNygtLisBCgoKDg0OGxAQGjclHyUrODcrKzI3Ny4xLi0tNzc1NzcrNy0tLDg4Nzc1Kys3NzcwNys1NzIrLy4rLy03NzgwLv/AABEIAOEA4QMBIgACEQEDEQH/xAAcAAEAAQUBAQAAAAAAAAAAAAAAAgEDBAYHBQj/xABEEAACAQIDBAYHBgQFAgcAAAABAgADEQQSIQUxQVEGE2FxgZEHIjJSobHBFEJicoKSFSND0aLC4fDxY9IWF1NkdJOz/8QAGQEBAAIDAAAAAAAAAAAAAAAAAAMFAQIE/8QAHxEBAQACAQQDAAAAAAAAAAAAAAECAxEEITHwBRJB/9oADAMBAAIRAxEAPwDuMREBERAREQESFaqqKWYhVAuSTYAcyZzPph0+LXpYYlF3F9zP3e6Pj8oHTS4G8jznlbS6SYahfM+Y8l9b47p8+4vaBYkk3MxhtCqvsu69zkQOxY/0iWuKSKO1jmP0ngYvp1iW/qFfy2X5Tnw21V+9lqfmUE+YsZL+IUm9pWpnmpzjyOsDbavSqu2+q5/WZaHSOr/6jfuM1bLf2HV+y+U+RlOrre40DcqPSquu6q4/WZ6uE6d4ld75vzAN/rOdrSre40uKKo+43kYHYMB6QFNhUpjvU2+Bmy7P2/hq9stQA8m9U/2M+f0xLDeCPAiZuG2mRx+MD6Hicj2J0zrUbDNmX3W1Hhym/wCxelOHxNhfq25E6HuMD3YiICIiAiIgIiICIiAiIgIiICWsViEpI1SowRVF2J3ASbuFBYkAAEkk2AA3kmcW9IPTM4pzSpEiipOXh1h98/QQJdN+mzYpjTpkpSB9VeL2+839uE0OviSZYrViZZvAuF5C8RAoZEyREiYEDFzKmLQAY8z5y6ldxuZh+oiWpIQMyntGsN1RvE5vnMhNqv8AeWm/elj5raeaJMQPYo4+kd6vT7VOceRsfjPUwWIN/wCW61OwHK37Tr5XmqiSBgde6NdNnpkUq13Uaa+0ndf5GdGweLp1kFSmwZTy4dh5GfNmG2vUFg/80fi9odz7x8RNw6K9J2ouDSYkffpN7RHybvGvZA7VEwdkbUp4qmKlM/mHFTyMzoCIiAiIgIiICIiAiJ5fSXawwmGetoWtakpNszkHKO7eT2AwNH9K3SvIDgaTa2BrkHxFP6nwHOcdr1rkzL2zUqs7VKlyWZmYkg3JaxOnb855d4EryYkFlwQKgRKykChkZIyJgRMReIASYkBJQJCSEiJOBWIiBWSR7GQkSYG89EOlr0Kqlm1NgSdBUHu1P+7z5zt2AxiV6a1UNwR4g8VPbPlylUsZ0r0adKjRqChVb+W5ABJ9k7gfp3d0DsMREBERAREQEREBOMelrpQzYn7NTIy0QVbtqMPX8hYd4M6ztzaAwuGr4lt1KjUqW55VJA8Tp4z5YxJaq7VHdi7szucx1ZiSxtuGpOkC9isc1QZTYDMWsN1z/wAmYwkPs7cHPiAflaVyuPdPiV/vAvLJiWBVtvVh4ZvlJpWU7iPr5QLsGUlCYAyJMEyJMBeLyN4gTEkDLYMkIFwSoMgDJXgTvK3kAZW8CV5Ayt5QwI3mbgsRlImAxim9jA+kege2vteEUk3enZH5mw9VvEfEGbHOKeiTbPV4sUSfVrKV/UNVPzH6p2uAiIgIiICIiBZxmFp1qb0qqrUR1KurC4ZSLEETiHpE9H+EwZQYSpWpvVYZVep1tOkovmtcZjc5d5Np3Wci9IWO6zaXV8KKoviyhj9IHJNq4LG4MA16RKHdVU5qbeNtD2GxmJQ2mGIFjed52cquhRwHVlsysAysDvBB0InJen3RZMBjFeiLUays1Nd/VsCM6X5agjvtwgeatS/D6yrBToQD3iYdjLihwLgm3mB2GBd6gcCy9x+ktvRqcHv36fGTWrzA8PV+Wnwl5SDxI7xceY/tAwmWoN5fws3y1+Eguu5yfGegxtyPaDf/AFltlVt4BgYnVH3m846o+83nL5w3usR2H1h/eW2JGjC3bvB8YEep/E3nKiifebzkwZIGBAUj77ecqykC+dtPGXIYXFv9jtgY2Hrl7gOwI4FfjMj+Z7w/bLeHw4S5vcnef79svwIZ6n4T4ER1tTkp8ZOUgUDE7xaUzQxlsmB7Owsc1KqlRTqjqw71IIn1Dh6wdFddzKrDuIuPnPkzCvYz6Z6CYrrdnYV/+kF/+slP8sD3oiICIiAiIgJwzpPUzbTxR/8AcW/aqidznC+klO20sX/8hj5gGB6uFxmUCa36R8R1uGp81rfAo9/iBPUB0mt9Mn/lKPxX8hb6wNIXEte1gZKnj2U3XTx39hFtZaYb++QtAyqu0CxvkA7vVHlKLjz7oHjeYsEQPQFbPbNbykmS24/G884PaXhWgZQxRXfc/GZFOsrjTUcQfqJ5LvJUHysCPHtgZrpkPNTu/CeXdKgy9UAYEcx/szGRrgQLoMleWxK3gXIvIXi8Cd5QmUAkWfgIFCZAmCZAmBeonWfRnolqZtl0uypWH+Mn6z5vpHWfS/otw/V7JwvNhUc9uaoxH+G0Da4iICIiAiIgJxfpzSybUr/iNJx40wD8QZ2icq9LmH6vE0cRwaiVPDWm3PuqDygeJbSal0pr5my+6LeO8/Sezh9uUzSYuGpuuhRh6x7raEds0baOPzuxvvJPmYGC8gZW8MIFlpVTJZIywLbyIaXisstAkray8g3eMs011mXhEu47ASfpA9LdMKluHdMnENZT26ect4DCvXqpRp5AzuEXMwUZjuBJ3DXeYESdOPhv8JZwpa51LDgTMitSZGZGsGVmVrG4upsbEb5QXMCUkNN8je0oYFWaQvKmRgUJkGMkZAmBOlfgLngBxPAT632LgRh8NQw4/pUaVPvyKFv8J8zej7Z32naeEo2uOvV2/LS/mNfvCW8Z9TQEREBERAREQE0P0zYYNs7PbWnXpH9JNiO7d5TfJaxOHSqpSoi1FNrqyh1NjcXB03iB87be6O1KOzjjsUHpPUr06WHT2WYFWdnIOuUKpCjS5BPETnlWmyGx1B9k8CJ9Cen7DM2zqNQbqeMQv2BqdVAf3Mo8ZwR6ltCLqd4+oPAwLSyUrToX9g5xy3MPDj4S4KLk2ysTyCkmBZtKGenhNhYuqctOhUJO4MBSv4uQJnf+Eqy2FavgsMfdqYxHf9lHOTA1pzLM2sdH8Gur44uL69XhSg/dWdWI7kbul6nszZiguFr1QvtPVrihRXl6y0xUc/gVLngeMDV6NMmw4mejhqGS/G/hLodGJyKAAzZWy5Cw0t6tzYd5J+UnAxMS1zbl8/8Aj5y5g8W1I5lCE/iQPbtF9xlurqb8OEjflAkdSSTckkntJ1JlZC8reBKUJkbyhMCsiYvKEwKGQlSZQQOtegHZObEYjGEaU6a0kP4qhzNbtAQfvnb5pvol2R9l2VQuLNWvXftz2yf4Ak3KAiIgIiICIiAiIgYO3Nk0sZhquFrC6VUKtbQjiGU8GBAIPMCfLPTTovidmYg4euMw1NCqBZa6D7w5HddeB5ggn60nj9KujeH2lh2w2IW4OqOLB6L8HQ8D8CLg6GB8mUUU07/eza6201Gg7CvxExqtaou53/eRNh6S7CqbOxb4GoUdlGjr95TZlIF/VJB1U38d51+uIGI9VjvZj3kmelh9tZVytTDWGjKzUyfzbwfACeU0oYHrvtr3aYB5ls3yAkBiGqm7G9t3ALfkBoJ5U9TB08uh5i/fygevSTKAOyW61S2kukzBqNqe8wKFuOvbYXNuNpbwzk3ucw1sbW4n6WkwYLQJ3gtLJqcpXLz1gS6zlFucE2lIErykShgCDYsASFtmPK+gvMzY2COIxFGgN9SrTpjsLsFB+MsUaxCugF84UHS59W+7zm7+h7ZJq7UosRpSWpWYb/ZXKt/1up8IH0RQoqiqiiyqoVRyAFgPKXIiAiIgIiICIiAiIgIiIHz96bdkNT2quIvda9NCNPZKp1bKP2Ib/jnLcYtiZ3r08YU5cLX4IKwPYQabjzCtOJ7cw+Wow8YHk4XDPVcU6aNUdjZVRS7MeQUanwkKlEjfpzuQD5b56nR/aj4OuMTTuHSnXCEb1apRqU1bwLg+Extm7PNY+6i+23LsH4jAu7K2czg1LA2BKjMoJtvYAn1rchyJ4TIrpl0vPbokIuRmKKRZBY3pkbmtffYKOdr8Z5OKwzAkHw1DA9xBs3hAYWvf1Tv+fbK4ijf1hv49swGBBuJm4bEZtDoYGMWO61u+AnPWZtalm1G/59kxd2/SAAlCZS95ICBEML2vrJyCUtRqWte2m6ZC0eJ0EC0BL1PDk79JuXRj0dY/GWZafUUj/VrAoCOap7TeQHbOtdGvRngMJZ6i/a6osc9UAop5pS9keNyOcDkXRXoLjcdZqNLq6R31ql0Qjmul38BbtE7f0M6IUNmUiqE1Kj266qRYvbcoH3VFzYdupM2MCICIiAiIgIiICIiAiIgIiIGl+lzCrU2ZUJ+46EHkWvT/AM8+delVQdaQN40M+r9u7Kp4zD1MNVuFqLYlTZlIIKup5ggHwnyxtbZYwuOrUcRlq9S9RQcuQVCjWUsLnQjWxJ321EDA2JsR6/rNdEsdbes/5Ry/Fu79ZsdZadJAgUKAPVUa25kni3bPM/jT667z5AaW/wB8zMGvjb7zAv43EXBJ3S7husVFFTI4K5ijmxF9RY6WNraggntmBs2i2IqqLXQNd9L3sL5e3d5TLx2ODM3q0wb6hWsQe02MCL4FW1ptY+65Fju3Pu3332AA3mbR0I9G2K2kc5P2agLXrFc/WfhpAGzbtTew7d0r6MOhNTamINWpenhqTjrWBs1Vt4oqRqLg3Y8ARxII+kMNQSmi00UIqqFRRoFAFgB4QPnfpd6O8bs7NUA+04cf1UHrUx/1ae9fzC66a23TT2pq+p8CJ9eTVtsej3ZeKYu+GWm5JJeizUCxO8sEIVj2kGB80fZOTfD/AFlxMKOOvwE7z/5PbOvfrMXbl1tO3/53+M9vY/o+2ZhWDphxUcahqrGsQRuIVvVB7QBA4/0O9HmJ2gQ5Bw1CwIqtTJ6zspqSM35t3funX+jfQHZ+BsyUutqj+rVtUcHmotlT9IBm0xAREQEREBERAREQEREBERAREQEREBOAemHYLLtJnRCwrqjgAXzm2R1Ft59W5/MJ3+a/002elSh1pHr0SGVwt2RSQHt4a/pgfKOJwSobBjvOo1E2Xoj0Xwu0qVan9pbDYmimcFgKlLEISRYLoyODYaEi1jbfM7D7PwP8RZeq+0L1lQufWZKZIZshXcACQoB5dhntbQXEoy016nB4P1nqNh0NOpkW1qZ0Fne4Ay8zqYJOe0alt3B4fA1BRNR6p6kGoFUKLM5PV0/d0UFnNye86WP47mRaNMU6aE6U6aKwvwJLDMzcLnUmbLiOjuHr12xmLZ26zKUw6XXKALKjMNSbWuFtreevs3BYMVaQoYNWcODRKWDK49lgQDmI7+3eNI7tn4tsPhuouP2y7Ny9DfRrEYWjVxOJz0mr5clArkyIu6o62BDnkdQAL6kgdHmPgywpp1mr5Fz7vasM27tl7OJIqrOLwlEgaokeuEMLsSz14jrxAvRLHXiOvEC/EsdeJUVhAvRICoJOAiIgIiICIiAiIgIiUJtArExa+NVeM8rFbdUcYHvFhLbVgJqOI6R8jMGrt1jxgbi70R9xP2ic9210bevUKWXqlqFlDGnlc3OU2Avpc6G2syW2ox4yn20njMWczhJq2XXnM55jyD0PrVKl6lemtO2qhMxb8JN927vm57JoYfCrakozWszmxdvHgOwaTxRijzkxiJrjhJ4T7uu37pZnl2vvsbKdpSP28zwFry4tebuR7f2wyoxRnkLWlxahgeoMRJCvPPRjLyKTAzBVlRUlqnRYzJp4UwKBzLiky9TwsyEogQLNFTMtZQLJQEREBERAREQEREBMbGsQptMmRdLwOf7Xr1STvnhVBUPOdPrbMRuExn2GnKBzXq37ZIUm7Z0X+ApygbBTlA5+tFuUupQfkZvy7ETlLq7HQcIGhphX5GZFPBOeE3ldmIOEurgVHCBpdPZz8pl0tltym2jDLykxSEDWqWyTMulsqe5lEraB5tPZwEyEwiiZUQLS0QJMKJKICIiAiIgIiICIiAiIgIiICIiAiIgDKCIgViIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiIH//2Q==" alt="Imagen de Casco Jet" class="casco-img">
                </td>
                <td>
                    <p>No cubre la barbilla ni el mentón. Ofrece mucha visibilidad y ventilación, pero poca protección facial. </p>
                    <p> **Utilidad Ideal:** Ciudad, baja velocidad, scooters y motos custom (estética).</p>
                </td>
                <td>⭐⭐ Mínimo/Bajo (2/5)</td>
            </tr>

            <tr>
                <td>Doble Propósito (Aventura)</td>
                <td>
                    <img src="data:image/jpeg;base64,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" alt="Imagen de Casco Dual Sport" class="casco-img">
                </td>
                <td>
                    <p>Combina la visera de un casco integral con la mentonera extendida y la visera solar de un casco off-road. </p>
                    <p> **Utilidad Ideal:** Moto de aventura, uso mixto (carretera y terracería).</p>
                </td>
                <td>⭐⭐⭐⭐ Alto (4/5)</td>
            </tr>
            
        </tbody>
    </table>
    </div>
  
    <div class="mb-3">
    <a href="crear.php" class="btn btn-success">
        Agregar Nuevo Casco
    </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
          </table>
    </div>

  <div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-light">
            </thead>
        <tbody>
            <?php foreach ($cascos as $casco): ?>
                <tr>
                    <td><?php echo $casco['id']; ?></td>
                    <td><?php echo $casco['marca']; ?></td>
                    <td><?php echo $casco['modelo']; ?></td>
                    <td><?php echo $casco['tipo']; ?></td>
                    <td><?php echo $casco['certificacion']; ?></td>
                    <td>$<?php echo number_format($casco['precio'], 2); ?></td>
                    <td><img src="<?php echo $casco['imagen_url']; ?>" class="rounded" alt="casco_<?php echo $casco['id']; ?>" style="width: 60px; height: auto;"></td>
                    <td>
                        <a href="ver.php?id=<?php echo $casco['id']; ?>" class="btn btn-sm btn-outline-secondary">Ver</a>
                        <a href="editar.php?id=<?php echo $casco['id']; ?>" class="btn btn-sm btn-outline-primary">Editar</a>
                        <form method="POST" action="eliminar.php" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $casco['id']; ?>">
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este casco?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($cascos)): ?>
                <tr><td colspan="8" class="text-center">No hay cascos registrados.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
      

      <!-- Modal/Offcanvas para alta/editar (UI solo) -->
      <div class="offcanvas offcanvas-end" tabindex="-1" id="cascoEditor">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title">Agregar / editar casco</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
          <form class="form-card">
            <div class="mb-3">
              <label class="form-label">Marca</label>
              <input class="form-control" placeholder="Ej. Shoei">
            </div>
            <div class="mb-3">
              <label class="form-label">Modelo</label>
              <input class="form-control" placeholder="Ej. GT-Air">
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">Tipo</label>
                <select class="form-select"><option>Integral</option><option>Modular</option><option>Abierto</option></select>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">Certificación</label>
                <input class="form-control" placeholder="DOT / ECE">
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Precio aproximado</label>
              <input class="form-control" placeholder="$">
            </div>
            <div class="mb-3">
              <label class="form-label">Descripción</label>
              <textarea class="form-control" rows="3"></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">Imagen (UI)</label>
              <input class="form-control" type="file" disabled>
              <div class="form-text">(La carga es solo visual en este diseño; backend no incluido)</div>
            </div>
            <div class="d-flex justify-content-end">
              <button class="btn btn-secondary me-2" data-bs-dismiss="offcanvas">Cancelar</button>
              <button class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </section>

    <!-- NORMATIVA -->
    <section id="normativa" class="page">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Normativa y Reglamento Vial</h3>
        <small class="text-muted">Leyes y obligaciones</small>
      </div>

      <div class="card p-3">
        <h5>Resumen normativo</h5>
        <p class="text-muted">(Aquí se listará la normativa aplicable: límites de velocidad, uso de casco, documentación obligatoria, señalización, sanciones.)</p>

        <ul>
          <li>Uso obligatorio de casco homologado</li>
          <li>Documentación vigente: licencia, placa, seguro</li>
          <li>Respeto de límites de velocidad</li>
        </ul>
      </div>
    </section>

    <!-- ACCIDENTES -->
    <section id="accidentes" class="page">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Accidentes en Motocicleta</h3>
        <button class="btn btn-primary btn-sm">Registrar accidente</button>
      </div>

      <div class="card p-3">
        <h6>Listado de incidentes (ejemplo)</h6>
        <div class="table-responsive">
          <table class="table">
            <thead class="table-light">
              <tr><th>#</th><th>Fecha</th><th>Lugar</th><th>Descripción</th><th>Causa</th><th>Lesionados</th><th>Uso casco</th><th>Gravedad</th></tr>
            </thead>
            <tbody>
              <tr><td>1</td><td>2025-06-10</td><td>Av. Centro</td><td>Colisión por alcance</td><td>Distracción</td><td>2</td><td>Sí</td><td>Moderada</td></tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>

    <!-- FAQ -->
    <section id="faq" class="page">
      <h3>Preguntas Frecuentes</h3>
      <div class="accordion" id="faqAcc">
        <div class="accordion-item">
          <h2 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">¿Qué casco debo usar?</button></h2>
          <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAcc">
            <div class="accordion-body">Se recomienda casco integral con certificación homologada y talla correcta.</div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">¿Cada cuánto revisar el vehículo?</button></h2>
          <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAcc"><div class="accordion-body">Revisión mensual básica y mantenimiento anual profesional.</div></div>
        </div>
      </div>
    </section>

    <!-- CONTACTO / COMPROMISO -->
    <section id="contacto" class="page">
      <div class="row">
        <div class="col-lg-6">
          <h3>Contacto & Compromiso de conducción segura</h3>
          <p class="text-muted">Firma el compromiso y deja tus datos para recibir más información y campañas de seguridad.</p>

          <form class="form-card">
            <div class="mb-3">
              <label class="form-label">Nombre completo</label>
              <input class="form-control" placeholder="Nombre">
            </div>
            <div class="mb-3">
              <label class="form-label">Correo</label>
              <input class="form-control" type="email" placeholder="correo@ejemplo.com">
            </div>
            <div class="mb-3">
              <label class="form-label">Mensaje / Comentarios</label>
              <textarea class="form-control" rows="4"></textarea>
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" id="compromisoCheck">
              <label class="form-check-label" for="compromisoCheck">Me comprometo a cumplir prácticas seguras de conducción.</label>
            </div>
            <div class="d-flex gap-2">
              <button class="btn btn-primary">Enviar</button>
              <button class="btn btn-outline-secondary">Limpiar</button>
            </div>
          </form>
        </div>

        <div class="col-lg-6 mt-4 mt-lg-0">
          <div class="card p-3">
            <h5>Mapa / Información local</h5>
            <p class="text-muted">(Aquí se puede integrar un mapa o datos locales del lugar de práctica)</p>
            <div style="height:220px; background:#f1f5ff; border-radius:8px; display:flex;align-items:center;justify-content:center;">Mapa de ejemplo</div>
          </div>
        </div>
      </div>
    </section>

    <!-- LOGIN / REGISTRO -->
    <section id="login" class="page">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card p-4">
            <h4>Iniciar sesión</h4>
            <form>
              <div class="mb-3">
                <label class="form-label">Correo</label>
                <input class="form-control" type="email" placeholder="correo@ejemplo.com">
              </div>
              <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input class="form-control" type="password" placeholder="••••••">
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <div><a href="#" data-target="registro">¿No tienes cuenta? Regístrate</a></div>
                <button class="btn btn-primary">Entrar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <section id="registro" class="page">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card p-4">
            <h4>Registro de usuario</h4>
            <form>
              <div class="mb-3">
                <label class="form-label">Nombre completo</label>
                <input class="form-control">
              </div>
              <div class="mb-3">
                <label class="form-label">Correo</label>
                <input class="form-control" type="email">
              </div>
              <div class="mb-3 row">
                <div class="col-md-6">
                  <label class="form-label">Contraseña</label>
                  <input class="form-control" type="password">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Repetir contraseña</label>
                  <input class="form-control" type="password">
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <a href="#" data-target="login">Ya tengo cuenta</a>
                <button class="btn btn-primary">Registrarme</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

  </main>

  <footer class="bg-white border-top py-3">
    <div class="container d-flex justify-content-between">
      <div>© 2025 Rinos en Movimiento</div>
      <div class="text-muted">Proyecto académico — Módulo IV</div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // SPA-like navigation (UI only)
    const navLinks = document.querySelectorAll('.nav-link, [data-target]');
    const pages = document.querySelectorAll('.page');
    function showPage(id){
      pages.forEach(p=>p.classList.toggle('active', p.id===id));
      navLinks.forEach(l=>{
        if(l.dataset.target) l.classList.toggle('active', l.dataset.target===id);
      });
      window.scrollTo({top:0,behavior:'smooth'});
    }
    document.addEventListener('click', (e)=>{
      const t = e.target.closest('[data-target]');
      if(t){ e.preventDefault(); showPage(t.dataset.target); }
    });

    // Open casco offcanvas
    document.getElementById('addCascoBtn')?.addEventListener('click', ()=>{
      const oc = new bootstrap.Offcanvas(document.getElementById('cascoEditor'));
      oc.show();
    });
  </script>
</body>
</html>
