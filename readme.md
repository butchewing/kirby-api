# Kirby Basic JSON REST API Plugin

Version: 0.0.2

This Kirby plugin provides an easy way to add a very basic JSON REST API to your site. [Download the plugin](https://github.com/butchewing/kirby-api/archive/master.zip) from Github and put it into /site/plugins. It will automatically be loaded by Kirby.

To access you API endpoints, simply navigate to http://yourkirbywebsite.tld/api/v1/any-vaild-request-path/even-child-pages/or-grand-child-pages

Your site is now able to communicate with any application that can consume a JSON API.


## Choose your endpoint

Each HTTP request consists of an HTTP Method and an endpoint. Throughout the documentation, these requests are formatted like the following example.

```
{METHOD} http(s)://yourkirbywebsite.tld/api/v1/{endpoint}
```

1. Method

  At this point we only accept the GET method.

2. Prefix

  By default the prefix is set to `api/v1/`.


3. Endpoint

  An API endpoint is a path that uniquely identifies a resource. To make an HTTP request to an endpoint, append this path to the end of your website's URL.


4. Response

  The response from an endpoint will be JSON, and contain multiple resources.

  Example response
  ```
  {"page":{"id":"home","title":"Home","parent":"","dirname":"1-home","diruri":"1-home","url":"http:\/\/localhost:8888","contentUrl":"http:\/\/localhost:8888\/content\/1-home","tinyUrl":"http:\/\/localhost:8888\/x\/vl2sb4","depth":1,"uri":"home","root":...
  ```

5. Resources

  By default, we are pulling from several resources within each endpoint.

  a. Page - an array of the page data

  b. Images - an array of the images on the page

  c. Documents - an array of the documents on the page

  d. (Siblings - an array of the siblings of the page) - Commented out

  e. Children - an array of the child pages and their images

  f. (Grand Children - an array of the grand child pages) - Commented out

  You can choose to also get the pages siblings by uncommenting that line on kirby-api.php.


## Contributions

Please fork this repository and make it better.


## Change Log

[View the Change Log](https://github.com/butchewing/kirby-api/blob/master/changelog.md)


## Author

Butch Ewing
<butch@butchewing.com>