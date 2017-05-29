# Trip Sorter


Solution for backend developer test from propertyfinder.ae

## Getting Started

To start using the project please run the command:

```
git clone https://github.com/dimichspb/pfinder.git
```

This command will create a local copy of the repository.

Note: It is understood, that `git` is properly installed in your system. Please follow the link to get the installation instructions
 
* [GIT Installation instructions](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)

### Prerequisites

This project has been build using type hints of **PHP**, which were originally implemented in version 7 of PHP. So you need **PHP7** at least to work with this package. 
To install dependencies and generate autoloader you need `composer` to be installed in your system.

**Requirements**
* PHP7
* Composer

**Instructions**

* [Composer installation instructions](https://getcomposer.org/download/)

### Installing

To install dependencies and create autoloader please go to project folder `pfinder` and run the command:

```
composer install
```

### Web access

The project is provided with default `.htaccess` file inside the `web` folder. You can configure your **Apache** web-server to view the output of the application.

```
<VirtualHost pfinder.dev:80>
    DocumentRoot "C:/Projects/PHP/pfinder/web"
    ServerName pfinder.dev
    <Directory "C:/Projects/PHP/pfinder/web">
        Options -Indexes +FollowSymLinks
        AllowOverride All
        Require all Granted
    </Directory>
</VirtualHost>
```

Alternatively, you can use the command line

```
php web/index.php
```

## Running the tests

The repository contains tests in folder `Tests` and the set of test json files and expected outputs in folder ``sources``.
All the configuration is specified in `phpunit.xml` file.
To run tests please run the command

```
phpunit
```

Note: Not all tests are implemented in current version, so you can see some warnings while running `phpunit`

## Usage

### Deployment

The main class of the project is `Pfinder\API`. It provides the method `sort` to sort the input set of boarding tickets.

To run the sorting process you need to create an instance of `Pfinder\API` class and run method `sort` like follows:

```
$adapter = new JsonAdapter('/your-full-path-to-json-file');
 
$algorithm = new RecursiveAlgorithm();
$output = new StringOutput();
 
$api = new API($algorithm, $output);
 
echo $api->sort($adapter);

```

As you can see from the example there are three objects which `Pfinder\API` depends on:
* **JsonAdapter** implements `AdapterInterface` to provide `Pfinder\API` with set of input data in format it can understand
* **RecursiveAlgorithm** implements `AlgorithmInterface` to provide `Pfinder\API` with the sorting algorithm
* **StringOutput** implements `OutputInterface` to provide `Pfinder\API` with the result output solution

### Building own input format adapters

To implement your own input format adapter please implement `AdapterInterface` which has only one required method `getCollection`.
This method must return the `TicketCollection` class which provides common methods to operate with the **Collection** of objects.
To know more about the **Collection** please follow the link [PHPCollections](https://github.com/danielgsims/php-collections)

There is only one default **adapter** provided with the package
* `JsonAdapter` - gets JSON file as source and process it to get `TicketCollection`

### Building own output format processors

To implement your own output processor please implement `OutputInterface` which has only one required method `process`.
This method gets `TicketCollection` as argument and return the necessary output.

There are two default **outputs** provided with the package
* `JsonOutput` - gets `TicketCollection` and builds JSON output
* `StringOutput` - gets `TicketCollection` and builds String output

### Implementing own sorting algorithms

To implement your own sorting algorithm please implement `AlgorithmInterface` which has only one required method `run`.
This method gets `TicketCollection` as argument and return sorted `TicketCollection` as result.

There are three default **algorithms** provided with the package
* `NoAlgorithm` - gets `TicketCollection` and returns it without any changes and sorting
* `RecursiveAlgorithm` - gets `TicketCollections`, sorts it using `usort` function of `PHP` and returns sorted `TicketCollection`
* `CustomAlgorithm` - implements custom sorting algorithm. _Not finished yet_.

### Boarding ticket models configuration

To build your own types of tickets please implement `TicketInterface` which has two required methods.
* `__construct` - requires an array as argument which contains the set of names and values to be associated to object attributes
* `getRouteString` - builds the human readable string of the current ticket's route.

## Examples

### Ticket model examples

* **Bus ticket example**

```
class BusTicket extends BaseTicket
{
    public $number;

    public function getRouteString()
    {
        return 'Take bus ' . $this->number . ' from ' . $this->origin . ' to ' . $this->destination . '. No seat assignment.';
    }
}
```

* **Train ticket example**

```
class TrainTicket extends BaseTicket
{
    public $number;
    public $seat;


    public function getRouteString()
    {
        return 'Take train ' . $this->number . ' from ' . $this->origin . ' to ' . $this->destination . '. Sit in seat '. $this->seat . '.';
    }
}
```

* **Flight ticket example**

```
class FlightTicket extends BaseTicket
{
    public $number;
    public $gate;
    public $seat;
    public $counter;

    public function getRouteString()
    {
        $counterString = empty($this->counter)?
            'Baggage will we automatically transferred from your last leg':
            'Baggage drop at ticket counter 344';

        return 'From ' . $this->origin . ', take flight ' . $this->number . ' to ' . $this->destination . '. Gate ' . $this->gate . ', seat '. $this->seat . '. ' . $counterString . '.';
    }
}
```

Note: Ticket classes extends `BaseTicket` abstract class which provides common `__construct` method to avoid repeating the code.

### Input examples

* **JSON input example**. To be used with default `JsonAdapter`.

```
[
  {
    "name": "Train",
    "number": "78A",
    "origin": "Madrid",
    "destination": "Barcelona",
    "seat": "45B"
  },
  {
    "name": "AirportBus",
    "origin": "Barcelona",
    "destination": "Gerona Airport"
  },
  {
    "name": "Flight",
    "number": "SK455",
    "origin": "Gerona Airport",
    "destination": "Stockholm",
    "gate": "45B",
    "seat": "3A",
    "counter": "344"
  },
  {
    "name": "Flight",
    "number": "SK22",
    "origin": "Stockholm",
    "destination": "New York JFK",
    "gate": "22",
    "seat": "7B"
  }
]
```

### Output examples

* **JSON output example**. The result of default `JsonOutput`.

```
[
  {
    "name": "Train",
    "number": "78A",
    "origin": "Madrid",
    "destination": "Barcelona",
    "seat": "45B"
  },
  {
    "name": "AirportBus",
    "origin": "Barcelona",
    "destination": "Gerona Airport"
  },
  {
    "name": "Flight",
    "number": "SK455",
    "origin": "Gerona Airport",
    "destination": "Stockholm",
    "gate": "45B",
    "seat": "3A",
    "counter": "344"
  },
  {
    "name": "Flight",
    "number": "SK22",
    "origin": "Stockholm",
    "destination": "New York JFK",
    "gate": "22",
    "seat": "7B"
  }
]
```

* **String output example**. The result of default `StringOutput`.

```
1. Take train 78A from Madrid to Barcelona. Sit in seat 45B.
2. Take the airport bus from Barcelona to Gerona Airport. No seat assignment.
3. From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A. Baggage drop at ticket counter 344.
4. From Stockholm, take flight SK22 to New York JFK. Gate 22, seat 7B. Baggage will we automatically transferred from your last leg.
5. You have arrived at your final destination.
```

## Built With

* [PHPCollections](https://github.com/danielgsims/php-collections.git) - The Collections library for PHP
* [Composer](https://getcomposer.org/) - Dependency Management
* [PHPUnit](https://phpunit.de/) - The PHP testing framework

## Contributing

No contributing supported

## Versioning

We use [GIT](https://git-scm.com/) for versioning. 

## Authors

* **Dmitry Tarantin** - *Initial work* - [dimichspb](https://github.com/dimichspb)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

