<<<<<<<<<<<<<        INKYPEN TASK - 2        >>>>>>>>>>>>>

1. Project Setup

##Windows users:
- Download wamp: http://www.wampserver.com/en/
- Download and extract cmder mini: https://github.com/cmderdev/cmder/releases/download/v1.1.4.1/cmder_mini.zip
- Update windows environment variable path to point to your php install folder (inside wamp installation dir) (here is how you can do this http://stackoverflow.com/questions/17727436/how-to-properly-set-php-environment-variable-to-run-commands-in-git-bash)
 

cmder will be refered as console

##Mac Os, Ubuntu and windows users continue here:
- Create a database locally named `image_gallery` utf8_general_ci 
- Download composer https://getcomposer.org/download/
- Pull Laravel/php project from git provider.
- Rename `.env.example` file to `.env`inside your project root and fill the database information.
  (windows wont let you do it, so you have to open your console cd your project root directory and run `mv .env.example .env` )
- Open the console and cd your project root directory
- Run `composer install`
- Run `php artisan key:generate` 
- Run `php artisan migrate`
- Run `php artisan serve`

#####You can now access your project at localhost:8000 :)

## If for some reason your project stop working do these:
- `composer install`
- `php artisan migrate`

2. Gallery Working. There are a total of 4 pages in this project:-

    a.  Homepage    :   Shows all the galleries from the database with Display Picture, Title and   Description. Upon clicking on any card item, respective page of that specific item will open.
    b.  Gallery / Slider    :   Shows the details of a particular gallery including Title, Description, Display image and all other Images using a javascript Slider.
    c.  Manage Galleries    :   Lists all the galleries in the Database in a tabular form. On this page, you can Upload New Gallery and Upadate or Delete the existing ones.
    d.  Update Gallery      :   Updates the existing gallery including its title, description, display image and other images. It overrides the previous images and previous images are automatically deleted.

-   Database name is image_gallery
-   Routes are stored in web.php
-   Bulk of styling is done in custom.css file located in public/assets/css folder
-   Slider code is located in customSlider.js file in public/assets/js folder

3.  Technologies Used

    a.  PHP Laravel    :   Used as a server-side language for Gallery CRUD operations due to ease of use, great versatality of laravel framework and prior experience.
    b.  HTML / CSS     :   For building form elements and styling of those elements.
    c.  Javascript     :   To build the Image Slider
    d.  Bootstrap      :   To utilise built-in classess for styling purpose
    e.  Tailwind       :   For styling
