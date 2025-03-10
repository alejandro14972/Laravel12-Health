<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Implicitly grant "Super Admin" role all permissions
        // This works in the app by using gate-related functions like auth()->user->can() and @can()
        Gate::before(function ($user, $ability) {
            return $user->hasRole('super-admin') ? true : null;
        });

        //mailhog
        //verify email
         VerifyEmail::toMailUsing(
            function ($notifible, $url)  {
                return (new MailMessage)
                    ->subject('Verificar cuenta')
                    ->line('Tu cuenta ya esta casi lista, solo necesitas verificar tu correo.')
                    ->action('Confirmar cuenta', $url)
                    ->line('Si no creaste una cuenta, no es necesario realizar ninguna acción.');
            }
        );

        //reset password
        ResetPassword::toMailUsing(
            function ($notifible, $url)  {
                $urlComplete = 'http://localhost:8000/reset-password/'.$url;
                return (new MailMessage)
                    ->subject('Restablecer contraseña')
                    ->line('Recibes este correo porque se solicitó un restablecimiento de contraseña para tu cuenta.')
                    ->action('Restablecer contraseña', $urlComplete)
                    ->line('Este enlace de restablecimiento de contraseña caducará en 60 minutos')
                    ->line('Si no solicitaste un restablecimiento de contraseña, no es necesario realizar ninguna acción.');
            }
        ); 

    }
}
