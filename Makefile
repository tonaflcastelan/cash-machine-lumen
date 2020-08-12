install:
	@echo "Installing dependencies"
	@if [ ! -f .env ]; then cp .env.example .env; fi
	@( \
		composer install; \
	)

app_key:
	@echo "Generate key"
	@date +%s | sha256sum | base64 | head -c 32 ; echo

jwt_key:
	@echo "Generate JWT string"
	@date +%s | sha256sum | base64 | head -c 32 ; echo

start:
	@echo "Init Lumen Server"
	@php -S localhost:8000 -t public

migrations:
	@echo "Execute migrations"
	@php artisan migrate

seeds:
	@echo "Execute seeders"
	@php artisan db:seed

documentation:
	@echo "Generate Api Doc"
	@php artisan apidoc:generate