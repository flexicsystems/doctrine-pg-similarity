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

```yaml
doctrine:
  orm:
    dql:
      string_functions:
        SIMILARITY: Flexic\DoctrinePGSimilarity\SimilarityFunction
```

### Minimum requirements
- `PostgreSQL > 9.1`
- `doctrine/orm > 2.14`