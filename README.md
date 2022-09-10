**Project Requirement**

In order to be able to be receive email-based orders and send replies for each order, the [Mailgun Email Delivery service](https://www.mailgun.com/) was integrated. As such, its credentials need to be added on the environment variables.

**Project Set up**

Clone the project
```bash
git clone https://github.com/Phished-BV/technical-assignment-kennedy-osaze.git
```

Install project dependencies

```bash
composer install

npm install
```

Set up and configure environment variables based on needs

```bash
cp env.example env
```

**Note**: The `MAIL_ORDER_TO_ADDRESS` is used to configure the email address orders will be sent to. The email will also need to be set up on Mailgun for handling inbound routing of emails as defined in their [documentation](https://documentation.mailgun.com/en/latest/quickstart-receiving.html#how-to-start-receiving-inbound-email).

Access the project URL locally by running

```bash
npm run dev

php artisan serve
```
