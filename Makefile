dc-php=$$(echo "docker-compose exec php")

.PHONY: help
help: ## Displays this list of targets with descriptions
	@grep -E '^[a-zA-Z0-9_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}'

.PHONY: up
up: ## Bring up the containers
	docker-compose up -d

.PHONY: down
down: ## Bring down the containers
	docker-compose down

.PHONY: shell
shell: up ## Bring up the containers
	$(dc-php) bash

.PHONY: stan
.SILENT: stan
stan: ## Run php stan in docker container
	${dc-php} "vendor/bin/phpstan" "analyse"

.PHONY: test
.SILENT: test
test: ## Run php stan in docker container
	${dc-php} "vendor/bin/phpunit"

.PHONY: setup
.SILENT: setup
setup: build .env composer ## Build everything to run this project

.PHONY: build
.SILENT: build
build: ## Build Dockerfile
	docker-compose build

.env: ## Build .env
	cp .env.example .env

.PHONY: composer
.SILENT: composer
composer: up ## run composer install
	docker-compose run php composer install

.PHONY: npm
.SILENT: npm
npm: up ## run composer install
	npm run && npm run dev

.PHONY: db
.SILENT: db
db: ## Create lokal db-struktur with seeder
	${dc-php} "php" "artisan" "migrate:fresh" "--seed"
