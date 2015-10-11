# DataImport
Showcase application for importing and visualizing data

## Setup
For installation clone this repository and run:
/composer.phar install

Open the config.ini file and set the following data:
* Folder containing files for import
** This folder must be created manually
* Folder containing template files
* Credentials for your database
** Due usage of Doctrine DBAL several databases are supported. I suggest MySQL.

Use the setUpDatabase.sql file to create the table used by the application

## Usage
This application uses a single point of entry depending on the environment it
is called. Known entry points are web and command line.

### Import
To start importing the data run the application on a command line interface.
Move the file(s) you want to import the given import folder.
Run the following command while in root folder of application:

    php index.php [fileToBeimported.csv]

### View of data
Just open the application in your web browser (Safari and Chrome) are tested.
Four different charts will be shown on the website.

## Dependencies
This project has the following dependencies:
* doctrine/dbal: 2.5
* khill/lavacharts: 2.5.*
* league/plates: 3.*
* arg/tagcloud: dev-master
