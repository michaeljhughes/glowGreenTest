# Glow Green PHP Developer Test

## Laravel Tasks

Here is a basic startup for the Laravel Tasks, in case you were interested

Turned on XAMPP
Cloned git repo
Run 'compose install'
Change storage file permissions
Run 'php artisan key:generate'
Create .env file with database details (localhost, root, no password)
Setup Virtual Host config for Apache
Run 'php artisan migrate'

This left me in a position to use Postman to complete the tasks specified in the Developer Task Controller. This took about an hour.

## Other Tasks

Next, answer these questions in-line by changing this file.

### PHP

#### Find as many problems as you can with this code.

```php
class Example_Db_Class
{
    static function connect($dbName)
    {
        if ($this->db == null) {
            $this->db = new $this->mysql_connect($dbname);
        }
    }
}
```
Class name should not contain underscores.
Static functions can only access static variables and static functions. So $this will not work.
Should use idential comparison operator (===) to ensure type and value are equal.

#### What is wrong with this SQL query?

```sql
SELECT * FROM table WHERE id = $_POST[ 'id' ]
```

You should never put user input directly into an SQL query as this can allow for SQL injection.
#### Third party code

A requirement has come up to use a third party API, write some pros and cons for each of the following:

1. Writing your own bespoke wrapper for their API using PHP.
2. Using the APIs official PHP library downloaded from their site in a ZIP file.
3. Using a third-party library using Composer/Packagist.

Which option would you have chosen, and why?

1. Writing your own bespoke wrapper gives you complete control over what happens, but will require more time to implement.
2. Using the APIs official library should ensure it is secure, up to date and should be well documented. It may not have as much functionality as a 3rd party library.
3. Third-party libraries may stop being updated at some point and not support your PHP version securely, for example. They will likely have extra functionality over the official library as it may be open source.

I would pick option 2 for a commercial product, as it's important that the library will be updated over time so that it uses the latest PHP version and is secure.

#### What is wrong with the following statement?

```php
$haystack = "Hello world";

if (strpos($haystack, "Hello")) {
    echo "Found!";
}
```
strpos() will give the starting position in the string for the supplied match.
In this example "Hello" is at the start of the string and so the value is 0.
The evaluated value of 0 will not trigger the if statement.
You could change it to:


```php
$haystack = "Hello world";

if (strpos($haystack, "Hello") !== false) {
    echo "Found!";
}
```
This uses the not identical comparison operator to check type as well as value.

#### What is the difference between public, protected and private in a class definition?
Public - Makes the variable/function available anywhere.
Protected - Makes the variable/function available within its own class and any classes that extend this class.
Private - Makes the variable/function available within its own class only.

#### What is the difference between an interface and an abstract class?
An interface will define requirements for the developer, such as certain classes that must be included. These classes will be abstract.

An abstract class will do the same as an interface, but also implement some base classes that can be uses as well.

Child classes can only extend a single abstract class, but you can implement multiple inferfaces.

#### Demonstrate how you would securely store and compare usernames and passwords within a MySQL Database.
The password should be hashed so that it's not visible as plain text in the database.
Password_verify() can be used to by passing in the password supplied and the saved hashed password from the database, after matching on username, and see if they return the same hashed password.

### HTML

#### Which of the following is more semantically correct (For the title of a document)?

**A**
```html
<span class="title">This is a Title</span>
```

**B**
```html
<h1>This is a Title</h1>
```


**C**
```html
<p><b>This is a Title</b></p>
```

A is correct as it applies an appropriate class name that will take advantage of global style sheets

#### Which of the following is more semantically correct?

**A**
```html
<h2>A List of Stuff</h2>
<ul>
    <li>Robots</li>
    <li>Monkeys</li>
    <li>Vikings</li>
    <li>KitKats</li>
</ul>
```

**B**
```html
<dl>
    <dt>A List of Stuff</dt>
    <dd>Robots</dd>
    <dd>Monkeys</dd>
    <dd>Vikings</dd>
    <dd>KitKats</dd>
</dl>
```

A as it differentiates between the list items and the heading, allowing for easy styling

#### When marking up multiple paragraphs within one list item, which method makes the most sense?

**A**
```html
<ul>
  <li>Paragraph 1<br /><br />
  Paragraph 2</li>
</ul>
```

**B**
```html
<ul>
  <li>Paragraph 1
  <p>Paragraph 2</p></li>
</ul>
```

**C**
```html
<ul>
  <li>
    <p>Paragraph 1</p>
    <p>Paragraph 2</p>
  </li>
</ul>
```

C as it correctly tags each paragraph with a <p> tag within the one list item

### CSS

#### Look at the following snippet CSS

```css
body a {
    color: purple;
}

#link {
    color: black;
}

.red a {
    color: red;
}

.blue {
    color: blue;
}
```

#### Consider the html below and answer the following questions

```html
<p class="red">
    <a id="link" class="blue" href="#">link</a>
</p>
```

1. What colour will the link text be for the above html ? Black
2. What colour will the link text be if the id is removed from the link ? Red
3. Did you cheat? No

### Server Configuration

Please add comments to this Apache virtual host to explain what each section is doing

```
# Listens on port 80 (http)
<VirtualHost *:80>
    # URL in browser that will activate this config
    ServerName  dev.site.com
    # Contact address for the server, included in error messages
    ServerAdmin web@glowgreenltd.com

    # Set environment variable SITE_CONFIG to dev, used to differenciate between working and live environments
    SetEnv SITE_CONFIG dev

    # Root directory for the URL to access when accessing the ServerName
    DocumentRoot    /path/to/public/folder

    # Show list of files in directory if no Index is found inside folder
    Options Indexes

    # Turn on the Rewrite Engine that will reformat the URL based on rules supplied
    RewriteEngine on

    RewriteRule ^/core/(.*) /core/$1 [L,PT]

    RewriteRule ^/favicon.ico$ /images/favicon.ico

    # Rewrite URL when images match certain file types
    RewriteRule ^.+/images/(.*(png|gif|jpg)$) /images/$1

    # Rewrite url to replace /google.x.html to /googlex.html
    RewriteRule ^/google(.+).html$ /google$1.html [L]

    # Rewrite the multiple Rewrite Conditions to the rule supplied
    RewriteCond  $1 !^/assets/.*
    RewriteCond  $1 !^/javascript/.*
    RewriteCond  $1 !^/images/.*
    RewriteCond  $1 !^/css/.*
    RewriteRule ^(.*) /index.php [L]

    # Replace instances of /core with /path/to/another/public/folder
    Alias /core     /path/to/another/public/folder

    # Rewrite url to send to localhost port 8080 for an external service to handle
    RewriteRule ^/images/(.*) http://0.0.0.0:8080/images/$1 [P]
    RewriteRule ^/assets/(.*) http://0.0.0.0:8080/assets/$1 [P]
    RewriteRule ^/css/(.*) http://0.0.0.0:8080/css/$1 [P]

    RewriteCond   %{REQUEST_URI} !.*\.php$
    RewriteRule ^/javascript/(.*) http://0.0.0.0:8080/javascript/$1 [P]

</VirtualHost>
```

#### Name as many different types of Web Application and Server based security holes. (Eg, SQL Injection)

1. SQL Injection
2. Cross Site Scripting 
3. Insecure Direct Object References 
4. Security misconfiguration
5. Unencrypted sensitive data
6. Cross Site Request Forgery (CSRF)
7. Outdated or Untrusted dependencies
