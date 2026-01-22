# Notes

=====================================

- Simple CRUD application with PHP and JSON      https://youtu.be/DWHZSkn5paQ
- Todo app with PHP                             https://youtu.be/NxeNqHdJFxs
- PHP Watch files and directories recursively   https://youtu.be/5f4PjQJI-Fc
- Bulk image resize with PHP                    https://youtu.be/Z99lYtn3quk
- PHP registration form & validation            https://youtu.be/V5sJ76T3mWg

=====================================

- Build PHP Form Widget using OOP Abstraction                      https://youtu.be/sBP6HKRW0sM
- Build Shopping Cart with OOP                                     https://youtu.be/1Ip7_hdSqzY
- Create MySql Notes App                                           https://youtu.be/DOsuFRnBqLU
- How To Create A Login System In PHP For Beginners                https://youtu.be/gCo6JqGMi30

=====================================

- Build PHP MVC
  Framework                 https://www.youtube.com/watch?v=WKy-N0q3WRo&list=PLLQuc_7jk__Uk_QnJMPndbdKECcTEwTA1
- Create your own PHP Framework           https://symfony.com/doc/current/create_framework/index.html

=====================================

- Yii2 E-commerce website - Full Working Process 16h 30m    https://youtu.be/eQdDBhQpU9o
- Build a REST API using Yii2 PHP Framework 1h 25m    https://youtu.be/XyHHMvRt6Cw
- Vue.js & Yii2 REST API notes app 2h 30m    https://youtu.be/7vrctmDQYW4

- Laravel E-Commerce 16h 30m    https://www.youtube.com/watch?v=o5PWIuDTgxg&list=PLEhEHUEU3x5oPTli631ZX9cxl6cU_sDaR
- Laravel Movie App 1h 25m    https://www.youtube.com/watch?v=9OKbmMqsREc&list=PLEhEHUEU3x5pYTjZze3fhYMB4Nl_WOHI4
- A lot of great videos from Laraveller collection    https://www.youtube.com/c/Laraveller/videos

=====================================

#### Task 1. "Basic web". Implement CRUD in plain PHP.

Goal:

- Build an authentication page.
- Build a feedback form page that includes: a single-line text field, a multi-line text field, radio buttons, checkboxes,
  a dropdown, a reset button, a submit button.
- The feedback form is available only to authenticated users; the access criterion is a successful login.

CRUD interface development

- Build a mini admin panel:
  - List of submitted feedback forms.
  - The list should be sorted by submission date, newest first.

#### Task 3. Website parsing

Competencies:

- Regular expressions
- Server-side HTTP requests, cURL
- TODO: write CLI utilities (and one-off scripts) on the Bitrix Framework codebase
- TODO: add CRON

Goal:

- Analyze a site and design data structures suitable for automated processing
- Parse the site into these structures
- Package it as a CLI script
- Use settings to allow parsing only what the user needs

Review:

- Correctness of the CLI environment
- Regular expression decomposition
- Request efficiency
- Error handling
- Ability to parse multiple objects in parallel
- Work in console and interactive modes
- Work as an external service available over HTTP with queue support

#### Task 4. Count hit totals

Task: I have `banner.php`. It outputs a static image, some banner. We include it on a page like this:

```
<img src="/banner.php"/>
```

I need to know how many times we showed it.

Counting unique visits is best done with sessions or cookies.
Storing it is best in a NoSQL database.

#### Task 5. Misc

Recommendations:

1. Minimal features. Forget the words "universal solution"/"platform"/"plugins", otherwise you will burn out before you
   finish.
2. Do not use ready-made engines like WordPress/Joomla/Magento, but use a framework to avoid reinventing the wheel.
3. Ignore layout details: use only Twitter Bootstrap or ready-made templates.

Project ideas:

- Blog
- Forum
- Weather forecast site
- Site with up-to-date currency rates
- Site with all of the above, or separate modules in a system
