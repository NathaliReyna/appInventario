<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    body { font-family: Arial; background: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; }
    form { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); width: 300px; }
    input { display: block; width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px; }
    button { background: #007bff; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer; width: 100%; }
    button:hover { background: #0056b3; }
    .error { color: red; font-size: 14px; }
  </style>
</head>
<body>
  <form method="POST" action="{{ route('login.post') }}">
    @csrf
    <h2>Iniciar sesión</h2>

    @if($errors->any())
      <div class="error">{{ $errors->first() }}</div>
    @endif

    <input type="email" name="email" placeholder="Correo" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Entrar</button>
  </form>
</body>
</html>
