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

        return 'https://ui-avatars.com/api/?name='.urlencode($name).'&color=7F9CF5&background=EBF4FF';
    }
```