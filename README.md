# Technical assignment

Create a small web app for an email-based ordering system.

**Scope**

Your task is to make the following possible:

- allow orders to come in via a dedicated email address
- provide an easy way to see all incoming orders
- make it easy to reply to an order

**Minimal requirements**

- Use Laravel

Other than that, you are free to use the tools you prefer. However, we strongly suggest you keep the relevant skills of the job offer in mind.

**Timing**

You have one week to accomplish the assignment. You decide yourself how much time and effort you invest in it. We believe two hours should be sufficient to be able submit an adequate assignment. Please send us an email (to dimitri@phished.recruitee.com with manon@phished.recruitee.com in CC) when your assignment is ready for review. Please mention your name, GitHub username, and a link to what we need to review.

----

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
