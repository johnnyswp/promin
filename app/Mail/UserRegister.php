<?php



namespace App\Mail;



use App\Models\User;

use Illuminate\Mail\Mailable;



class UserRegister extends Mailable

{

    protected $user;


    public function __construct(User $user)

    {

        $this->user = $user;

    }


    public function build()
    {

        return $this->view('emails.users.register')

                    ->with([

                        'user' => $this->user,

                    ]);

    }

}