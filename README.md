Vehiclenz is a web application designed for a garage, allowing users to manage vehicle-related information. The project is developed using PHP, HTML5, CSS, and MYSQL.
Prerequisites

Before running the project, ensure you have the following prerequisites installed:

1. Database Setup:

 Create a MySQL database named "vehiclenz".
 Import the SQL file located in the "Database" folder into the "vehiclenz" database.

2. Configure Database Connection:

 Open the file genobj.php located in the project's root.
 Locate the following line:


PHP

        private $conndet = array(
            "host" => "your_host",
            "db" => "vehiclenz",
            "charset" => "utf8",
            "u" => "root",
            "p" => "password"
        );  


Replace the values with your database credentials:

PHP

        private $conndet = array(
            "host" => "your_host",
            "db" => "vehiclenz",
            "charset" => "utf8",
            "u" => "your_username",
            "p" => "your_password"
        );

3. Local Deployment:

Copy the entire project folder to your local server's root directory (e.g., htdocs for XAMPP or www for WAMP).
Access the project from your browser by navigating to http://localhost/vehiclenz.

Usage

Once the prerequisites are set up, you can access the Vehiclenz web application by opening your browser and navigating to the specified local URL.
Contributing

Feel free to contribute to the development of Vehiclenz. If you encounter any issues or have suggestions, please open an issue or submit a pull request.


 
