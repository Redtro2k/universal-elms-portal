# universal-elms-portal
 
### reconfig the vendor

> vendor/laravel/jetstream/src/HasProfilePhoto.php

```php
protected function defaultProfilePhotoUrl()
    {
        $modified_name = str_replace(' ', '', $this->firstname) . ' '. str_replace(' ', '', $this->lastname);
        $name = trim(collect(explode(' ', $modified_name))->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })->join(' '));
        return 'https://ui-avatars.com/api/?name='.urlencode($name).'&color=f43f5e&background=ffe4e6';
    }
```

```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=a340090aaf71fb
MAIL_PASSWORD=286bc719ec40b7
MAIL_ENCRYPTION=tls
```