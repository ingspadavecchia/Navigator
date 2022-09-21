.PHONY: start build stop bash analyze unit integration
.DEFAULT_GOAL := help

help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

start: ## Start docker-composer
	./vendor/bin/sail up -d
about: ## show all options for Laravel sail command
	./vendor/bin/sail about
stop: ## Stop docker-compose
	./vendor/bin/sail down
clear-cache: ## Remove local Cache into the container
	./vendor/bin/sail artisan cache:clear
clear-db-test: ## Drop and restore test Database
	./vendor/bin/sail artisan --env=testing migrate:fresh --seed
test: ## Run test command into the container
	./vendor/bin/sail artisan test
test-coverage: ## Run test with coverage command into the container
	./vendor/bin/sail artisan test test --coverage

