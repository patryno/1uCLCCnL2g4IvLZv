# 1uCLCCnL2g4IvLZv

Symfony 4 application to give the possiblity to download persons from https://swapi.co/ and to ask this application about current this data.

<h3>To download external database, you need to:</h3>

1. Clone repository
2. Have installed required stuff (Composer, mysql, apache, php etc.) 
3. Create new schema in the database (recommended name is swapi) and have root user with password czekolad (or you can change any of this data in .env)
3.b Is recommended to `run composer install -a`
4. launch `php bin/console doctrine:migrations:migrate` to create new table
5. Launch symfony with: `php bin/console server:run`
6. Launch `php bin/console swapi:importData x` where `x` is the number of range 1-88 as it is not possible to import more than 88 persons (no more in swapi db) 

Now you should have imported in database persons from swapi

<h3>How to use endpoint to take person by name:</h3>

I use `postman` chrome extension to ask about the data. 
Use `$_GET` and put uri: `http://localhost:8000/api/people/Luke Skywalker/?oauth_token=tokenik`

I allow for two different tokens (token is required) `tokenik` and `superDuper` i keep it in the php file because that was enought in this case.

