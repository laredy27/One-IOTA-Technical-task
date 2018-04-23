# One iota WebApps PHP Task
Use the PHP MVC framework provided to solve the problems.

### vhosts

This project requires apache as it uses an .htaccess file. You will need to set this
project up as a vhost using the following configuration. The 'www' folder of this project
should be the document root folder as all the other code should be outside of webroot.

```
<VirtualHost *:80>
    ServerName oneiota.local
    DocumentRoot "[PATH_TO_ONE_IOTA_TASK_SRC_FOLDER]/www"

    <Directory "[PATH_TO_ONE_IOTA_TASK_SRC_FOLDER]/www">
	       AllowOverride All
   	</Directory>

    ErrorLog "[PATH_TO_APACHE_LOGS]/oneiota-task-error-log"
</VirtualHost>
```

Once you have that snippet in your vhosts file/folder setup, restart apache. Then add 'oneiota.local'
to your hosts file and point it to your dev environment (most likely 127.0.0.1 unless you're
using something like Vagrant). Then go to http://oneiota.local/ and the site should load.


## PROBLEM:
We need to add a new page type in the framework so you can click through from any
product in a listing to a detail page about that product, pulling in it’s title, description, size
options, image and any other information we have about it. We’re not testing your design
skills so the page doesn’t need to look pretty.
Breakdown of steps involved:
1. Adapt the router to add a new route and handle product IDs as variables
2. Add a new product detail page which displays the relevant product information

## SOLUTION:
Solution was developed on a mac with MAMP Server running PHP5.6 using Netbeans IDE.

Added a new GET route with this pattern "products/item/$1" and mapped this route to ProductsController's item method. 
The "$1" placeholder from the route pattern serves as the product id variable to be passed to the item method. 
When a request is made to "products/item/$1", the placeholder is substituted with the actual value passed to the request.
The magic happens when Router's runController method is called. The args are retrieved from the request and passed to item() method. 

ProductsController's item method receives a product id, loads the product model and finds a product matching that id. 
If a product is found, item-detail view is loaded and the details of that product is rendered. 
Finally, a success response is sent back to the browser and the details of that product is rendered to the screen.

Note 1: The solution was developed this way to facilitate seo friendly urls as opposed to query strings.

Note 2: The product details UI is better on full screen.

