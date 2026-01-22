# Other Tasks

- [ ] [Cron every 30 seconds](#cron-every-30-seconds)
- [ ] [Spam protection - suggest an interesting approach](#spam-protection---suggest-an-interesting-approach)
- [ ] [Prevent duplicate form submission](#prevent-duplicate-form-submission)

## Cron every 30 seconds [&uarr;](#other-tasks)

Cron has a minimum of one minute. To run every 30 seconds, run a script every minute that does work, sleeps 30 seconds,
then does work again. Another option is a script that runs every minute and triggers the target twice, sleeping 30
seconds between runs.

## Spam protection - suggest an interesting approach [&uarr;](#other-tasks)

- Google reCAPTCHA
- blacklist
- hidden field (honeypot) validated on the backend

## Prevent duplicate form submission [&uarr;](#other-tasks)

Rate limit submissions per user and per time window.
