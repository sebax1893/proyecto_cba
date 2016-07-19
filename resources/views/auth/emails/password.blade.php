Siga el siguiente link para restablecer la contraseña: <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>


Siga el siguiente link para restablecer la contraseña: {{url('password/reset' . $token)}}

