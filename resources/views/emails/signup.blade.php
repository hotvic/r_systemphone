<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirmar E-Mail</title>
</head>
<body>
    <h1>Obrigado por se Cadastrar!</h1>

    <p>
        Agora você precisa apenas <a href="{{ route('register.confirm', ['code' => $user->confirmation_code]) }}">confirmar seu endereço de E-Mail</a>!
    </p>
</body>
</html>