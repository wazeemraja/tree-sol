# tree-sol
Requirements to run:
  + Apache 2.4.54
  + MariaDB 10.4.27 / MySQL
  + PHP 8.2.0 (VS16 X86 64bit thread safe) + PEAR
 
General Instructions to run: 

1. Create a database within MariaDB/MySQL
2. Import the table using the 'tree_nodes.sql' file.
3. Change the db credentials in 'config.php'
4. Load index.php via PHP (I used XAMPP server and a subfolder called 'tree-sol' while creating the solution)

Easiest way to run (Windows): 

1. Download and install XAMPP Version 8.2.0 for Windows.
2. Clone the git repository `https://github.com/wazeemraja/tree-sol` to your local machine.
2. Copy the folder `tree-sol` from the repository into the `XAMPP/htdocs/` folder.
3. Launch PhpMyAdmin via `http://localhost/phpmyadmin` in your browser.
4. Create a database called `tree-sol-db`.
5. Go to 'Import' tab and import the table from the file `db/tree-nodes.sql` within the repository.
6. Go to `config.php` and enter your database name and credentials against the config variables.
7. Go to `http://localhost/tree-sol` in your browser to see the working solution.

Hope these instructions are helpful! 