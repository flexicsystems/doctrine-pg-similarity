# Doctrine Postgres `similarity`

# Install

Run
```bash
composer require flexic/doctrine-pg-similarity
```
to install `flexic/doctrine-pg-similarity` package.


Enable extension in your Postgres database by running
```postgresql
CREATE EXTENSION pg_trgm;
```

Configure `DQL` function for doctrine:

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