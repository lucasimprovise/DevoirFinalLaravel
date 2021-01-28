<?php

class signup extends Mailable
{
    use Queueable, SerializesModels;

    public $users;
}

public function __construct($users)
{
    $this->users = $users;
}
public function build ()
{
    return $this
        ->subject('You have a new account !')
        ->view('Email/new_register');
}

Mail::to($users->email)->send(new signup($users));


?>