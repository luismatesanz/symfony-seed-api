Symfony Seed Application
=====================

Project Seed Symfony 3 starter for API. 

With Bundles:
- FOSRestBundle
- JMSSerializer
- NelmioAPIDocBundle
- NelmioCorsBundle
- LexikJWTAuthenticationBundle
- GesdinetJWTRefreshTokenBundle

API with JWT Authentication, messages only JSON and Serializer filter fields.

With examples DBAL connection.


Installation
------------

- Generate the SSH keys for JWT Token:

        $ mkdir -p var/jwt 
        $ openssl genrsa -out var/jwt/private.pem -aes256 4096
        $ openssl rsa -pubout -in var/jwt/private.pem -out var/jwt/public.pem

- Execute in command line in path folder project:

        1. composer install
        2. bin/console doctrine:create:database
        3. bin/console doctrine:schema:update --force --dump-sql
   
       
Documentation
-------------

AppBundle is a bundle by default application configure.

You must create bundle by each entity in your domain model with the same structure in BlogBundle. You can add logic by bundle to Web, API and Admin.

The layer Handler is your folder for bussiness logic.

Bundles Installation
-------------

- Generate Bundle.
        
        bin/console generate:bundle

- Add routing to app/routing.yml (command generate automatically).

        blog:
            resource: "@BlogBundle/Resources/config/routing.yml"

- Add imports to app/config.yml (command generate automatically).

        imports:
            - { resource: "@BlogBundle/Resources/config/admin.yml" }
            - { resource: "@BlogBundle/Resources/config/services.yml" }

Routes
-------------

- /api is a route for api application.
- /api/doc is a route for your api swagger documentation.


API
-------------

- Login:
    
        /api/login (POST)
        Body:
            username: 
            password:
            
- Refresh Token:
    
        /api/token
        Params:
            refresh_token: 
            
- Access API:
    
        /api/{ENDPOINT}
        Headers:
            Authorization: Bearer +{TOKEN}
    
- You can get only fields you want with query param fields. Example:

        /api/blogs?fields=date,title