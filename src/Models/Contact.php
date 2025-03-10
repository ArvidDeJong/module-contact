<?php

namespace Darvis\ModuleContact\Models;

use Darvis\Manta\Mail\MailHtml;
use Darvis\Manta\Models\Option;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Mail;
use Darvis\Manta\Traits\HasUploadsTrait;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUploadsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'created_by',
        'updated_by',
        'deleted_by',
        'company_id',
        'host',
        'pid',
        'locale',
        'active',
        'sort',
        'company',
        'title',
        'sex',
        'firstname',
        'lastname',
        'name',
        'email',
        'phone',
        'address',
        'address_nr',
        'zipcode',
        'city',
        'country',
        'birthdate',
        'newsletters',
        'subject',
        'comment',
        'internal_contact',
        'ip',
        'comment_client',
        'comment_internal',
        'option_1',
        'option_2',
        'option_3',
        'option_4',
        'option_5',
        'option_6',
        'option_7',
        'option_8',
        'data',        // Nieuwe kolom
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'array',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [];

    /**
     * @param mixed $value 
     * @return mixed 
     */
    public function getDataAttribute($value)
    {
        return $value ? json_decode($value, true) : [];
    }

    public function sendmail()
    {
        $model = $this;

        // E-mail versturen
        $CONTACT_RECEIVERS = Option::get('CONTACT_EMAIL_RECEIVERS', Contact::class, app()->getLocale());
        $CONTACT_EMAIL_SUBJECT = Option::get('CONTACT_EMAIL_SUBJECT', Contact::class, app()->getLocale());
        $CONTACT_EMAIL = Option::get('CONTACT_EMAIL', Contact::class, app()->getLocale());
        // Decode the JSON string to an array
        $receiversArray = json_decode($CONTACT_RECEIVERS, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $receiversArray[] = env('MAIL_TO_ADDRESS');
            // Handle JSON decode error
            // throw new \Exception('Error decoding CONTACT_RECEIVERS JSON: ' . json_last_error_msg());
        }

        // Ensure $receiversArray is an array
        if (!is_array($receiversArray)) {
            $receiversArray[] = env('MAIL_TO_ADDRESS');
            // throw new \Exception('CONTACT_RECEIVERS must be a JSON array.');
        }

        $templateContent = $CONTACT_EMAIL;
        $pattern = '/\{\{\s*\$(\w+)-&gt;(\w+)\s*\}\}/';

        // Geef $model door in de callback
        $content = preg_replace_callback($pattern, function ($matches) use ($model) {
            $modelName = $matches[1];   // bijvoorbeeld "contact"
            $attribute = $matches[2];   // bijvoorbeeld "name"

            // Check of de property op het model bestaat en een waarde heeft
            if ($modelName === 'contact' && isset($model->{$attribute})) {
                return e($model->{$attribute});
            }

            return ''; // Fallback bij een ongeldige placeholder
        }, $templateContent);

        // Process each receiver
        foreach ($receiversArray as $receiver) {
            if ($receiver == "##ZENDER##" && filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                Mail::to($this->email)->send(new MailHtml($CONTACT_EMAIL_SUBJECT, $content));
            } else if (filter_var($receiver, FILTER_VALIDATE_EMAIL)) {
                Mail::to($receiver)->send(new MailHtml($CONTACT_EMAIL_SUBJECT, $content));
            }
        }

        return true;
    }
}
