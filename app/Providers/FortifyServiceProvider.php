<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        //Función para devolver nuestra vista de "inicio de sesión".
        Fortify::loginView(function () {
            Artisan::call('cache:clear');
            return view('auth.login');
        });
        //Función para devolver nuestra vista de "registro". 
        Fortify::registerView(function () {
            return view('auth.register');
        });
        //Función para devolver nuestra vista de "contraseña olvidada".
        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.passwords.email');
        });
        //Función para devolver nuestra vista de "restablecimiento de contraseña.
        Fortify::resetPasswordView(function ($request) {
            return view('auth.passwords.reset', ['request' => $request]);
        });
        //Función para mostrar la pantalla de verificación de correo electrónico.
        Fortify::verifyEmailView(function () {
            return view('auth.verify');
        });
        //Este método acepta un cierre que recibe la solicitud HTTP entrante.
        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->username)
                ->orWhere('username', $request->username)
                ->first();

            if (
                $user &&
                Hash::check($request->password, $user->password)
            ) {
                return $user;
            }
        });
        //Funciones incluidas con la instalación
        /*RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->email.$request->ip());
        });*/

        /*RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });*/
    }
}
