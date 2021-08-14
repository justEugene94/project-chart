# Installation
* #### Clone Project

```bash
cd /var/www
sudo mkdir chat
sudo chown {{YOUR_USER}}:{{YOUR_USER}} chat

git clone git@github.com:justEugene94/project-chat.git chat
```

* #### Create `.env` File

```bash
cp .env.example .env
```

* #### Open and Configure `.env` File

* #### Build Sail (Docker)

```bash
sudo service nginx stop
sudo service mysql stop

vendor/bin/sail up -d
```

* #### Install Composer

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs
```

* #### Generate Key

```bash
sail artisan key:generate
````

* #### Install NPM and Run All Mix Tasks

```bash
sail npm install

sail npm run dev
```

* #### Migrations and Seeds

```bash
sail artisan migrate
```

* #### Start Watcher

```bash
sail npm run watch
```
