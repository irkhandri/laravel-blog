<?php

namespace App\Providers;
use App\Models\Post;
use App\Policies\PostPolicy;
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
    public function boot()
{
    // $this->registerPolicies();

    VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
        return (new MailMessage)
            ->subject('Please Verify Email Address')
            ->view('emails.email-ver-mes', ['url' => $url]);
            // ->line('Click the button below to verify your email address.')
            // ->action('Verify Email Address', $url);
    });
}

   
}
