# PetaLog Laravel Driver


PetaLog Laravel Driver is a Laravel package that seamlessly integrates with the [Petalog](https://github.com/pektiyaz/petalog) log and exception aggregation system. With this driver installed, your Laravel application can automatically send exceptions to the PetaLog project, providing you with a centralized and efficient way to monitor and manage errors.

# Features
- Automatic Exception Reporting: Once installed, the PetaLog Laravel Driver automatically captures and sends exceptions from your Laravel application to the PetaLog project.

- Custom Logging Functions: Extend the functionality of PetaLog with the provided PetaLog::capture and PetaLog::log functions. Easily send custom data and logs to the PetaLog project for comprehensive monitoring.

# Installation
To get started, install the PetaLog Laravel Driver using Composer:


```bash
composer require pektiyaz/petalog-laravel
```
Register in App\Exceptions\Handler.php
```php
 public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            PetaLog::capture($e);
        });
    }
```

# Configuration

Add Configurations to .env file
```dotenv
PETALOG_ID=2
PETALOG_URL='http://127.0.0.1:8000/api/log'
```

# Usage
Automatic Exception Reporting
With the PetaLog Laravel Driver installed, exceptions will be automatically reported to the PetaLog project.

# Custom Logging
Use the provided PetaLog::capture and PetaLog::log functions to send custom data and logs to the PetaLog project.

```php
Copy code
use Pektiyaz\PetalogLaravel\PetaLogDriver\Facades\PetaLog;

// Capture an exception
try{
    //something happening
}catch (Exception $ex){
    PetaLog::capture($ex);
}

// Log custom data
PetaLog::log('Hello World', ['key' => 'value'], 'debug');
// Log to admin
PetaLog::admin('Hello World', 'resource');
PetaLog::admin('Hello World', 'resource', 'info');
```
# Contributing
We welcome contributions from the community! If you'd like to contribute to the PetaLog Laravel Driver

# License
PetaLog Laravel Driver is open-source software licensed under the MIT License.

# Support
If you encounter any issues or have questions, please create an issue on the GitHub repository.