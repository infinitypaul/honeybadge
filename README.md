<p align="center">a production-ready web endpoint that accepts a JSON payload as a POST request and sends an alert to a Slack channel if the payload matches desired criteria.</p>
<p align="center"><a href="https://medium.com/@infinitypaul">Creator</a></p>

## Tech Stack

* Laravel
* Mysql
* PHP

## Download Instruction

1. Clone the project.

```
git clone https://github.com/infinitypaul/honeybadge.git projectname
```


2. Install dependencies via composer.

```
composer install 
```


3. Run php server.

```
php artisan serve
```

## Troubleshooting

- If you have any other issues, [report them](https://github.com/infinitypaul/honeybadge/issues).


## Setup

The slack channel requires a url configuration option. This URL should match a URL for an incoming webhook that you have configured for your Slack team. https://slack.com/apps/A0F7XDUAZ-incoming-webhooks
```
Add the webhook url to your .env
LOG_SLACK_WEBHOOK_URL=
```

## Api Usage

> Using POST Request:

```
POST http://localhost/api/notify

payload: {
  "RecordType": "Bounce",
  "Type": "SpamNotification",
  "TypeCode": 512,
  "Name": "Spam notification",
  "Tag": "",
  "MessageStream": "outbound",
  "Description": "The message was delivered, but was either blocked by the user, or classified as spam, bulk mail, or had rejected content.",
  "Email": "zaphod@example.com",
  "From": "notifications@honeybadger.io",
  "BouncedAt": "2023-02-27T21:41:30Z"
}
```

* http://localhost/ is your Base Url, You Can Replace it with yours


And Viola.

Enjoy!!

