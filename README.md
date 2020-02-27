# Glow Green PHP Developer Test

Thank you for your interest in working at Glow Green. 

We have put together a number of questions based in order to give us a basic understanding of your skills.

The test covers creating endpoints within a Laravel project, as well as some basic CSS, HTML, PHP and Server configuration questions.

Please fork this repository, answer the questions / make your changes and send a pull request back when you're done.

## Laravel Tasks

Complete the TODOs in the DeveloperTestController. Look closely at the commit messages for clues about which files are relevant!

Your API endpoints exist at `<domain>/api/developer-tests`

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

#### What is wrong with this SQL query?

```sql
SELECT * FROM table WHERE id = $_POST[ 'id' ]
```
#### Third party code

A requirement has come up to use a third party API, write some pros and cons for each of the following:

1. Writing your own bespoke wrapper for their API using PHP.
2. Using the APIs official PHP library downloaded from their site in a ZIP file.
3. Using a third-party library using Composer/Packagist.

Which option would you have chosen, and why?

#### What is wrong with the following statement?

```php
$haystack = "Hello world";

if (strpos($haystack, "Hello")) {
    echo "Found!";
}
```

#### What is the difference between public, protected and private in a class definition?

#### What is the difference between an interface and an abstract class?

#### Demonstrate how you would securely store and compare usernames and passwords within a MySQL Database.

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

1. What colour will the link text be for the above html ?
2. What colour will the link text be if the id is removed from the link ?
3. Did you cheat?

