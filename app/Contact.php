<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  public $table="contact";
    public $fillable=[
      "contact_name",
      "contact_email",
      "contact_message"
    ];
}
