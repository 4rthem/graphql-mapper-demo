<?php

require_once 'bootstrap.php';

use Arthem\GraphQLMapper\Exception\QueryException;
use Arthem\GraphQLMapper\GraphQLManager;
use Arthem\GraphQLMapper\SchemaSetup;

$entityManager = GetEntityManager();

// GraphQLMapper bootstrap
$paths          = [
    __DIR__.'/config/graphql_schema.yml',
];
$schemaFactory  = SchemaSetup::createDoctrineYamlSchemaFactory($paths, $entityManager);
$graphQLManager = new GraphQLManager($schemaFactory);

try {
    $data = $graphQLManager->query($_POST['query']);
    echo json_encode($data);
} catch (QueryException $e) {
    echo json_encode($e);
}
