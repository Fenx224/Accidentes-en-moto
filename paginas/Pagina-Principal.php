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
        <div>
          <button class="btn btn-primary btn-sm" id="addCascoBtn">Agregar casco</button>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead class="table-light">
            <tr>
              <th>#</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Tipo</th>
              <th>Certificación</th>
              <th>Precio aprox.</th>
              <th>Imagen</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Marca A</td>
              <td>Modelo X</td>
              <td>Integral</td>
              <td>DOT / ECE</td>
              <td>$1,200</td>
              <td><img src="https://via.placeholder.com/60" class="rounded" alt="casco"></td>
              <td>
                <button class="btn btn-sm btn-outline-secondary">Ver</button>
                <button class="btn btn-sm btn-outline-primary">Editar</button>
                <button class="btn btn-sm btn-outline-danger">Eliminar</button>
              </td>
            </tr>
            <!-- Filas de ejemplo -->
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
