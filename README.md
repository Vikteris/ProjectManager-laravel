## CRUD with Laravel

# Fifth sprint CRUD work with Laravel.

**Task!** We had to create a Project Manager webstie with Laravel. 

### Features list:
  
- [x] Log in;
- [x] Add workers/projects;
- [x] Edit workers/projcets;
- [x] Delete workers/projects;
- [x] Add filtering;


-----------------------------------------
### How to reach the website:

1. Download "ProjectManager-laravel"repository .Zip file and extract to root AMPPS "www" folder;
2. Open "MySQL Workbench" program. On navigation bar press 'Server'->'Data Import'. On 'Import from Dump Project Folder' browse the 'sql_dump' folder and open 'projectmng.sql'file.
    You can find it in a .zip file where you cloned from Github.
3. Select 'projectmng' schema and selet all tables, and click 'Start Import'.
4. Connect to you DB, you need to open project and rename ".env.example" file to ".env". and also edit DB connection configs:
--------------------------------------------
|     DB connection      |
|------------------------|
| DB_CONNECTION=mysql    |
| DB_HOST=127.0.0.1      |
| DB_PORT=3306           |
| DB_DATABASE=projectmng |
| DB_USERNAME=root       |
| DB_PASSWORD=mysql      |


-------------------------------------------
5. In your coding software (e.g. Visual studio code), open terminal and use : "php artisan serve" command. this will make a virtua lserver to watch your website. Now click on ip adress, it should look like( http://127.0.0.1:8000). Open it.
---------------------------------------

6. An authentication system is installed 
|    Authentication      |
|------------------------|
| Login: vikter@inbox.lt |
| Password: darbas       |


### Author: [Viktoras Jonutis](https://github.com/Vikteris?tab=repositories)
