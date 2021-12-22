<?php

abstract class AbstractFactory
{
    abstract public function createDBConnection() : Connection;

    abstract public function createDBRecord() : Record;

    abstract function createDBQueryBuilder() : QueryBuilder;
}

class MySQLFactory extends AbstractFactory
{
    public function createDBConnection() : Connection
    {

        return new MySQLConnection();
    }

    public function createDBRecord() : Record
    {

        return new MySQLRecord();
    }

    public function createDBQueryBuilder() : QueryBuilder
    {

        return new MySQLQueryBuilder();
    }

}

class PostgreSQLFactory extends AbstractFactory
{
    public function createDBConnection() : Connection
    {

        return new PostgreSQLConnection();
    }

    public function createDBRecord() : Record
    {

        return new PostgreSQLRecord();
    }

    public function createDBQueryBuilder() : QueryBuilder
    {

        return new PostgreSQLQueryBuilder();
    }

}

class OracleFactory extends AbstractFactory
{
    public function createDBConnection() : Connection
    {

        return new OracleConnection();
    }

    public function createDBRecord() : Record
    {

        return new OracleRecord();
    }

    public function createDBQueryBuilder() : QueryBuilder
    {

        return new OracleQueryBuilder();
    }

}

interface Connection
{
    public function getConnection() : string;
}

class MySQLConnection implements Connection
{
    public function getConnection() : string
    {
        return "Connected to MySQL";
    }
}

class PostgreSQLConnection implements Connection
{
    public function getConnection() : string
    {
        return "Connected to PostgreSQL";
    }
}

class OracleConnection implements Connection
{
    public function getConnection() : string
    {
        return "Connected to Oracle";
    }
}

interface Record
{
    public function getRecordData() : string;
}

class MySQLRecord implements Record
{
    public function getRecordData() : string
    {
        return "The data is written to MySQL";
    }
}

class PostgreSQLRecord implements Record
{
    public function getRecordData() : string
    {
        return "The data is written to PostgreSQL";
    }
}

class OracleRecord implements Record
{
    public function getRecordData() : string
    {
        return "The data is written to Oracle";
    }
}

interface QueryBuilder
{
    public function buildConstructor(Connection $connection, Record $record) : string;
}

class MySQLQueryBuilder implements QueryBuilder
{
    public function buildConstructor(Connection $connection, Record $record) : string
    {
        $result = $connection->getConnection() . PHP_EOL . $record->getRecordData();
        return $result . PHP_EOL . 'Some MySQL code';
    }
}

class PostgreSQLQueryBuilder implements QueryBuilder
{
    public function buildConstructor(Connection $connection, Record $record) : string
    {
        $result = $connection->getConnection() . PHP_EOL . $record->getRecordData();
        return $result . PHP_EOL . 'Some PostgreSQL code';
    }
}

class OracleQueryBuilder implements QueryBuilder
{
    public function buildConstructor(Connection $connection, Record $record) : string
    {
        $result = $connection->getConnection() . PHP_EOL . $record->getRecordData();
        return $result . PHP_EOL . 'Some Oracle code';
    }
}

function clientCode(AbstractFactory $factory)
{

    $productConnection = $factory->createDBConnection();
    $productRecord = $factory->createDBRecord();
    $productBuilder = $factory->createDBQueryBuilder();


    echo $productConnection->getConnection() . "\n";
    echo $productRecord->getRecordData() . "\n";
    echo $productBuilder->buildConstructor($productConnection, $productRecord) . "\r\n";
}

echo "Client: Testing client code with the first factory type:\n";
clientCode(new MySQLFactory());

echo "\n";

