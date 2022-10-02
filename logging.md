# Logging

## Loging Info

The following list is a list of fields that are logged into log files:
Format:

- `short_code(Field Name)`<span style="color:red">(\*: if required)</span>: description
  - explan mean of this field
  - Is encrypt data?
  - Is mask data?

**Example:**

- `ip(IP Address)`<span style="color:red">(\*)</span>: Log the IP address of the client that made the request.
- `t(Date Time)`<span style="color:red">(\*)</span>: Log the date on which the activity occurred
- `level(Log level)`<span style="color:red">(\*)</span>: Levels control which events are processed

  The list of log level

  - `DEBUG` Designates fine-grained informational events that are most useful to debug an application.
  - `INFO` Designates informational messages that highlight the progress of the application at coarse-grained level.
  - `ERROR` Designates error events that might still allow the application to continue running.
    ...

- `medhod(Method)`<span style="color:red">(\*)</span>: Log the requested action. For example, GET, POST, etc.
- `ua(User-Agent)`<span style="color:red">(\*)</span>: Log the browser type that the client used.
- `http_code(Response HTTP Code)`: Log the HTTP status code.
- `uid(User ID)`: ID of user in `users` table. This data need are masked before save to log. `Data = User ID + 3426`

  ...

Reference [Logging Design](link driver)

## Log Convention

### Log line format

Each line of log is json string. The keys in json are short_code of fields which defined in **Loging Info**
Example:

```
"{"time":"2021-05-06 14:42:06", "level":"INFO", "action_type":"TRY_LOGGING", "method": "POST", "user": {"user_id":1}, "context":{"first_message":"message1","second_message":"message2"}, "ip": "172.168.1.1", "user-agent": NULL}"
```

### Log filename

- Use `hyphen-case` to define log filename
- Prefix: `<app_name>`

Example: Projectname=opms -> filename = `opms-laravel.log`

## Log type

Define log file for special feature or special function to ensure ease of management and analysis log.

### `Log path file` ex: `/var/app/current/storage/laravel.log`

`Description`

**Loging Info: **

_list of fields that are logged into log files_

- `ip(IP Address)`<span style="color:red">(\*)</span>: Log the IP address of the client that made the request.
- `t(Date Time)`<span style="color:red">(\*)</span>: Log the date on which the activity occurred
  ...

**Example format log:**

```
"{"time":"2021-05-06 14:42:06", "level":"INFO", "action_type":"TRY_LOGGING", "method": "POST", "user": {"user_id":1}, ..."}"
```

## Logging structure

### Config Logging

Customize the log line format at `App\Logging\CustomizeFormatter`

And config logging for channel `single` at logging.php:

```php
'single' => [
  'driver' => 'single',
  'tap' => [App\Logging\CustomizeFormatter::class],
  'path' => storage_path('logs/laravel.log'),
  'level' => 'debug',
],
```

Usage write log:

```php
Log::channel('single')->info('ACTION_XXXX...', $parameters = []);
```

Example:

```php
Log::channel('single')->info("USER_CREATE_INVOICE", [
  "gc_quantity" => $request->GC,
  "crypto_amount" => $request->amount,
  "currency" => $request->currency,
]);
```

### Config rotate log

Reference [Logging Design](link driver)

### Log management tool

Write diagram of push log to management tool. Explan detail components.

Example log management tools:

- Cloudwatch
