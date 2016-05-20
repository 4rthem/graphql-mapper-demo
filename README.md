# GraphQL Mapper demo

A demo for the [GraphQL Mapper](https://github.com/4rthem/graphql-mapper) library

## Installation

Install composer dependencies:

```bash
composer install
```

Create your database:

```sql
CREATE DATABASE `graphql-demo`;
```

Generate the schema:

```bash
bin/doctrine orm:schema-tool:create
```

Run the following SQL query in order to get fixtures:

```sql
INSERT INTO `sw_characters` (`id`, `name`, `appearsIn`, `discr`, `homePlanet`, `primaryFunction`) VALUES
(1000, 'Luke Skywalker', '[4,5,6]', 'human', 'Tatooine', NULL),
(1001, 'Darth Vader', '[4,5,6]', 'human', 'Tatooine', NULL),
(1002, 'Han Solo', '[4,5,6]', 'human', NULL, NULL),
(1003, 'Leia Organa', '[4,5,6]', 'human', 'Alderaan', NULL),
(1004, 'Wilhuff Tarkin', '[4]', 'human', NULL, NULL),
(2000, 'C-3PO', '[4,5,6]', 'droid', NULL, 'Protocol'),
(2001, 'R2-D2', '[4,5,6]', 'droid', NULL, 'Astromech'),
(2002, 'test-droid', '[5,4]', 'droid', NULL, 'tester');

INSERT INTO `friend` (`character_source`, `character_target`) VALUES
(1000, 1002),
(1000, 1003),
(1000, 2000),
(1000, 2001),
(1001, 1004),
(1002, 1000),
(1002, 1003),
(1002, 2001),
(1003, 1000),
(1003, 1002),
(1003, 2000),
(1003, 2001),
(1004, 1001),
(2000, 1000),
(2000, 1002),
(2000, 1003),
(2000, 2001),
(2001, 1000),
(2001, 1002),
(2001, 1003);
```

## Usage

Run the local server:

```bash
php -S localhost:8000
```

then you can query your schema at `POST http://localhost:8000/entry.php`

### Exemple

For the given cURL request:

```bash
curl -XPOST 'http://localhost:8000/entry.php' -d 'query=query FooBar {
    luke: hero(episode: EMPIRE) {
        id,
        name,
        friends {
            id, name
        }
    },
    droid(id: "2001") {
        primaryFunction
    }
}'
```

you should receive the following response:

```json
{
    "data": {
        "luke": {
            "id":1000,
            "name":"Luke Skywalker",
            "friends": [
                {
                    "id":1002,
                    "name":"Han Solo"
                },
                {
                    "id":1003,
                    "name":"Leia Organa"
                },
                {
                    "id":2000,
                    "name":"C-3PO"
                },
                {
                    "id":2001,
                    "name":"R2-D2"
                }
            ]
        },
        "droid":{
            "primaryFunction":"Astromech"
        }
    }
}
```
