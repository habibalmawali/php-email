# PHP email by using gmail account.

## The example include the functionality of:
- Sending email
- Sending email with attachments

## Prerequisite:
If you are not using secure connection over ssl you need to change your google account security setting to allow less secure apps: [Less Secure Apps Link](https://myaccount.google.com/lesssecureapps).

## Configuration:
You have to open email.php file and change the variables to your gmail setting

```php
$senderName = "Habib Dev.";
$emailAddress = "";
$emailPassword = "";
```

## Examples:

1. index.php is a very straightforward example. Change the email details array values and pass your needed details.

```php
$emailDetails = 
	[
		'email'		=> 'habib.almawali@gmail.com',
		'subject'	=> 'Habib Dev.',
		'message'	=> 'Dear Habib, email is working fine :)'
	];
```

2. form.php is form example, change the email details array values and pass your needed details.

```php
$emailDetails = 
	[
	    'email'     => $user_email,
	    'subject'   => 'Habib Dev. email form example',
	    'message'   => '<h2>' . $user_message . '</h2>'
	];
```

3. form2.php is form with attachment example, change the email details array values and pass your needed details.

```php
$emailDetails = 
    [
        'email'     => $user_email,
        'subject'   => 'Habib Dev. email form with attachment example',
        'message'   => '<h2>' . $user_message . '</h2>',
        'attach'    => $_FILES['file']
    ];
```

## Available array keys to pass in:
1. email		**This is required**
2. subject		**This is required**
3. message		**This is required**
4. attach		**This is optional**

*you don't have to change the array keys unless you have good reason.*


###### Thank you.

**Note that I am not responsible for any misuse of any of my examples.**

> Habib AlMawali :smirk_cat: