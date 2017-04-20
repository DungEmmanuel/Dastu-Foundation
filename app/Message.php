<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

	protected $fillable = ['phoneemail', 'message'];
	
    public function getMessage()
    {
          return $this->message;
    }

    public function getPhoneEmail()
    {
          return $this->phoneemail;
    }


}
