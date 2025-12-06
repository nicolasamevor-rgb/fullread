<!DOCTYPE html>
<html lang="en">

<head>

    <title>Message de validation</title>
</head>

<body>
    <h1>Validation de réservation</h1>
    <p>
        Lecteur <strong>{{ $user->name }}</strong>, votre réservation du Livre
        <strong>{{ $reservation->livre->titre}}</strong> de l'auteur
        <strong>{{  $reservation->livre->auteur }}</strong>
        a été validé avec succès <br>
        Vous êtes prié de venir récupérer le livre dans les trois jours qui suivent.
    </p>
    <a href="">Accéder au site</a>
</body>

</html>