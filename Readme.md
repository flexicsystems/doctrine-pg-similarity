# Doctrine Postgres `similarity`

# Install

1.) Run
```bash
composer require flexic/doctrine-pg-similarity
```
to install `flexic/doctrine-pg-similarity` package.

2.) Enable extension in your Postgres database by running
```postgresql
CREATE EXTENSION pg_trgm;
```

3.) Configure `DQL` function for doctrine:

Configuration for Symfony:
```yaml
doctrine:
  orm:
    dql:
      string_functions:
        SIMILARITY: \Flexic\DoctrinePGSimilarity\SimilarityFunction
```

Configuration for Standalone Doctrine:
```php
$config->addCustomStringFunction('SIMILARITY', \Flexic\DoctrinePGSimilarity\SimilarityFunction::class);
```

### Minimum requirements
- `PostgreSQL > 9.1`
- `doctrine/orm > 2.14`