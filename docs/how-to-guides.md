# How to Guides

* [How to use assets](#how-to-use-assets)
* [How to use Git](#how-to-use-git)
* [How to run app on your local dev environment](#how-to-run-app-on-your-local-dev-environment)
* [How to deploy to Testing](#how-to-deploy-to-testing)

## How to use assets

1. We use laravel webpack for compile assets by running `npm run dev` & `npm run production`. Please stick to it.
2. Avoid adding assets directly in to `public` directory. Use `resources` directory and compile via webpack.

## How to use Git

1. This project uses [Git Flow](https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow) as the branching model.
2. This project uses [this commit message pattern](git-commit-msg.md). Please try to stick to it.

### When you are working on a issue here are the steps to follow.

1. Create a new branch from `develop` branch.
2. Work on it and after finished go to [GitHub](https://github.com/randika-srimal/rentitem-admin-panel) and open a PR. Use `develop` branch as base.
3. Assign the PR to a reviewing person (Randika) for review.
4. Reviewing person will review and merge to `develop` or let you know if change requires.

## How to run app on your local dev environment.

We have setup a highly customizable easy custom docker setup for this project.

1. Installl `Docker` and `Docker Compose` tools in to development PC.
2. Running `make up` command in project root will start all containers.
3. Access app container shell by running `make shell`.
4. You can execute any standard artisan, composer, npm command within the shell. Just run `composer install` to install laravel dependencies.
5. `/docker-configs/env` directory contains the environment files used by docker local setup to start MySQL, Apache, phpMyAdmin & documentaion. No need to change the default values as we are working on local developement environment with these.
6. You will need to set docker database container's service name as `DB_HOST` in Laravel's env file. Set it in .env file as mentioned below.

    ```
    DB_HOST=rentitem-mysql
    DB_USERNAME=root
    DB_PASSWORD=root
    ```
7. If you are testing email sending fucntionalities we have already set up a MailHog container to access via [http://localhost:8003](http://localhost:8003). Before using that, you will need to set laravel .env values as mentioned below to use MailHog for mail caching.

    ```
    MAIL_MAILER=smtp
    MAIL_HOST=rentitem-mailhog
    MAIL_PORT=1025
    ```

8. List of accessible services with docker

    * Dashboard : [http://localhost:8001](http://localhost:8001)
    * PhpMyAdmin : [http://localhost:8002](http://localhost:8002)
    * MailHog : [http://localhost:8003](http://localhost:8003)
    * Documentation : [http://localhost:8004](http://localhost:8004)

## How to deploy to testing

You will access the [Testing Server](http://139.59.107.39/login) by navigating to this. Use below demo admin credentials to login to the system.

> Demo Admin Credentials. Email: admin@system.com | Password: password

We have setup a GitHub Actions CI-CD pipeline to auto deploy the system. Just pushing a branch with a tag like `beta-v1.0.0` will deploy to the VPS server. Please avoid adding that tag for every new update. We will release to testing after developing multiple features. 