<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UpCours | Plateforme de Cours en Ligne</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body, html {
      height: 100%;
      margin: 0;
    }

    .hero-section {
      background: url('https://www.planetegrandesecoles.com/wp-content/uploads/2023/05/cours-particulier-en-ligne-avantages-850x560.png.webp') 
        no-repeat center center/cover;
      height: 100vh;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.6);
      z-index: 1;
    }

    .hero-content {
      position: relative;
      z-index: 2;
      text-align: center;
      color: #fff;
    }

    .hero-content h1 {
      font-size: 4rem;
      font-weight: 700;
      margin-bottom: 1rem;
    }

    .hero-content p {
      font-size: 1.5rem;
      margin-bottom: 2rem;
    }

    .btn-custom-primary {
      background-color: #007bff;
      border: none;
      color: #fff;
    }

    .btn-custom-primary:hover {
      background-color: #0056b3;
    }

    .btn-custom-secondary {
      background-color: #f8f9fa;
      color: #212529;
      border: none;
    }

    .btn-custom-secondary:hover {
      background-color: #e9ecef;
      color: #212529;
    }
  </style>
</head>
<body>
  <div class="hero-section">
    <div class="overlay"></div>
    <div class="hero-content">
      <h1>UpCours</h1>
      <p>Votre plateforme de cours en ligne pour apprendre et réussir</p>
      <div class="d-flex justify-content-center gap-3">
        <a href="/form/auth" class="btn btn-custom-primary btn-lg px-4">S'authentifier</a>
        <a href="page//cours" class="btn btn-custom-secondary btn-lg px-4">Cours</a>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
