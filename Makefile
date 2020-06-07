SEARCH_MYSQL_DSN ?= root:pass@tcp(localhost:3306)/openbazaarcom

.PHONY: dev_env stop_dev_env
dev_env: ## Setup a development environment
	docker-compose -f docker-compose.yml up -d
	sleep 5
	docker-compose -f docker-compose.yml run \
		-v $(shell pwd)/scripts/migrations:/migrations migration \
		-verbose -path="/migrations" -database="mysql://root:pass@tcp(mysql:3306)/openbazaarcom" up

stop_dev_env: ## Tear down the dev env
	docker-compose -f docker-compose.yml down