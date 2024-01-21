<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('post.{post_id}', function ($user, $post_id) {

	/* esto era solo para permitir el acceso al canal si es su post
       if ($user->posts->contains($post_id)) {
		return $user;
	} */
    return $user;
});

Broadcast::channel('proy.{proyecto_id}', function ($user, $proyecto_id) {
    //validar despues
    return $user;
});

Broadcast::channel('en-sesion', function ($user) {
    return $user;
});

Broadcast::channel('sala.{id}', function ($user,$id) {
    //validar despues para que solo los que esten en esa sala puedan ver
    return $user;
});

// Broadcast::channel('salirse-sala.{sala_id}', function ($user,$sala_id) {
    
//     return $user;
// });